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

    //Complete 25-10-2014
    public function getRepository($inUsername,$inPassword){
        $tmpRepo = PersonRepository::where('Username','=',$inUsername)->where('Password','=',$inPassword)->get();
        $tmpData = new Person;
        if(count($tmpRepo)==1){
           $tmpData->UserID = $tmpRepo[0]->id;
           $tmpData->Username = $tmpRepo[0]->Username;
           $tmpData->Password = $tmpRepo[0]->Password;
           $tmpData->Name = $tmpRepo[0]->Name;
           $tmpData->Surname = $tmpRepo[0]->Surname;
           $tmpData->Address = $tmpRepo[0]->Address;
           $tmpData->Email = $tmpRepo[0]->Email;
           $tmpData->Phone = $tmpRepo[0]->Phone;
           $tmpData->Status = $tmpRepo[0]->Status;
           echo "Pass";
           return $tmpData;
        }else{
           echo "Fail";
           return NULL;
        }
    }

    //Complete 25-10-2014
    public function editRepository(){
        $tmpRepo = PersonRepository::find($this->UserID);
        if($tmpRepo!=NULL){
            DB::table('members')->where('id','=',$this->UserID)->update(array('Username' => $this->Username,'Password' => $this->Password,'Name' => $this->Name,'Name' => $this->Name,
                'Surname' => $this->Surname,'Address' => $this->Address,'Email' => $this->Email,'Phone' => $this->Phone));        
            echo "Save Completed!<br>";
            echo "<a href=profile>Edit Profile</a><br>";
        }else{
            echo "Fail";
        }
    }

    public function editUserRepository(){
        $tmpRepo = PersonRepository::find($this->UserIDold);
        if($tmpRepo!=NULL){
            if($this->UserIDold==$this->UserID){
            DB::table('members')->where('id','=',$this->UserID)->update(array('id' => $this->UserID,'Username' => $this->Username
                ,'Name' => $this->Name,'Surname' => $this->Surname,'Email' => $this->Email,'Phone' => $this->Phone,'Status' => $this->Status));   
            echo "Save Completed!<br>";
            echo "<a href=list_user>List User</a><br>";
        }else{
            $tmpID = PersonRepository::find($this->UserID);
            if($tmpID==NULL){
            DB::table('members')->where('id','=',$this->UserID)->update(array('id' => $this->UserID,'Username' => $this->Username
                ,'Name' => $this->Name,'Surname' => $this->Surname,'Email' => $this->Email,'Phone' => $this->Phone,'Status' => $this->Status));   
            echo "Save Completed!<br>";
            echo "<a href=list_user>List User</a><br>";
            }else{
                echo "UserID already exists!";
            }
        }
        }else{
            echo "Fail";
        }
    }


    //Complete 25-10-2014
    public function saveRepository(){
        $tmpRepo = PersonRepository::where('Username','=',$this->Username)->get();
        if(count($tmpRepo)==0){
           $tmpRepo = new PersonRepository;
           $tmpRepo->id = $this->UserID;
           $tmpRepo->Username = $this->Username;
           $tmpRepo->Password = $this->Password;
           $tmpRepo->Name = $this->Name;
           $tmpRepo->Surname = $this->Surname;
           $tmpRepo->Address = $this->Address;
           $tmpRepo->Email = $this->Email;
           $tmpRepo->Phone = $this->Phone;
           $tmpRepo->Status = $this->Status;
           $tmpRepo->save();
           echo "Register Completed!";
           echo "<br> Go to <a href='/login'>Login page</a>";
            return $tmpRepo;
        }else{
           echo "Username already exists!";
           echo "<br> Go to <a href='register'>Register page</a>";
            //return Redirect::intended('/person/register');
            //return $tmpRepo;
        }
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