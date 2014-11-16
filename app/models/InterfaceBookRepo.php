<?php

class InterfaceBookRepo {

    public function getRepositoryAll(){
        $inRepository = BookRepository::All();
        return $inRepository;
    }

    public function getRepositoryByID($inID){
        $inRepository = BookRepository::find($inID);
        return $inRepository;
    }

    public function getRepositoryByTitle($inTitle){
        $inRepository = BookRepository::where('Title1','like',$inTitle)->get();
        return $inRepository;
    }

    public function getRepositoryBySearchTitle($inTitle){
        $inRepository = BookRepository::where('Title1','like',"$inTitle%")->orWhere('Title2','like',"$inTitle%")->get();
        return $inRepository;
    }

    public function getRepositoryBySearchAuthor($inAuthor){
        $inRepository = BookRepository::where('Author','like',"$inAuthor%")->get();
        return $inRepository;
    }

    public function getRepositoryBySearchCallNum($inCallNum){
        $inRepository = BookRepository::where('CallNum','like',"$inCallNum%")->get();
        return $inRepository;
    }

    public function getRepositoryBySearchSubject($inSubject){
        $inRepository = BookRepository::where('Subject','like',"$inSubject%")->get();
        return $inRepository;
    }

    public function getRepositoryBySearchISBN($inISBN){
        $inRepository = BookRepository::where('ISBN','like',"$inISBN%")->get();
        return $inRepository;
    }

    public function getRepositoryByType($inType){
        $inRepository = BookRepository::where('Type','=',$inType)->get();
        return $inRepository;
    }

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
            $tmpData->setStatus($tmpRepo[0]->Status);
            return $tmpData;
        }else{
            return NULL;
        }
    }

    public function editBookRepository($book){
        $tmpRepo = BookRepository::find($book->getBookIDold());
        if($tmpRepo!=NULL){
            if($book->getBookIDold()==$book->getBookID()){
                DB::table('books')->where('id','=',$book->getBookIDold())->update(array('id' => $book->getBookID(),'Title1' => $book->getTitle1(),'Title2' => $book->getTitle2(),
                    'Subject' => $book->getSubject(),'Author' => $book->getAuthor(),'Publishing' => $book->getPublishing(),'Edition' => $book->getEdition(),
                    'Year' => $book->getYear(),'Detail' => $book->getDetail(),'ISBN' => $book->getISBN(),'CallNum' => $book->getCallNum(),
                    'Type' => $book->getType(),'Status' =>$book->getStatus(),'UserBooking' => $book->getUserBooking(),
                    'UserBorrow' => $book->getUserBorrow(),'DateBooking' => $book->getDateBooking(),'DateBorrow' => $book->getDateBorrow(),
                    'DateReturn' => $book->getDateReturn(), 'Filename' => $book->getPath_file()));   
                return 2;
            }else{
                $tmpID = BookRepository::find($book->getBookID());
                if($tmpID==NULL){
                    DB::table('books')->where('id','=',$book->getBookIDold())->update(array('id' => $book->getBookID(),'Title1' => $book->getTitle1(),'Title2' => $book->getTitle2(),
                        'Subject' => $book->getSubject(),'Author' => $book->getAuthor(),'Publishing' => $book->getPublishing(),'Edition' => $book->getEdition(),
                        'Year' => $book->getYear(),'Detail' => $book->getDetail(),'ISBN' => $book->getISBN(),'CallNum' => $book->getCallNum(),
                        'Type' => $book->getType(),'Status' =>$book->getStatus(),'UserBooking' => $book->getUserBooking(),
                        'UserBorrow' => $book->getUserBorrow(),'DateBooking' => $book->getDateBooking(),'DateBorrow' => $book->getDateBorrow(),
                        'DateReturn' => $book->getDateReturn(), 'Filename' => $book->getPath_file()));  
                    return 2;
                }else{
                    return 1;
                }
            }
        }else{
            return 0;
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
        $tmpData->Status = $book->getStatus();
        $tmpData->UserBooking = $temp;
        $tmpData->UserBorrow = $temp;
        $tmpData->DateBooking = $tempDate;
        $tmpData->DateBorrow = $tempDate;
        $tmpData->DateReturn = $tempDate;
        $tmpData->Filename = $book->getPath_file();

        if($tmpData->id==NULL){
            $tmpData->save();
            return 1;
        }else{
            return 0;
        }
    }

    public function deleteRepository($inID){
        $tmpRepo = BookRepository::find($inID);
        if($tmpRepo->NumBooks == 0){
            $filename = public_path().'/bookPicture/'.$tmpRepo->Filename;
            if(File::exists($filename)){
                File::delete($filename);
            }
        }
        BookRepository::destroy($inID);
    }

    public function addRepository($book){
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
        $tmpData->Status = $book->getStatus();
        $tmpData->UserBooking = $temp;
        $tmpData->UserBorrow = $temp;
        $tmpData->DateBooking = $tempDate;
        $tmpData->DateBorrow = $tempDate;
        $tmpData->DateReturn = $tempDate;
        $tmpData->Filename = $book->getPath_file();
        $tmpData->NumBooks = $book->getNumBooks();
        if($tmpData->id==NULL){
            $tmpData->save();
        }
    }
}