<?php

class Service {

	//booking book from member to repository 'books'.
	public function BookingBookRepository($book){
		$tmpRepo = BookRepository::find($book->getBookID());
		if($tmpRepo!=NULL){
			if($tmpRepo->DateBooking == "00-00-0000"){
				DB::table('books')->where('id','=',$book->getBookID())->update(array('Status' => "Booking" ,'UserBooking' => $book->getUserBooking(),
					'DateBooking' => $book->getDateBooking(),'DateBorrow' => $book->getDateBorrow()));  
				return 2;
			}else{
				DB::table('books')->where('id','=',$book->getBookID())->update(array('DateBorrow' => $book->getDateBorrow()));   
				return 1;
			}
		}else{
			return 0;
		}
	}

	//cancel booking book from member to repository 'books' (manual).
	public function CancelBookingRepository($book){
		$tmpRepo = BookRepository::find($book->getBookID());
		if($tmpRepo!=NULL){
			DB::table('books')->where('id','=',$book->getBookID())->update(array('Status' => $book->getStatus(),'UserBooking' => $book->getUserBooking(),
				'DateBooking' => $book->getDateBooking(),'DateBorrow' => $book->getDateBorrow()));   
			return 1;
		}else{
			return 0;
		}
	}

	//renew book from member to repository 'books'.
	public function BorrowConRepository($book){
		$tmpRepo = BookRepository::find($book->getBookID());
		if($tmpRepo!=NULL){
			DB::table('books')->where('id','=',$book->getBookID())->update(array('DateReturn' => $book->getDateReturn()
				,'LimitBorrow' => $book->getLimitBorrow()));   
			return 1;
		}else{
			return 0;
		}
	}

	//return book from librarian to repository 'books'.
	public function ReturnBookRepository($book){
		$tmpRepo = BookRepository::find($book->getBookID());
		if($tmpRepo!=NULL){
			DB::table('books')->where('id','=',$book->getBookID())->update(array('Status' => $book->getStatus(),'UserBooking' => $book->getUserBooking(),
				'UserBorrow' => $book->getUserBorrow(),'DateBooking' => $book->getDateBooking(),'DateBorrow' => $book->getDateBorrow(),
				'DateReturn' => $book->getDateReturn(),'LimitBorrow' => $book->getLimitBorrow()));  
			return 1;
		}else{
			return 0;
		}
	}

	//borrow book from member to repository 'books'.
	public function BorrowRepository($book){
		$tmpRepo = BookRepository::find($book->getBookID());
		if($tmpRepo!=NULL){
			DB::table('books')->where('id','=',$book->getBookID())->update(array('Status' => $book->getStatus(),'UserBooking' => $book->getUserBooking(),
				'UserBorrow' => $book->getUserBorrow(),'DateBorrow' => $book->getDateBorrow(),'DateReturn' => $book->getDateReturn(),'Topchart' => $book->getTopchart()));   
			return 1;
		}else{
			return 0;
		}
	}

	//cancel booking book from member to repository 'books' (automatic).
	public function AutoCancelBookingRepository($book){
		$UserID = 0 ;
		$tmpRepo = BookRepository::find($book->getBookID());
		if($tmpRepo!=NULL){
			DB::table('books')->where('id','=',$book->getBookID())->update(array('Status' => $book->getStatus(),'UserBooking' => $UserID,
				'DateBooking' => $book->getDateBooking(),'DateBorrow' => $book->getDateBorrow()));   
		}
	}

	//increase fine when member borrow book overdue.
	public function AutoFineRepository($fine){
		$tmpRepo = PersonRepository::find($fine->getUserID());
		if($tmpRepo!=NULL){
			DB::table('members')->where('id','=',$fine->getUserID())->update(array('Fine' => $fine->getFine()));   
		}
	}

	//pay fine when member pay fine to librarian.
	public function PayFineRepository($fine){
		$tmpRepo = PersonRepository::find($fine->getUserID());
		if($tmpRepo!=NULL){
			DB::table('members')->where('id','=',$fine->getUserID())->update(array('Fine' => $fine->getFine()));   
			return 1;
		}else{
			return 0;
		}
	}

	//set count number of book that a member is borrowing for the most of borrowed in 10 order to repository 'books'.
	public function TopchartRepository($book){
		$tmpRepo = BookRepository::find($book->getBookID());
		if($tmpRepo!=NULL){
			DB::table('books')->where('id','=',$book->getBookID())->update(array('Topchart' => $book->getTopchart()));   
		}
	}

	//count number of book that a member is booking.
	public function countUserBooking($inID){
		$inRepository = BookRepository::where('UserBooking','like',$inID)->get();
		return $inRepository;
	}

	//count number of book that a member is borrowing.
	public function countUserBorrow($inID){
		$inRepository = BookRepository::where('UserBorrow','like',$inID)->get();
		return $inRepository;
	}

	//get book is most of borrowed in 10 order from repository 'books'.
	public function getTopChartBook(){
		$inRepository = BookRepository::where('NumBooks','=',0)->orderBy('Topchart','desc')->get();
		return $inRepository;
	}
}