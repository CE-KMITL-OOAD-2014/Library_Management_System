<?php

class InterfaceBookRepo {

    public function getRepository($inISBN){
            $tmpRepo = BookRepository::where('ISBN','=',$inISBN)->get();
            $tmpData = new Book;
            if(count($tmpRepo)==1){
             $tmpData->setBookID($tmpRepo[0]->id);
             $tmpData->setTitle1($tmpRepo[0]->Title1);
             $tmpData->setTitle2($tmpRepo[0]->Title2);
             $tmpData->setSubject($tmpRepo[0]->Subject);
             $tmpData->setAuthor($tmpRepo[0]->Author);
             $tmpData->setPublishing($tmpRepo[0]->Publishing);
             $tmpData->setEdition($tmpRepo[0]->Edition);
             $tmpData->setYear($tmpRepo[0]->Year);
             $tmpData->setDetail($tmpRepo[0]->Detail);
             $tmpData->setISBN($tmpRepo[0]->ISBN);
             $tmpData->setCallNum($tmpRepo[0]->CallNum);
             $tmpData->setType($tmpRepo[0]->Type);
             $tmpData->setSubType($tmpRepo[0]->SubType);
             $tmpData->setStatus($tmpRepo[0]->Status);
             echo "Pass";
         }else{
             echo "Fail";
         }
     }

     public function editBookRepository($book){
        $tmpRepo = BookRepository::find($book->getBookIDold());
        if($tmpRepo!=NULL){
            if($book->getBookIDold()==$book->getBookID()){
                DB::table('books')->where('id','=',$book->getBookIDold())->update(array('id' => $book->getBookID(),'Title1' => $book->getTitle1(),'Title2' => $book->getTitle2(),
                    'Subject' => $book->getSubject(),'Author' => $book->getAuthor(),'Publishing' => $book->getPublishing(),'Edition' => $book->getEdition(),
                    'Year' => $book->getYear(),'Detail' => $book->getDetail(),'ISBN' => $book->getISBN(),'CallNum' => $book->getCallNum(),
                    'Type' => $book->getType(),'SubType' => $book->getSubType(),'Status' =>$book->getStatus(),'UserBooking' => $book->getUserBooking(),
                    'UserBorrow' => $book->getUserBorrow(),'DateBooking' => $book->getDateBooking(),'DateBorrow' => $book->getDateBorrow(),'DateReturn' => $book->getDateReturn()));   
                echo "Save Completed!<br>";
                echo "<a href=list_book>List Book</a><br>";
            }else{
                $tmpID = BookRepository::find($book->getBookID());
                if($tmpID==NULL){
                    DB::table('books')->where('id','=',$book->getBookIDold())->update(array('id' => $book->getBookID(),'Title1' => $book->getTitle1(),'Title2' => $book->getTitle2(),
                        'Subject' => $book->getSubject(),'Author' => $book->getAuthor(),'Publishing' => $book->getPublishing(),'Edition' => $book->getEdition(),
                        'Year' => $book->getYear(),'Detail' => $book->getDetail(),'ISBN' => $book->getISBN(),'CallNum' => $book->getCallNum(),
                        'Type' => $book->getType(),'SubType' => $book->getSubType(),'Status' =>$book->getStatus(),'UserBooking' => $book->getUserBooking(),
                        'UserBorrow' => $book->getUserBorrow(),'DateBooking' => $book->getDateBooking(),'DateBorrow' => $book->getDateBorrow(),'DateReturn' => $book->getDateReturn()));  
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

    public function saveRepository($book){
        $temp = 0 ;
        $tempDate = "00-00-0000" ;
        $tmpData = new BookRepository;
        $tmpData->id = $book->getBookID();
        $tmpData->Title1 = $book->getTitle1();
        $tmpData->Title2 = $book->getTitle2();
        $tmpData->Subject = $book->getSubject();
        $tmpData->Author = $book->getAuthor();
        $tmpData->Publishing = $book->getPublishing();
        $tmpData->Edition = $book->getEdition();
        $tmpData->Year = $book->getYear();
        $tmpData->Detail = $book->getDetail();
        $tmpData->ISBN = $book->getISBN();
        $tmpData->CallNum = $book->getCallNum();
        $tmpData->Type = $book->getType();
        $tmpData->SubType = $book->getSubType();
        $tmpData->Status = $book->getStatus();
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

}