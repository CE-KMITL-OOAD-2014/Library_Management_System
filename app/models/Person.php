<?php

class Person {

    private $UserIDold;
    private $UserID;
    private $Username;
    private $Password;
    private $Name;
    private $Surname;
    private $Address;
    private $Email;
    private $Phone;
    private $Status;

    public function __construct(){
        $this->UserID = NULL;
        $this->Username = NULL;
        $this->Password = NULL;
        $this->Name = NULL;
        $this->Surname = NULL;
        $this->Address = NULL;
        $this->Email = NULL;
        $this->Phone = NULL;
        $this->Status = NULL;
    }

    public function getUserIDold(){
        return $this->UserIDold;
    }

    public function setUserIDold($inUserIDold){
        $this->UserIDold = $inUserIDold;
    }

    public function getUserID(){
        return $this->UserID;
    }

    public function setUserID($inUserID){
        $this->UserID = $inUserID;
    }

    public function getUsername(){
        return $this->Username;
    }

    public function setUsername($inUsername){
        $this->Username = $inUsername;
    }

    public function getPassword(){
        return $this->Password;
    }

    public function setPassword($inPassword){
        $this->Password = $inPassword;
    }

    public function getName(){
        return $this->Name;
    }

    public function setName($inName){
        $this->Name = $inName;
    }

    public function getSurname(){
        return $this->Surname;
    }

    public function setSurname($inSurname){
        $this->Surname = $inSurname;
    }

    public function getAddress(){
        return $this->Address;
    }

    public function setAddress($inAddress){
        $this->Address = $inAddress;
    }

    public function getEmail(){
        return $this->Email;
    }

    public function setEmail($inEmail){
        $this->Email = $inEmail;
    }

    public function getPhone(){
        return $this->Phone;
    }

    public function setPhone($inPhone){
        $this->Phone = $inPhone;
    }

    public function getStatus(){
        return $this->Status;
    }

    public function setStatus($inStatus){
        $this->Status = $inStatus;
    }
}