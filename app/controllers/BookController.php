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
		$toRepository = new InterfaceBookRepo;
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
		$toRepository->saveRepository($newBook);
	}

	public function save_edit()
	{
		$editBook = new Book;
		$toRepository = new InterfaceBookRepo;
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
		$toRepository->editRepository($editBook);
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
		$toRepository = new InterfaceBookRepo;
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
		$toRepository->editBookRepository($editBook);
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

	public function detailbook()
	{
		$tmpBook = BookRepository::find($_GET["BookID"]);
		return View::make('detail_book')->with('Book',$tmpBook);
	}

}