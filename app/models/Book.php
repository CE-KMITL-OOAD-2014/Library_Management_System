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
    private $Status;
    private $UserBooking;
    private $UserBorrow;
    private $DateBooking;
    private $DateBorrow;
    private $DateReturn;
    private $LimitBorrow;
    private $path_file;
    private $NumBooks;
    private $Topchart;

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
        $this->Status = NULL;
        $this->UserBooking = 0;
        $this->UserBorrow = 0;
        $this->DateBooking = "00-00-0000";
        $this->DateBorrow = "00-00-0000";
        $this->DateReturn = "00-00-0000";
        $this->LimitBorrow = 0;
        $this->Filename = NULL;
        $this->NumBooks = 0;
        $this->Topchart = 0;
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

    public function setPath_file($inPathfile){
            $this->Filename=$inPathfile;
    }

    public function getPath_file(){
            return $this->Filename;
    }

    public function setNumBooks($inNumBooks){
            $this->NumBooks=$inNumBooks;
    }

    public function getNumBooks(){
            return $this->NumBooks;
    }

    public function setTopchart($inTopchart){
            $this->Topchart=$inTopchart;
    }

    public function getTopchart(){
            return $this->Topchart;
    }
}