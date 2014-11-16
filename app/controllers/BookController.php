<?php

class BookController extends ServiceController {

	//save book when librarian registered it.
	public function save_register(){
		session_start();
		if($_SESSION['Status'] != "ADMIN"){
			return View::make('alert/alertWarning');
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
		$newBook->setStatus(Input::get('ddlStatus'));
		if (Input::hasFile('book_file')) {
			$size = Input::file('book_file')->getSize();
			$sizelimit = 512000; //500KB
			$type = substr(Input::file('book_file')->getMimeType(),0,5);
			if($size > $sizelimit){
			 	return View::make('alert/service/alertPicture');
			}else{
				if($type=='image'){
					$file = Input::file('book_file');
					$destinationPath = "bookPicture";
					$filename = date('Y-m-d').'_'.$file->getClientOriginalName();
					$uploadSuccess  = $file->move($destinationPath, $filename);
					$newPerson->setPath_file($filename);
			 	}else{
					return View::make('alert/service/alertFile');
			 	}
			}
		}
		$returnValue = $toRepository->saveRepository($newBook);

		if($returnValue==1){
			return View::make('alert/book/alertRegister');
		}else{
			return View::make('alert/book/alertRegister2');
		}
	}

	//show list of books.
	public function show_list(){
		ServiceController::auto_cancel_booking() ;
		ServiceController::auto_fine();
		session_start();
		if($_SESSION['Status'] != "ADMIN"){
			return View::make('alert/authen/alertWarning');
		}

		$inRepository = new InterfaceBookRepo;
		$tmpBook = $inRepository->getRepositoryAll();
		return View::make('listBook')->with('Book',$tmpBook);
	}

	public function edit_book(){
		$inRepository = new InterfaceBookRepo;
		$tmpBook = $inRepository->getRepositoryByID($_GET["BookID"]);
		return View::make('edit_book')->with('Book',$tmpBook);
	}

	//save book when librarian edited it.
	public function save_edit_book(){
		session_start();
		if($_SESSION['id'] == ""){
			return View::make('alert/authen/alertLogin2');
		}

		$sD1=Input::get('sD1') ;
		$sM1=Input::get('sM1') ;
		$sY1=Input::get('sY1') ;
		$sD2=Input::get('sD2') ;
		$sM2=Input::get('sM2') ;
		$sY2=Input::get('sY2') ;
		$DateBorrow = $sD1."-".$sM1."-".$sY1 ;
		$DateReturn = $sD2."-".$sM2."-".$sY2 ;
		$DateBooking = "00-00-0000" ;
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
		$editBook->setStatus(Input::get('ddlStatus'));
		$editBook->setUserBooking(Input::get('txtUserBooking'));
		$editBook->setUserBorrow(Input::get('txtUserBorrow'));
		$editBook->setDateBooking($DateBooking);
		$editBook->setDateBorrow($DateBorrow);
		$editBook->setDateReturn($DateReturn);
		$editBook->setPath_file($_GET["path_file"]);

		if (Input::hasFile('book_file')) {
			$size = Input::file('book_file')->getSize();
			$sizelimit = 512000; //500KB
			$type = substr(Input::file('book_file')->getMimeType(),0,5);
			if($size > $sizelimit){
			 	return View::make('alert/service/alertPicture');
			}else{
				if($type=='image'){
					$file = Input::file('book_file');
					$destinationPath = "bookPicture";
					$filename = date('Y-m-d').'_'.$file->getClientOriginalName();
					$uploadSuccess  = $file->move($destinationPath, $filename);
					$newPerson->setPath_file($filename);
			 	}else{
					return View::make('alert/service/alertFile');
			 	}
			}
		}
		$returnValue = $toRepository->editBookRepository($editBook);

		if($returnValue==2){
			return View::make('alert/book/alertSave')->with('BookID',$_GET["BookID"]);
		}else if($returnValue==1){
			return View::make('alert/book/alertSave3');
		}else{
			return View::make('alert/book/alertSave2');
		}
	}

	//delete book by checkbox in list of books pages.
	public function delete_book(){
		$toRepository = new InterfaceBookRepo;
		if(!isset($_POST["chkDel"])){
			return View::make('alert/book/alertDelete');
		}else{
			for($i=0;$i<count($_POST["chkDel"]);$i++){
				if(($_POST["chkDel"][$i]) != ""){
					$toRepository->deleteRepository($_POST["chkDel"][$i]);
				}
			}
			return View::make('alert/book/alertDelete2');
		}
	}

	//delete book by botton in detailbook pages.
	public function delete_one(){
		$toRepository = new InterfaceBookRepo;
		$toRepository->deleteRepository($_GET["BookID"]);
		return View::make('alert/book/alertDelete2');
	}

	public function detailbook(){
		ServiceController::auto_cancel_booking() ;
		ServiceController::auto_fine();

		session_start();
		if($_SESSION['Status'] == "USER"){
			$inRepository = new InterfaceBookRepo;
			$tmpBook = $inRepository->getRepositoryByID($_GET["BookID"]);
			return View::make('detail_book')->with('Book',$tmpBook);
		}else{
			$inRepository = new InterfaceBookRepo;
			$tmpBook = $inRepository->getRepositoryByID($_GET["BookID"]);
			return View::make('detail_book_admin')->with('Book',$tmpBook);
		}
	}

	//add book which have registerd to amount required.
	public function num_book(){
		ServiceController::auto_cancel_booking() ;
		ServiceController::auto_fine();

		$inRepository = new InterfaceBookRepo;
		$tmpBook = $inRepository->getRepositoryByID($_GET["BookID"]);
		return View::make('add_numbook')->with('Book',$tmpBook);	
	}

	//add new book which not registerd.
	public function add_book(){
		ServiceController::auto_cancel_booking() ;
		ServiceController::auto_fine();

		$Numbook = Input::get('txtNumBook');
		$Status = "OnBookshelf" ;
		$inRepository = new InterfaceBookRepo;
		$inRepository2 = new InterfaceBookRepo;
		$addBook = new Book;
		$toRepository = new InterfaceBookRepo;
		$tmpBook = $inRepository->getRepositoryByID($_GET["BookID"]);
		for($i=1;$i<$Numbook;$i++){
			$find = "$tmpBook->Title1"."($i)";
			$temp = $inRepository2->getRepositoryByTitle($find);
			if(count($temp)<1 ){
				$addBook->setTitle1($tmpBook->Title1."($i)");
				$addBook->setTitle2($tmpBook->Title2."($i)");
				$addBook->setSubject($tmpBook->Subject);
				$addBook->setAuthor($tmpBook->Author);
				$addBook->setPublishing($tmpBook->Publishing);
				$addBook->setEdition($tmpBook->Edition);
				$addBook->setYear($tmpBook->Year);
				$addBook->setDetail($tmpBook->Detail);
				$addBook->setISBN($tmpBook->ISBN);
				$addBook->setCallNum($tmpBook->CallNum);
				$addBook->setType($tmpBook->Type);
				$addBook->setStatus($Status);
				$addBook->setPath_file($tmpBook->Filename);
				$addBook->setNumBooks($i);
				$toRepository->addRepository($addBook);
			}
		}
		return View::make('alert/book/alertAdd')->with('Book',$Numbook);
	}
}