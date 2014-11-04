<?php

class BookController extends BaseController {

	public function save_register()
	{
		if(trim(Input::get('txtNameThai')) == "")
		{
			echo "Please input Book name(Thai)!";
			echo "<br> Go to <a href='register'>Register page</a>";
			exit();
		}

		if(trim(Input::get('txtNameEng')) == "")
		{
			echo "Please input Book name(Eng)!";
			echo "<br> Go to <a href='register'>Register page</a>";
			exit();
		}  

		if(trim(Input::get('txtSubject')) == "")
		{
			echo "Please input Subject!";
			echo "<br> Go to <a href='register'>Register page</a>";
			exit();
		}

		if(trim(Input::get('txtAuthor')) == "")
		{
			echo "Please input Author!";
			echo "<br> Go to <a href='register'>Register page</a>";
			exit();
		}

		if(trim(Input::get('txtPublishing')) == "")
		{
			echo "Please input Publishing!";
			echo "<br> Go to <a href='register'>Register page</a>";
			exit();
		} 

		if(trim(Input::get('txtEdition')) == "")
		{
			echo "Please input Edition!";
			echo "<br> Go to <a href='register'>Register page</a>";
			exit();
		}

		if(trim(Input::get('txtYear')) == "")
		{
			echo "Please input Year!";
			echo "<br> Go to <a href='register'>Register page</a>";
			exit();
		}

		if(trim(Input::get('txtDetail')) == "")
		{
			echo "Please input Detail!";
			echo "<br> Go to <a href='register'>Register page</a>";
			exit();
		}

		if(trim($_POST["txtISBN"]) == "")
		{
			echo "Please input ISBN!";
			echo "<br> Go to <a href='register'>Register page</a>";
			exit();
		} 

		if(trim($_POST["txtCallNum"]) == "")
		{
			echo "Please input CallNum!";
			echo "<br> Go to <a href='register'>Register page</a>";
			exit();
		}

		$newBook = new Book;
		$newBook->setTitle1(Input::get('txtNameThai'));
		$newBook->setTitle2(Input::get('txtNameEng'));
		$newBook->setSubject(Input::get('txtSubject'));
		$newBook->setAuthor(Input::get('txtAuthor'));
		$newBook->setPublishing(Input::get('txtPublishing'));
		$newBook->setEdition(Input::get('txtEdition'));
		$newBook->setYear(Input::get('txtYear'));
		$newBook->setDetail(Input::get('txtDetail'));
		$newBook->setISBN(Input::get('txtISBN'));
		$newBook->setCallNum(Input::get('txtCallNum'));
		$newBook->setType(Input::get('ddlType'));
		$newBook->setSubType(Input::get('ddlSubType'));
		$newBook->setStatus(Input::get('ddlStatus'));
		$newBook->saveRepository();
	}

	public function save_edit()
	{
		$editBook = new Book;
		$editBook->setBookID(Input::get('txtBookID'));
		$editBook->setTitle1(Input::get('txtNameThai'));
		$editBook->setTitle2(Input::get('txtNameEng'));
		$editBook->setSubject(Input::get('txtSubject'));
		$editBook->setAuthor(Input::get('txtAuthor'));
		$editBook->setPublishing(Input::get('txtPublishing'));
		$editBook->setEdition(Input::get('txtEdition'));
		$editBook->setYear(Input::get('txtYear'));
		$editBook->setDetail(Input::get('txtDetail'));
		$editBook->setISBN(Input::get('txtISBN'));
		$editBook->setCallNum(Input::get('txtCallNum'));
		$editBook->setType(Input::get('ddlType'));
		$editBook->setSubType(Input::get('ddlSubType'));
		$editBook->setStatus(Input::get('ddlStatus'));
		$editBook->editRepository();
	}

	public function show_list()
	{
		$tmpBook = BookRepository::all();
		return View::make('listBook')->with('Book',$tmpBook);
	}

	public function edit_book()
	{
		$tmpBook = BookRepository::find($_GET["BookID"]);
		return View::make('edit_book')->with('Book',$tmpBook);
	}

	public function save_edit_book()
	{
		session_start();
		if($_SESSION['id'] == "")
		{
			echo "Please Login!";
			exit();
		}

		$sD1=Input::get('sD1') ;
		$sM1=Input::get('sM1') ;
		$sY1=Input::get('sY1') ;
		$sD2=Input::get('sD2') ;
		$sM2=Input::get('sM2') ;
		$sY2=Input::get('sY2') ;
		$DateBorrow = $sD1."-".$sM1."-".$sY1 ;
		$DateReturn = $sD2."-".$sM2."-".$sY2 ;
		$DateBooking = "00-00-000" ;
		$editBook = new Book;
		$editBook->setBookIDold($_GET["BookID"]);
		$editBook->setBookID(Input::get('txtBookID'));
		$editBook->setTitle1(Input::get('txtNameThai'));
		$editBook->setTitle2(Input::get('txtNameEng'));
		$editBook->setSubject(Input::get('txtSubject'));
		$editBook->setAuthor(Input::get('txtAuthor'));
		$editBook->setPublishing(Input::get('txtPublishing'));
		$editBook->setEdition(Input::get('txtEdition'));
		$editBook->setYear(Input::get('txtYear'));
		$editBook->setDetail(Input::get('txtDetail'));
		$editBook->setISBN(Input::get('txtISBN'));
		$editBook->setCallNum(Input::get('txtCallNum'));
		$editBook->setType(Input::get('ddlType'));
		$editBook->setSubType(Input::get('ddlSubType'));
		$editBook->setStatus(Input::get('ddlStatus'));
		$editBook->setUserBooking(Input::get('txtUserBooking'));
		$editBook->setUserBorrow(Input::get('txtUserBorrow'));
		$editBook->setDateBooking($DateBooking);
		$editBook->setDateBorrow($DateBorrow);
		$editBook->setDateReturn($DateReturn);
		$editBook->editBookRepository();
	}

	public function delete_book()
	{
		if(!isset($_POST["chkDel"])){
			echo "No select Book.<br>";
			echo "<br> Go to <a href='list_book'>List Book</a>";
		}else {
			for($i=0;$i<count($_POST["chkDel"]);$i++){
				if(($_POST["chkDel"][$i]) != ""){
					BookRepository::destroy($_POST["chkDel"][$i]);
				}
			}
			echo "Delete Complete.<br>";
			echo "<br> Go to <a href='list_book'>List Book</a>";
		}
	}

	public function search()
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

	public function searchView(){
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

			if(!BookController::compareDate($dateBooking,$dateLimit)){
				echo "Day Borrow must no more than ".$dateLimit."<br/> " ;
				echo "Day Borrow must no less than ".$dateNow."<br/> " ;

			}else {
				$BookingBook = new Book;
				$BookingBook->setBookID($_GET["BookID"]);
				$BookingBook->setStatus($txtBooking);
				$BookingBook->setUserBooking($_SESSION['id']);
				$BookingBook->setDateBooking($dateNow);
				$BookingBook->setDateBorrow($dateBooking);
				$BookingBook->BookingBookRepository();
			}
		}else{
			$dateNow=date("d-m-Y");
			$dateBooking =  $tmpBook->DateBooking ;
			$dateBorrow = $sD1."-".$sM1."-".$sY1 ;
			$dateLimit = date("d-m-Y", strtotime("+7 day", strtotime($dateBooking)));

			if(!BookController::compareDate($dateBorrow,$dateLimit)){
				echo "Day Borrow must no more than ".$dateLimit."<br/> " ;
				echo "Day Borrow must no less than ".$dateNow."<br/> " ;

			}else {
				$BookingBook = new Book;
				$BookingBook->setBookID($_GET["BookID"]);
				$BookingBook->setDateBorrow($dateBorrow);
				$BookingBook->BookingBookRepository();
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
		$BookingBook->setBookID($_GET["BookID"]);
		$BookingBook->setStatus($txtBooking);
		$BookingBook->setUserBooking($txtBookID);
		$BookingBook->setDateBooking($txtDate);
		$BookingBook->setDateBorrow($txtDate);
		$BookingBook->CancelBookingRepository();
		
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

		if(!BookController::compareDate($dateReturnNew,$dateLimit)){
			echo "Day Borrow must no more than ".$dateLimit."<br/> " ;
			echo "Day Borrow must no less than ".$dateNow."<br/> " ;

		}else {
			$BookingBook = new Book;
			$BookingBook->setBookID($_GET["BookID"]);
			$BookingBook->setDateReturn($dateReturnNew);
			$BookingBook->setLimitBorrow($Limit);
			$BookingBook->BorrowConRepository();
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
		$ReturnBook->setBookID($_GET["BookID"]);
		$ReturnBook->setStatus($txtBookStatus);
		$ReturnBook->setUserBooking($txtUserID);
		$ReturnBook->setUserBorrow($txtUserID);
		$ReturnBook->setDateBooking($txtDate);
		$ReturnBook->setDateBorrow($txtDate);
		$ReturnBook->setDateReturn($txtDate);
		$ReturnBook->setLimitBorrow($Limit);
		$ReturnBook->ReturnBookRepository();
		
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

		if(!BookController::compareDate($dateBorrow,$dateReturn)){
			echo "Day Borrow must no more than ".$dateReturn."<br/> " ;
			echo "Day Borrow must no less than ".$dateNow."<br/> " ;

		}else {
			$BorrowBook = new Book;
			$BorrowBook->setBookID($_GET["BookID"]);
			$BorrowBook->setStatus($txtBookStatus);
			$BorrowBook->setUserBorrow(Input::get('txtUserBorrow'));
			$BorrowBook->setDateBorrow($dateBorrow);
			$BorrowBook->setDateReturn($dateReturn);
			$BorrowBook->BorrowRepository();
		}

	}

	public function detailbook()
	{
		$tmpBook = BookRepository::find($_GET["BookID"]);
		return View::make('detail_book')->with('Book',$tmpBook);
	}



}