<?php

class ServiceController extends BaseController {

	public function searchBook()
	{
		session_start();
		if($_SESSION['Status'] == "ADMIN"){
			$tmpSearch = $_GET["txtKeyword"];
			if($tmpSearch == ""){
				$tmpBook = BookRepository::all();
				return View::make('search_book_list')->with('Book',$tmpBook);
			}else{
				$tmpBook = BookRepository::where('Title1','like',"$tmpSearch%")->orWhere('Title2','like',"$tmpSearch%")->get();
				return View::make('search_book_list')->with('Book',$tmpBook);
			}
		}else{
			$tmpSearch = $_GET["txtKeyword"];
			if($tmpSearch == ""){
				$tmpBook = BookRepository::all();
				return View::make('search_book_list_user')->with('Book',$tmpBook);
			}else{
				$tmpBook = BookRepository::where('Title1','like',"$tmpSearch%")->orWhere('Title2','like',"$tmpSearch%")->get();
				return View::make('search_book_list_user')->with('Book',$tmpBook);
			}
		}
	}

	public function searchBook_View(){
		session_start();
		$tmpUser = PersonRepository::find($_SESSION['id']);
		if($tmpUser->Status=='ADMIN'){
			return View::make('search_book_admin');
		}else{
			return View::make('search_book_user');
		}
	}

	public function checkbooking()
	{
		$tmpBook = BookRepository::find($_GET["BookID"]);
		if($tmpBook->Status!='OnBookshelf'){
			echo "Book is not OnBookshelf!<br>";
		}else{
			return View::make('bookingDate')->with('Book',$tmpBook);
		}
	}

	public function compareDate($date1,$date2) {
		$dateNow=date("d-m-Y");
		$arrDate1 = explode("-",$date1);
		$arrDate2 = explode("-",$date2);
		$arrDate3 = explode("-",$dateNow);
		$timStmp1 = mktime(0,0,0,$arrDate1[1],$arrDate1[0],$arrDate1[2]);
		$timStmp2 = mktime(0,0,0,$arrDate2[1],$arrDate2[0],$arrDate2[2]);
		$timStmp3 = mktime(0,0,0,$arrDate3[1],$arrDate3[0],$arrDate3[2]);

		if ($timStmp1 == $timStmp2) {
			return true;
		} else if ($timStmp1 > $timStmp2) {
			return false;
		} else if ($timStmp1 < $timStmp3) {
			return false;
		}else {
			return true;
		}
	}

	public function save_booking()
	{
		session_start();
		$sD1=$_POST["sD1"] ;
		$sM1=$_POST["sM1"] ;
		$sY1=$_POST["sY1"] ;
		$txtBooking = "Booking";

		$tmpBook = BookRepository::find($_GET["BookID"]);
		if($tmpBook->DateBooking == "00-00-0000"){
			$dateNow=date("d-m-Y");
			$dateBooking = $sD1."-".$sM1."-".$sY1 ;
			$dateLimit = date("d-m-Y", strtotime("+7 day", strtotime($dateNow)));

			if(!ServiceController::compareDate($dateBooking,$dateLimit)){
				echo "Day Borrow must no more than ".$dateLimit."<br/> " ;
				echo "Day Borrow must no less than ".$dateNow."<br/> " ;

			}else {
				$BookingBook = new Book;
				$toRepository = new Service;
				$BookingBook->setBookID($_GET["BookID"]);
				$BookingBook->setStatus($txtBooking);
				$BookingBook->setUserBooking($_SESSION['id']);
				$BookingBook->setDateBooking($dateNow);
				$BookingBook->setDateBorrow($dateBooking);
				$toRepository->BookingBookRepository($BookingBook);
			}
		}else{
			$dateNow=date("d-m-Y");
			$dateBooking =  $tmpBook->DateBooking ;
			$dateBorrow = $sD1."-".$sM1."-".$sY1 ;
			$dateLimit = date("d-m-Y", strtotime("+7 day", strtotime($dateBooking)));

			if(!ServiceController::compareDate($dateBorrow,$dateLimit)){
				echo "Day Borrow must no more than ".$dateLimit."<br/> " ;
				echo "Day Borrow must no less than ".$dateNow."<br/> " ;

			}else {
				$BookingBook = new Book;
				$toRepository = new Service;
				$BookingBook->setBookID($_GET["BookID"]);
				$BookingBook->setDateBorrow($dateBorrow);
				$toRepository->BookingBookRepository($BookingBook);
			}

		}

	}

	public function booking_history()
	{
		session_start();
		$tmpBook = BookRepository::where('UserBooking','like',$_SESSION['id'])->get();
		return View::make('booking_history_list')->with('Book',$tmpBook);
	}

	public function borrow_history()
	{
		session_start();
		$tmpBook = BookRepository::where('UserBorrow','like',$_SESSION['id'])->get();
		return View::make('borrow_history_list')->with('Book',$tmpBook);
	}

	public function edit_booking_date()
	{
		$tmpBook = BookRepository::find($_GET["BookID"]);
		return View::make('bookingDate')->with('Book',$tmpBook);
	}

	public function check_cancel_booking()
	{
		$tmpBook = BookRepository::find($_GET["BookID"]);
		if($tmpBook->Status != "Booking"){
			echo "Booking is Cancel!" ;
		}else{
			return View::make('check_cancel_booking')->with('Book',$tmpBook);
		}
	}

	public function cancel_booking()
	{
		$txtBooking = "OnBookshelf";
		$txtBookID = "0";
		$txtDate = "00-00-0000";
		$tmpBook = BookRepository::find($_GET["BookID"]);
		$BookingBook = new Book;
		$toRepository = new Service;
		$BookingBook->setBookID($_GET["BookID"]);
		$BookingBook->setStatus($txtBooking);
		$BookingBook->setUserBooking($txtBookID);
		$BookingBook->setDateBooking($txtDate);
		$BookingBook->setDateBorrow($txtDate);
		$toRepository->CancelBookingRepository($BookingBook);
		
	}

	public function borrow_con()
	{
		$tmpBook = BookRepository::find($_GET["BookID"]);
		if($tmpBook->LimitBorrow != 0){
			echo "User is Limit Borrow";
		}else{
			return View::make('returnDate')->with('Book',$tmpBook);
		}
		
	}

	public function save_borrow_con()
	{
		session_start();
		$sD1=$_POST["sD1"] ;
		$sM1=$_POST["sM1"] ;
		$sY1=$_POST["sY1"] ;
		$Limit= 1 ;

		$tmpBook = BookRepository::find($_GET["BookID"]);
		$dateNow=date("d-m-Y");
		$dateReturn = $tmpBook->DateReturn ;
		$dateReturnNew = $sD1."-".$sM1."-".$sY1 ;
		$dateLimit = date("d-m-Y", strtotime("+7 day", strtotime($dateReturn)));

		if(!ServiceController::compareDate($dateReturnNew,$dateLimit)){
			echo "Day Borrow must no more than ".$dateLimit."<br/> " ;
			echo "Day Borrow must no less than ".$dateNow."<br/> " ;

		}else {
			$BookingBook = new Book;
			$toRepository = new Service;
			$BookingBook->setBookID($_GET["BookID"]);
			$BookingBook->setDateReturn($dateReturnNew);
			$BookingBook->setLimitBorrow($Limit);
			$toRepository->BorrowConRepository($BookingBook);
		}

	}

	public function return_book()
	{
		$txtBookStatus = "OnBookshelf";
		$txtUserID = "0" ;
		$txtDate = "00-00-0000";
		$Limit = 0 ;
		$tmpBook = BookRepository::find($_GET["BookID"]);
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
		$toRepository->ReturnBookRepository($ReturnBook);
		
	}

	public function borrowBook()
	{
		$tmpBook = BookRepository::find($_GET["BookID"]);
		return View::make('data_borrow')->with('Book',$tmpBook);
	}

	public function save_borrow()
	{
		session_start();
		$txtBookStatus = "Borrow";
		$sD1=$_POST["sD1"] ;
		$sM1=$_POST["sM1"] ;
		$sY1=$_POST["sY1"] ;
		$sD2=$_POST["sD2"] ;
		$sM2=$_POST["sM2"] ;
		$sY2=$_POST["sY2"] ;
		
		$tmpBook = BookRepository::find($_GET["BookID"]);
		$dateNow=date("d-m-Y");

		$dateBorrow = $sD1."-".$sM1."-".$sY1 ;
		$dateReturn = $sD2."-".$sM2."-".$sY2 ;

		if(!ServiceController::compareDate($dateBorrow,$dateReturn)){
			echo "Day Borrow must no more than ".$dateReturn."<br/> " ;
			echo "Day Borrow must no less than ".$dateNow."<br/> " ;

		}else {
			$BorrowBook = new Book;
			$toRepository = new Service;
			$BorrowBook->setBookID($_GET["BookID"]);
			$BorrowBook->setStatus($txtBookStatus);
			$BorrowBook->setUserBorrow(Input::get('txtUserBorrow'));
			$BorrowBook->setDateBorrow($dateBorrow);
			$BorrowBook->setDateReturn($dateReturn);
			$toRepository->BorrowRepository($BorrowBook);
		}

	}

	public function searchUser()
	{
		session_start();
		if($_SESSION['Status'] == "ADMIN"){
			$tmpSearch = $_GET["txtKeyword"];
			if($tmpSearch == ""){
				$tmpUser = PersonRepository::all();
				return View::make('search_user_list')->with('User',$tmpUser)->with('txtKeyword',$tmpSearch);
			}else{
				$tmpUser = PersonRepository::where('Username','like',"$tmpSearch%")
				->orWhere('Name','like',"$tmpSearch%")->get();
				return View::make('search_user_list')->with('User',$tmpUser)->with('txtKeyword',$tmpSearch);
			}
		}
	}



}