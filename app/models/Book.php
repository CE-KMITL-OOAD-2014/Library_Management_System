<?php

class Book {

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

    public function editRepository(){
        $tmpRepo = BookRepository::find($this->BookID);
        if($tmpRepo!=NULL){
            DB::table('books')->where('id','=',$this->BookID)->update(array('Title1' => $this->Title1,'Title2' => $this->Title2,
                'Subject' => $this->Subject,'Author' => $this->Author,'Publishing' => $this->Publishing,'Edition' => $this->Edition,
                'Year' => $this->Year,'Detail' => $this->Detail,'ISBN' => $this->ISBN,'CallNum' => $this->CallNum,
                'Type' => $this->Type,'SubType' => $this->SubType,'Status' => $this->Status));        
            echo "Pass";
        }else{
            echo "Fail";
            echo "$this->BookID";
        }
    }

    public function saveRepository(){
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
        if($tmpData->id==NULL){
            $tmpData->save();
            echo "Pass";
        }else{
            echo "Fail";
        }
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
}