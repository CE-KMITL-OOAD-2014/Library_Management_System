<?php

class Book {

    private $BookIDold;
    private $BookID;
    private $Title1; //Title(Thai)
    private $Title2; //Title(English)
    private $Subject;
    private $Author;
    private $Publishing;
    private $Edition;
    private $Year;
    private $Detail;
    private $ISBN;
    private $CallNum;
    private $Type;
    private $SubType;
    private $Status;

    public function __construct(){
        $this->BookIDold = NULL;
        $this->BookID = NULL;
        $this->Title1 = NULL;
        $this->Title2 = NULL;
        $this->Subject = NULL;
        $this->Author = NULL;
        $this->Publishing = NULL;
        $this->Edition = NULL;
        $this->Year = NULL;
        $this->Detail = NULL;
        $this->ISBN = NULL;
        $this->CallNum = NULL;
        $this->Type = NULL;
        $this->SubType = NULL;
        $this->Status = NULL;
    }

    public function getRepository($inISBN){
        $tmpRepo = BookRepository::where('ISBN','=',$inISBN)->get();
        $tmpData = new Book;
        if(count($tmpRepo)==1){
         $tmpData->BookID = $tmpRepo[0]->id;
         $tmpData->Title1 = $tmpRepo[0]->Title1;
         $tmpData->Title2 = $tmpRepo[0]->Title2;
         $tmpData->Subject = $tmpRepo[0]->Subject;
         $tmpData->Author = $tmpRepo[0]->Author;
         $tmpData->Publishing = $tmpRepo[0]->Publishing;
         $tmpData->Edition = $tmpRepo[0]->Edition;
         $tmpData->Year = $tmpRepo[0]->Year;
         $tmpData->Detail = $tmpRepo[0]->Detail;
         $tmpData->ISBN = $tmpRepo[0]->ISBN;
         $tmpData->CallNum = $tmpRepo[0]->CallNum;
         $tmpData->Type = $tmpRepo[0]->Type;
         $tmpData->SubType = $tmpRepo[0]->SubType;
         $tmpData->Status = $tmpRepo[0]->Status;
         echo "Pass";
     }else{
         echo "Fail";
     }
 }

 public function editBookRepository(){
    $tmpRepo = BookRepository::find($this->BookIDold);
    if($tmpRepo!=NULL){
        if($this->BookIDold==$this->BookID){
            DB::table('books')->where('id','=',$this->BookIDold)->update(array('id' => $this->BookID,'Title1' => $this->Title1,'Title2' => $this->Title2,
                'Subject' => $this->Subject,'Author' => $this->Author,'Publishing' => $this->Publishing,'Edition' => $this->Edition,
                'Year' => $this->Year,'Detail' => $this->Detail,'ISBN' => $this->ISBN,'CallNum' => $this->CallNum,
                'Type' => $this->Type,'SubType' => $this->SubType,'Status' => $this->Status,'UserBooking' => $this->UserBooking,
                'UserBorrow' => $this->UserBorrow,'DateBooking' => $this->DateBooking,'DateBorrow' => $this->DateBorrow,'DateReturn' => $this->DateReturn));   
            echo "Save Completed!<br>";
            echo "<a href=list_book>List Book</a><br>";
        }else{
            $tmpID = BookRepository::find($this->BookID);
            if($tmpID==NULL){
                DB::table('books')->where('id','=',$this->BookIDold)->update(array('id' => $this->BookID,'Title1' => $this->Title1,'Title2' => $this->Title2,
                    'Subject' => $this->Subject,'Author' => $this->Author,'Publishing' => $this->Publishing,'Edition' => $this->Edition,
                    'Year' => $this->Year,'Detail' => $this->Detail,'ISBN' => $this->ISBN,'CallNum' => $this->CallNum,
                    'Type' => $this->Type,'SubType' => $this->SubType,'Status' => $this->Status,'UserBooking' => $this->UserBooking,
                    'UserBorrow' => $this->UserBorrow,'DateBooking' => $this->DateBooking,'DateBorrow' => $this->DateBorrow,'DateReturn' => $this->DateReturn));   
                echo "Save Completed!<br>";
                echo "<a href=list_book>List Book</a><br>";
            }else{
                echo "BookID already exists!";
            }
        }
    }else{
        echo "Fail";
    }
}

public function saveRepository(){
    $temp = 0 ;
    $tempDate = "00-00-0000" ;
    $tmpData = new BookRepository;
    $tmpData->id = $this->BookID;
    $tmpData->Title1 = $this->Title1;
    $tmpData->Title2 = $this->Title2;
    $tmpData->Subject = $this->Subject;
    $tmpData->Author = $this->Author;
    $tmpData->Publishing = $this->Publishing;
    $tmpData->Edition = $this->Edition;
    $tmpData->Year = $this->Year;
    $tmpData->Detail = $this->Detail;
    $tmpData->ISBN = $this->ISBN;
    $tmpData->CallNum = $this->CallNum;
    $tmpData->Type = $this->Type;
    $tmpData->SubType = $this->SubType;
    $tmpData->Status = $this->Status;
    $tmpData->UserBooking = $temp;
    $tmpData->UserBorrow = $temp;
    $tmpData->DateBooking = $tempDate;
    $tmpData->DateBorrow = $tempDate;
    $tmpData->DateReturn = $tempDate;

    if($tmpData->id==NULL){
        $tmpData->save();
        echo "Register Book Completed!";
        echo "<br> Go to <a href='/person/profile'>Admin page</a>";
    }else{
        echo "Fail!";
        echo "<br> Go to <a href='register'>Register page</a>";
    }
}

public function BookingBookRepository(){
    $tmpRepo = BookRepository::find($this->BookID);
    if($tmpRepo!=NULL){
        if($tmpRepo->DateBooking == "00-00-0000"){
            DB::table('books')->where('id','=',$this->BookID)->update(array('Status' => $this->Status,'UserBooking' => $this->UserBooking,
                'DateBooking' => $this->DateBooking,'DateBorrow' => $this->DateBorrow));   
            echo "Save Completed!<br>";
            echo "<a href=search_book>Go to Search Book</a><br>";
        }else{
            DB::table('books')->where('id','=',$this->BookID)->update(array('DateBorrow' => $this->DateBorrow));   
            echo "Save Edit Date Borrow Completed!<br>";
            echo "<a href=booking_history>Go to Booking History</a><br>";
        }
    }else{
        echo "Not Found Book!";
        echo "<a href=search_book>Go to Search Book</a><br>";
    }
}

public function CancelBookingRepository(){
    $tmpRepo = BookRepository::find($this->BookID);
    if($tmpRepo!=NULL){
            DB::table('books')->where('id','=',$this->BookID)->update(array('Status' => $this->Status,'UserBooking' => $this->UserBooking,
            'DateBooking' => $this->DateBooking,'DateBorrow' => $this->DateBorrow));   
            echo "Cancel Booking Completed!<br>";
            echo "<a href=booking_history>Go to Booking History</a><br>";
    }else{
        echo "Not Found Book!";
        echo "<a href=search_book>Go to Search Book</a><br>";
    }
}

public function BorrowConRepository(){
    $tmpRepo = BookRepository::find($this->BookID);
    if($tmpRepo!=NULL){
            DB::table('books')->where('id','=',$this->BookID)->update(array('DateReturn' => $this->DateReturn
                ,'LimitBorrow' => $this->LimitBorrow));   
            echo "Borrow Continues Completed!<br>";
            echo "<a href=borrow_history>Go to Borrow History</a><br>";
    }else{
        echo "Not Found Book!";
        echo "<a href=search_book>Go to Search Book</a><br>";
    }
}

public function ReturnBookRepository(){
    $tmpRepo = BookRepository::find($this->BookID);
    if($tmpRepo!=NULL){
            DB::table('books')->where('id','=',$this->BookID)->update(array('Status' => $this->Status,'UserBooking' => $this->UserBooking,
                'UserBorrow' => $this->UserBorrow,'DateBooking' => $this->DateBooking,'DateBorrow' => $this->DateBorrow,
                'DateReturn' => $this->DateReturn,'LimitBorrow' => $this->LimitBorrow));  
            echo "Return Book Completed!<br>";
            echo "<a href=list_book>Go to List Book</a><br>";
    }else{
        echo "Not Found Book!";
        echo "<a href=search_book>Go to Search Book</a><br>";
    }
}

public function BorrowRepository(){
    $tmpRepo = BookRepository::find($this->BookID);
    if($tmpRepo!=NULL){
            DB::table('books')->where('id','=',$this->BookID)->update(array('Status' => $this->Status,'UserBorrow' => $this->UserBorrow,'DateBorrow' => $this->DateBorrow
                ,'DateReturn' => $this->DateReturn));   
            echo "Borrow Completed!<br>";
            echo "<a href=list_book>Go to List Book</a><br>";
    }else{
        echo "Not Found Book!";
        echo "<a href=search_book>Go to Search Book</a><br>";
    }
}

public function getBookIDold(){
    return $this->BookIDold;
}

public function setBookIDold($inBookIDold){
    $this->BookIDold = $inBookIDold;
}

public function getBookID(){
    return $this->BookID;
}

public function setBookID($inBookID){
    $this->BookID = $inBookID;
}

public function getTitle1(){
    return $this->Title1;
}

public function setTitle1($inTitle1){
    $this->Title1 = $inTitle1;
}

public function getTitle2(){
    return $this->Title2;
}

public function setTitle2($inTitle2){
    $this->Title2 = $inTitle2;
}

public function getSubject(){
    return $this->Subject;
}

public function setSubject($inSubject){
    $this->Subject = $inSubject;
}

public function getAuthor(){
    return $this->Author;
}

public function setAuthor($inAuthor){
    $this->Author = $inAuthor;
}

public function getPublishing(){
    return $this->Publishing;
}

public function setPublishing($inPublishing){
    $this->Publishing = $inPublishing;
}

public function getEdition(){
    return $this->Edition;
}

public function setEdition($inEdition){
    $this->Edition = $inEdition;
}

public function getYear(){
    return $this->Year;
}

public function setYear($inYear){
    $this->Year = $inYear;
}

public function getDetail(){
    return $this->Detail;
}

public function setDetail($inDetail){
    $this->Detail = $inDetail;
}

public function getISBN(){
    return $this->ISBN;
}

public function setISBN($inISBN){
    $this->ISBN = $inISBN;
}

public function getCallNum(){
    return $this->CallNum;
}

public function setCallNum($inCallNum){
    $this->CallNum = $inCallNum;
}

public function getType(){
    return $this->Type;
}

public function setType($inType){
    $this->Type = $inType;
}

public function getSubType(){
    return $this->SubType;
}

public function setSubType($inSubType){
    $this->SubType = $inSubType;
}

public function getStatus(){
    return $this->Status;
}

public function setStatus($inStatus){
    $this->Status = $inStatus;
}

public function setUserBooking($inUserBooking){
    $this->UserBooking = $inUserBooking;
}

public function getUserBooking(){
    return $this->UserBooking;
}

public function setUserBorrow($inUserBorrow){
    $this->UserBorrow = $inUserBorrow;
}

public function getUserBorrow(){
    return $this->UserBorrow;
}

public function setDateBooking($inDateBooking){
    $this->DateBooking = $inDateBooking;
}

public function getDateBooking(){
    return $this->DateBooking;
}

public function setDateBorrow($inDateBorrow){
    $this->DateBorrow = $inDateBorrow;
}

public function getDateBorrow(){
    return $this->DateBorrow;
}

public function setDateReturn($inDateReturn){
    $this->DateReturn = $inDateReturn;
}

public function getDateReturn(){
    return $this->DateReturn;
}

public function setLimitBorrow($inLimitBorrow){
    $this->LimitBorrow = $inLimitBorrow;
}

public function getLimitBorrow(){
    return $this->LimitBorrow;
}


}