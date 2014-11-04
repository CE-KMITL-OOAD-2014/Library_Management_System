<?php

class Service {
	public function BookingBookRepository($book){
	    $tmpRepo = BookRepository::find($book->getBookID());
	    if($tmpRepo!=NULL){
	        if($tmpRepo->DateBooking == "00-00-0000"){
	            DB::table('books')->where('id','=',$book->getBookID())->update(array('Status' => $book->getStatus(),'UserBooking' => $book->getUserBooking(),
	                'DateBooking' => $book->getDateBooking(),'DateBorrow' => $book->getDateBorrow()));   
	            echo "Save Completed!<br>";
	            echo "<a href=search_book>Go to Search Book</a><br>";
	        }else{
	            DB::table('books')->where('id','=',$book->getBookID())->update(array('DateBorrow' => $book->getDateBorrow()));   
	            echo "Save Edit Date Borrow Completed!<br>";
	            echo "<a href=booking_history>Go to Booking History</a><br>";
	        }
	    }else{
	        echo "Not Found Book!";
	        echo "<a href=search_book>Go to Search Book</a><br>";
	    }
	}

	public function CancelBookingRepository($book){
	    $tmpRepo = BookRepository::find($book->getBookID());
	    if($tmpRepo!=NULL){
	            DB::table('books')->where('id','=',$book->getBookID())->update(array('Status' => $book->getStatus(),'UserBooking' => $book->getUserBooking(),
	            'DateBooking' => $book->getDateBooking(),'DateBorrow' => $book->getDateBorrow()));   
	            echo "Cancel Booking Completed!<br>";
	            echo "<a href=booking_history>Go to Booking History</a><br>";
	    }else{
	        echo "Not Found Book!";
	        echo "<a href=search_book>Go to Search Book</a><br>";
	    }
	}

	public function BorrowConRepository($book){
	    $tmpRepo = BookRepository::find($book->getBookID());
	    if($tmpRepo!=NULL){
	            DB::table('books')->where('id','=',$book->getBookID())->update(array('DateReturn' => $book->getDateReturn()
	                ,'LimitBorrow' => $book->getLimitBorrow()));   
	            echo "Borrow Continues Completed!<br>";
	            echo "<a href=borrow_history>Go to Borrow History</a><br>";
	    }else{
	        echo "Not Found Book!";
	        echo "<a href=search_book>Go to Search Book</a><br>";
	    }
	}

	public function ReturnBookRepository($book){
	    $tmpRepo = BookRepository::find($book->getBookID());
	    if($tmpRepo!=NULL){
	            DB::table('books')->where('id','=',$book->getBookID())->update(array('Status' => $book->getStatus(),'UserBooking' => $book->getUserBooking(),
	                'UserBorrow' => $book->getUserBorrow(),'DateBooking' => $book->getDateBooking(),'DateBorrow' => $book->getDateBorrow(),
	                'DateReturn' => $book->getDateReturn(),'LimitBorrow' => $book->getLimitBorrow()));  
	            echo "Return Book Completed!<br>";
	            echo "<a href=list_book>Go to List Book</a><br>";
	    }else{
	        echo "Not Found Book!";
	        echo "<a href=search_book>Go to Search Book</a><br>";
	    }
	}

	public function BorrowRepository($book){
	    $tmpRepo = BookRepository::find($book->getBookID());
	    if($tmpRepo!=NULL){
	            DB::table('books')->where('id','=',$book->getBookID())->update(array('Status' => $book->getStatus(),'UserBorrow' => $book->getUserBorrow(),
	                'DateBorrow' => $book->getDateBorrow(),'DateReturn' => $book->getDateReturn()));   
	            echo "Borrow Completed!<br>";
	            echo "<a href=list_book>Go to List Book</a><br>";
	    }else{
	        echo "Not Found Book!";
	        echo "<a href=search_book>Go to Search Book</a><br>";
	    }
	}
}