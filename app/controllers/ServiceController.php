<?php

class ServiceController extends BaseController {

	//search book (search by title,ect. except type).
	public function searchBook(){
		ServiceController::auto_cancel_booking() ;
		ServiceController::auto_fine();
		session_start();
		$inRepository = new InterfaceBookRepo;
		$tmpSearch = $_GET["txtKeyword"];
		$tmpType = $_GET["ddlType"];

		if($_SESSION['Status'] == "ADMIN"){
			if($tmpSearch == ""){
				$tmpBook = $inRepository->getRepositoryAll();
				return View::make('search_book_list')->with('Book',$tmpBook);
			}else if(($tmpSearch != "")&&($tmpType==0)){
				$tmpBook = $inRepository->getRepositoryBySearchTitle($tmpSearch);
				return View::make('search_book_list')->with('Book',$tmpBook);
			}else if(($tmpSearch != "")&&($tmpType==1)){
				$tmpBook = $inRepository->getRepositoryBySearchAuthor($tmpSearch);
				return View::make('search_book_list')->with('Book',$tmpBook);
			}else if(($tmpSearch != "")&&($tmpType==2)){
				$tmpBook = $inRepository->getRepositoryBySearchCallNum($tmpSearch);
				return View::make('search_book_list')->with('Book',$tmpBook);
			}else if(($tmpSearch != "")&&($tmpType==3)){
				$tmpBook = $inRepository->getRepositoryBySearchSubject($tmpSearch);
				return View::make('search_book_list')->with('Book',$tmpBook);
			}else if(($tmpSearch != "")&&($tmpType==4)){
				$tmpBook = $inRepository->getRepositoryBySearchISBN($tmpSearch);
				return View::make('search_book_list')->with('Book',$tmpBook);
			}
		}else{
			if($tmpSearch == ""){
				$tmpBook = $inRepository->getRepositoryAll();
				return View::make('search_book_list_user')->with('Book',$tmpBook);
			}else if(($tmpSearch != "")&&($tmpType==0)){
				$tmpBook = $inRepository->getRepositoryBySearchTitle($tmpSearch);
				return View::make('search_book_list_user')->with('Book',$tmpBook);
			}else if(($tmpSearch != "")&&($tmpType==1)){
				$tmpBook = $inRepository->getRepositoryBySearchAuthor($tmpSearch);
				return View::make('search_book_list_user')->with('Book',$tmpBook);
			}else if(($tmpSearch != "")&&($tmpType==2)){
				$tmpBook = $inRepository->getRepositoryBySearchCallNum($tmpSearch);
				return View::make('search_book_list_user')->with('Book',$tmpBook);
			}else if(($tmpSearch != "")&&($tmpType==3)){
				$tmpBook = $inRepository->getRepositoryBySearchSubject($tmpSearch);
				return View::make('search_book_list_user')->with('Book',$tmpBook);
			}else if(($tmpSearch != "")&&($tmpType==4)){
				$tmpBook = $inRepository->getRepositoryBySearchISBN($tmpSearch);
				return View::make('search_book_list_user')->with('Book',$tmpBook);
			}
		}
	}

	//show search book (search by title,ect. except type).
	public function searchBook_View(){
		session_start();
		$inRepository = new InterfacePersonRepo;
		$tmpUser = $inRepository->getRepositoryByID($_SESSION['id']);
		if($tmpUser->Status=='ADMIN'){
			return View::make('search_book_admin');
		}else{
			return View::make('search_book_user');
		}
	}

	//show search book (search by type).
	public function search_book_type(){
		session_start();
		if($_SESSION['Status'] != "USER")
		{
			return View::make('alert/person/alertWarning2');
		}
		return View::make('search_type');
		
	}

	//search book (search by type).
	public function search_book_type_list(){
		ServiceController::auto_cancel_booking() ;
		ServiceController::auto_fine();
		session_start();
		if($_SESSION['Status'] != "USER")
		{
			return View::make('alert/person/alertWarning2');
		}
		
		$tmpSearch = $_GET["ddlType"];
		$inRepository = new InterfaceBookRepo;
		$tmpBook = $inRepository->getRepositoryByType($tmpSearch);
		return View::make('book_type_list')->with('Book',$tmpBook);

	}

	//check booking when member booked book.
	public function checkbooking(){
		session_start();
		$inRepository = new Service;
		$limitfine = 50;
		$limitbook = 5;
		if($_SESSION['Fine'] > $limitfine){
			return View::make('alert/service/alertFine');
		}

		$tmpUserBooking = $inRepository->countUserBooking($_SESSION['id']);
		if(count($tmpUserBooking) > $limitbook){
			return View::make('alert/service/alertBooking');
		}

		$tmpUserBorrow = $inRepository->countUserBorrow($_SESSION['id']);
		if(count($tmpUserBorrow) > $limitbook){
			return View::make('alert/service/alertBorrow');
		}

		$inRepository = new InterfaceBookRepo;
		$tmpBook = $inRepository->getRepositoryByID($_GET["BookID"]);
		if($tmpBook->Status!='OnBookshelf'){
			return View::make('alert/service/alertStatus');
		}else{
			return View::make('bookingDate')->with('Book',$tmpBook);
		}
	}

	//compare date (datebooking/borrow bettwen datenow).
	public function compareDate($date1,$date2){
		$dateNow=date("d-m-Y");
		$arrDate1 = explode("-",$date1);
		$arrDate2 = explode("-",$date2);
		$arrDate3 = explode("-",$dateNow);
		$timStmp1 = mktime(0,0,0,$arrDate1[1],$arrDate1[0],$arrDate1[2]);
		$timStmp2 = mktime(0,0,0,$arrDate2[1],$arrDate2[0],$arrDate2[2]);
		$timStmp3 = mktime(0,0,0,$arrDate3[1],$arrDate3[0],$arrDate3[2]);

		if ($timStmp1 == $timStmp2){
			return true;
		} else if ($timStmp1 > $timStmp2){
			return false;
		} else if ($timStmp1 < $timStmp3){
			return false;
		}else {
			return true;
		}
	}

	//save booking when member booked book.
	public function save_booking(){
		session_start();
		$sD1=$_POST["sD1"] ;
		$sM1=$_POST["sM1"] ;
		$sY1=$_POST["sY1"] ;

		$inRepository = new InterfaceBookRepo;
		$tmpBook = $inRepository->getRepositoryByID($_GET["BookID"]);
		if($tmpBook->DateBooking == "00-00-0000"){
			$dateNow=date("d-m-Y");
			$dateBooking = $sD1."-".$sM1."-".$sY1 ;
			$dateLimit = date("d-m-Y", strtotime("+7 day", strtotime($dateNow)));

			if(!ServiceController::compareDate($dateBooking,$dateLimit)){
				return View::make('alert/service/alertBorrow2')->with('Limit',$dateLimit)->with('Now',$dateNow);
			}else{
				$BookingBook = new Book;
				$toRepository = new Service;
				$BookingBook->setBookID($_GET["BookID"]);
				$BookingBook->setUserBooking($_SESSION['id']);
				$BookingBook->setDateBooking($dateNow);
				$BookingBook->setDateBorrow($dateBooking);
				$returnValue = $toRepository->BookingBookRepository($BookingBook);

				if($returnValue==2){
					return View::make('alert/service/alertBooking3');
				}else if($returnValue==1){
					return View::make('alert/service/alertBooking4');
				}else{
					return View::make('alert/service/alertBooking5');
				}
			}
		}else{
			$dateNow=date("d-m-Y");
			$dateBooking =  $tmpBook->DateBooking ;
			$dateBorrow = $sD1."-".$sM1."-".$sY1 ;
			$dateLimit = date("d-m-Y", strtotime("+7 day", strtotime($dateBooking)));

			if(!ServiceController::compareDate($dateBorrow,$dateLimit)){
				return View::make('alert/service/alertBorrow2')->with('Limit',$dateLimit)->with('Now',$dateNow);
			}else{
				$BookingBook = new Book;
				$toRepository = new Service;
				$BookingBook->setBookID($_GET["BookID"]);
				$BookingBook->setDateBorrow($dateBorrow);
				$returnValue = $toRepository->BookingBookRepository($BookingBook);

				if($returnValue==2){
					return View::make('alert/service/alertBooking3');
				}else if($returnValue==1){
					return View::make('alert/service/alertBooking4');
				}else{
					return View::make('alert/service/alertBooking5');
				}
			}
		}
	}

	//show booking history of member.
	public function booking_history(){
		ServiceController::auto_cancel_booking() ;
		ServiceController::auto_fine();
		session_start();
		if($_SESSION['Status'] != "USER"){
			return View::make('alert/authen/alertWarning2');
		}

		$inRepository = new Service;
		$tmpBook = $inRepository->countUserBooking($_SESSION['id']);
		return View::make('booking_history_list')->with('Book',$tmpBook);
	}

	//show borrow history of member.
	public function borrow_history(){
		ServiceController::auto_cancel_booking() ;
		ServiceController::auto_fine();
		session_start();
		if($_SESSION['Status'] != "USER"){
			return View::make('alert/authen/alertWarning2');
		}

		$inRepository = new Service;
		$tmpBook = $inRepository->countUserBorrow($_SESSION['id']);
		return View::make('borrow_history_list')->with('Book',$tmpBook);
	}

	public function edit_booking_date(){
		$inRepository = new InterfaceBookRepo;
		$tmpBook = $inRepository->getRepositoryByID($_GET["BookID"]);
		return View::make('bookingDate')->with('Book',$tmpBook);
	}

	//check cancel booking when member cancel booking.
	public function check_cancel_booking(){
		$inRepository = new InterfaceBookRepo;
		$tmpBook = $inRepository->getRepositoryByID($_GET["BookID"]);
		if($tmpBook->Status != "Booking"){
			return View::make('alert/service/alertBooking2');
		}else{
			return View::make('check_cancel_booking')->with('Book',$tmpBook);
		}
	}

	//save cancel booking when member cancel booking.
	public function cancel_booking(){
		$txtBooking = "OnBookshelf";
		$txtBookID = "0";
		$txtDate = "00-00-0000";
		$BookingBook = new Book;
		$toRepository = new Service;
		$BookingBook->setBookID($_GET["BookID"]);
		$BookingBook->setStatus($txtBooking);
		$BookingBook->setUserBooking($txtBookID);
		$BookingBook->setDateBooking($txtDate);
		$BookingBook->setDateBorrow($txtDate);
		$returnValue = $toRepository->CancelBookingRepository($BookingBook);

		if($returnValue==1){
			return View::make('alert/service/alertBooking6');
		}else{
			return View::make('alert/service/alertBooking5');
		}
	}

	//renew borrow book (borrow continue) when member renewed book.
	public function borrow_con(){
		$inRepository = new InterfaceBookRepo;
		$tmpBook = $inRepository->getRepositoryByID($_GET["BookID"]);
		if($tmpBook->LimitBorrow != 0){
			return View::make('alert/authen/alertBorrow3');
		}else{
			return View::make('returnDate')->with('Book',$tmpBook);
		}	
	}

	//save renew borrow book (borrow continue) when member renewed book.
	public function save_borrow_con(){
		session_start();
		$sD1=$_POST["sD1"] ;
		$sM1=$_POST["sM1"] ;
		$sY1=$_POST["sY1"] ;
		$Limit= 1 ;

		$inRepository = new InterfaceBookRepo;
		$tmpBook = $inRepository->getRepositoryByID($_GET["BookID"]);
		$dateNow=date("d-m-Y");
		$dateReturn = $tmpBook->DateReturn ;
		$dateReturnNew = $sD1."-".$sM1."-".$sY1 ;
		$dateLimit = date("d-m-Y", strtotime("+7 day", strtotime($dateReturn)));

		if(!ServiceController::compareDate($dateReturnNew,$dateLimit)){
			return View::make('alert/service/alertBorrow2')->with('Limit',$dateLimit)->with('Now',$dateNow);
		}else {
			$BookingBook = new Book;
			$toRepository = new Service;
			$BookingBook->setBookID($_GET["BookID"]);
			$BookingBook->setDateReturn($dateReturnNew);
			$BookingBook->setLimitBorrow($Limit);
			$returnValue = $toRepository->BorrowConRepository($BookingBook);
			if($returnValue==1){
				return View::make('alert/service/alertBooking7');
			}else{
				return View::make('alert/service/alertBooking5');
			}
		}
	}

	//save return borrow book when member return book.
	public function return_book(){
		$txtBookStatus = "OnBookshelf";
		$txtUserID = "0" ;
		$txtDate = "00-00-0000";
		$Limit = 0 ;
		$inRepository = new InterfaceBookRepo;
		$tmpBook = $inRepository->getRepositoryByID($_GET["BookID"]);
		$ReturnBook = new Book;
		$toRepository = new Service;
		$ReturnBook->setBookID($_GET["BookID"]);
		$ReturnBook->setStatus($txtBookStatus);
		$ReturnBook->setUserBooking($txtUserID);
		$ReturnBook->setUserBorrow($txtUserID);
		$ReturnBook->setDateBooking($txtDate);
		$ReturnBook->setDateBorrow($txtDate);
		$ReturnBook->setDateReturn($txtDate);
		$ReturnBook->setLimitBorrow($Limit);
		$returnValue = $toRepository->ReturnBookRepository($ReturnBook);

		if($returnValue==1){
			return View::make('alert/service/alertReturn');
		}else{
			return View::make('alert/service/alertBooking5');
		}	
	}

	//check borrow book when member borrow book.
	public function borrowBook(){
		$inRepository = new InterfaceBookRepo;
		$tmpBook = $inRepository->getRepositoryByID($_GET["BookID"]);
		return View::make('data_borrow')->with('Book',$tmpBook);
	}

	//save borrow book when member borrow book.
	public function save_borrow(){
		session_start();
		$inRepository = new Service;
		$tmpUser = $inRepository->countUserBorrow(Input::get('txtUserBorrow'));
		if(count($tmpUser) > 5)	{
			return View::make('alert/service/alertBorrow');
		}

		$txtBookStatus = "Borrow";
		$txtIDBooking = "0" ;
		$sD1=$_POST["sD1"] ;
		$sM1=$_POST["sM1"] ;
		$sY1=$_POST["sY1"] ;
		$sD2=$_POST["sD2"] ;
		$sM2=$_POST["sM2"] ;
		$sY2=$_POST["sY2"] ;
		$inRepository = new InterfaceBookRepo;
		$tmpBook = $inRepository->getRepositoryByID($_GET["BookID"]);
		$dateNow=date("d-m-Y");
		$dateBorrow = $sD1."-".$sM1."-".$sY1 ;
		$dateReturn = $sD2."-".$sM2."-".$sY2 ;

		if(!ServiceController::compareDate($dateBorrow,$dateReturn)){
			return View::make('alert/service/alertBorrow2')->with('Limit',$dateReturn)->with('Now',$dateNow);
		}else {
			$BorrowBook = new Book;
			$toRepository = new Service;
			$inRepository = new InterfaceBookRepo;
			$BorrowBook->setBookID($_GET["BookID"]);
			$BorrowBook->setStatus($txtBookStatus);
			$BorrowBook->setUserBooking($txtIDBooking);
			$BorrowBook->setUserBorrow(Input::get('txtUserBorrow'));
			$BorrowBook->setDateBorrow($dateBorrow);
			$BorrowBook->setDateReturn($dateReturn);
			if($tmpBook->NumBooks == 0){
				$BorrowBook->setTopchart($tmpBook->Topchart+1);
				$returnValue = $toRepository->BorrowRepository($BorrowBook);
				if($returnValue==1){
					return View::make('alert/service/alertBorrow4');
				}else{
					return View::make('alert/service/alertBooking5');
				}
			}else{
				if($tmpBook->NumBooks<10){
					$string = substr($tmpBook->Title1, 0, -3);

					$tmpInitial = $inRepository->getRepositoryByTitle($string);
					$InitialBook = new Book;
					$InitialBook->setBookID($tmpInitial[0]->id);
					$InitialBook->setTopchart($tmpInitial[0]->Topchart+1);
					$toRepository->TopchartRepository($InitialBook);

					$BorrowBook->setTopchart($tmpBook->Topchart+1);
					$returnValue = $toRepository->BorrowRepository($BorrowBook);
					if($returnValue==1){
						return View::make('alert/service/alertBorrow4');
					}else{
						return View::make('alert/service/alertBooking5');
					}
				}else if($tmpBook->NumBooks<100){
					$string = substr($tmpBook->Title1, 0, -4);
					$tmpInitial = $inRepository->getRepositoryByTitle($string);

					$InitialBook = new Book;
					$InitialBook->setBookID($tmpInitial[0]->id);
					$InitialBook->setTopchart($tmpInitial[0]->Topchart+1);
					$toRepository->TopchartRepository($InitialBook);
					$BorrowBook->setTopchart($tmpBook->Topchart+1);
					$returnValue = $toRepository->BorrowRepository($BorrowBook);
					if($returnValue==1){
						return View::make('alert/service/alertBorrow4');
					}else{
						return View::make('alert/service/alertBooking5');
					}	
				}
			}
		}
	}

	public function searchUser(){
		ServiceController::auto_cancel_booking() ;
		ServiceController::auto_fine();
		session_start();
		$inRepository = new InterfacePersonRepo;
		if($_SESSION['Status'] == "ADMIN"){
			$tmpSearch = $_GET["txtKeyword"];
			if($tmpSearch == ""){
				$tmpUser = $inRepository->getRepositoryAll();
				return View::make('search_user_list')->with('User',$tmpUser)->with('txtKeyword',$tmpSearch);
			}else{
				$tmpUser = $inRepository->getRepositoryBySearchUsername($tmpSearch);
				return View::make('search_user_list')->with('User',$tmpUser)->with('txtKeyword',$tmpSearch);
			}
		}
	}

	//if member booking book but not borrow book in datebooking,it cancel booking book by automatic.
	public function auto_cancel_booking(){
		$inRepository = new InterfaceBookRepo;
		$tmpBook = $inRepository->getRepositoryAll();
		$dateNow=date("d-m-Y");
		$Num_Book = 0;
		$dateDefault = "00-00-0000" ;
		$Status = "OnBookshelf" ;
		foreach($tmpBook as $key => $value){
			$Num_Book++;
		}
		for($i=0 ;$i<$Num_Book;$i++){
			$dateBooking = $tmpBook[$i]->DateBooking ;
			if($tmpBook[$i]->Status == "Booking"){
				$dateLimit = date("d-m-Y", strtotime("+7 day", strtotime($dateBooking)));
				if(!ServiceController::compareDate($dateNow,$dateLimit)){
					$AutoCancel = new Book;
					$toRepository = new Service;
					$AutoCancel->setBookID($tmpBook[$i]->id);
					$AutoCancel->setStatus($Status);
					$AutoCancel->setDateBooking($dateDefault);
					$AutoCancel->setDateBorrow($dateDefault);
					$toRepository->AutoCancelBookingRepository($AutoCancel);
				}
			}
		}
	}

	//if member not return book in dateborrow,it increase fine a day.
	public function auto_fine(){
		$inRepository = new InterfaceBookRepo;
		$tmpBook = $inRepository->getRepositoryAll();
		$dateNow=date("d-m-Y");
		$Num_Book = 0;
		$rateFine = 5 ;
		$Day = 86400 ;
		foreach($tmpBook as $key => $value){
			$Num_Book++;
		}
		for($i=0 ;$i<$Num_Book;$i++){
			$dateReturn = $tmpBook[$i]->DateReturn ;
			if($tmpBook[$i]->Status == "Borrow"){
				if(!ServiceController::compareDate($dateNow,$dateReturn)){
					$FineDay = ServiceController::calDate($dateNow,$dateReturn) ;
					$MulFine = $FineDay/$Day ;
					$MulFineINT = intval($MulFine);
					$Fine = $MulFineINT * $rateFine ;
					$AutoFine = new Person;
					$toRepository = new Service;
					$AutoFine->setUserID($tmpBook[$i]->UserBorrow);
					$AutoFine->setFine($Fine);
					$toRepository->AutoFineRepository($AutoFine);
				}
			}
		}
	}

	public function calDate($date1,$date2){
		$arrDate1 = explode("-",$date1);
		$arrDate2 = explode("-",$date2);
		$timStmp1 = mktime(0,0,0,$arrDate1[1],$arrDate1[0],$arrDate1[2]);
		$timStmp2 = mktime(0,0,0,$arrDate2[1],$arrDate2[0],$arrDate2[2]);
		$FineDay = $timStmp1 - $timStmp2 ;
		return $FineDay ;
	}

	public function payFine(){
		$Fine = 0 ;
		$PayFine = new Person;
		$toRepository = new Service;
		$PayFine->setUserID($_GET["UserID"]);
		$PayFine->setFine($Fine);
		$returnValue = $toRepository->PayFineRepository($PayFine);
		if($returnValue==1){
			return View::make('alert/service/alertFine2');
		}else{
			return View::make('alert/service/alertFine3');
		}
	}

	//show list book is most of borrowed in 10 order.
	public function top_chart(){
		session_start();
		$inRepository = new Service;
		$tmpBook = $inRepository->getTopChartBook();
		if($_SESSION['Status'] == "ADMIN"){
			return View::make('top_chart')->with('Book',$tmpBook)->with('count',count($tmpBook));
		}else{
			return View::make('top_chart_user')->with('Book',$tmpBook)->with('count',count($tmpBook));
		}
	}
}