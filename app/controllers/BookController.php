<?php

class BookController extends BaseController {

	public function save_register()
	{
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

	public function detail($id)
	{
		$tmpBook = BookRepository::find($id);
		return View::make('detailBook')->with('Book',$tmpBook);
	}

	public function edit($id)
	{
		$tmpBook = BookRepository::find($id);
		return View::make('edit_book')->with('Book',$tmpBook);
	}


}