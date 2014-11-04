<?php

class InterfacePersonRepo {

    //Complete 25-10-2014
    public function getRepository($inUsername,$inPassword){
        $tmpRepo = PersonRepository::where('Username','=',$inUsername)->where('Password','=',$inPassword)->get();
        $tmpData = new Person;
        if(count($tmpRepo)==1){
           $tmpData->setUserID($tmpRepo[0]->id);
           $tmpData->setUsername($tmpRepo[0]->Username);
           $tmpData->setPassword($tmpRepo[0]->Password);
           $tmpData->setName($tmpRepo[0]->Name);
           $tmpData->setSurname($tmpRepo[0]->Surname);
           $tmpData->setAddress($tmpRepo[0]->Address);
           $tmpData->setEmail($tmpRepo[0]->Email);
           $tmpData->setPhone($tmpRepo[0]->Phone);
           $tmpData->setStatus($tmpRepo[0]->Status);
           echo "Pass";
           return $tmpData;
        }else{
           echo "Fail";
           return NULL;
        }
    }

    //Complete 25-10-2014
    public function editRepository($person){
        $tmpRepo = PersonRepository::find($person->getUserID());
        if($tmpRepo!=NULL){
            DB::table('members')->where('id','=',$person->getUserID())->update(array('Username' => $person->getUsername(),'Password' => $person->getPassword()
                ,'Name' => $person->getName(),'Surname' => $person->getSurname(),'Address' => $person->getAddress(),'Email' => $person->getEmail(),'Phone' => $person->getPhone()));        
            echo "Save Completed!<br>";
            echo "<a href=profile>Edit Profile</a><br>";
        }else{
            echo "Fail";
        }
    }

    public function editUserRepository($person){
        $tmpRepo = PersonRepository::find($person->getUserIDold());
        if($tmpRepo!=NULL){
            if($person->getUserIDold()==$person->getUserID()){
              DB::table('members')->where('id','=',$person->getUserID())->update(array('id' => $person->getUserID(),'Username' => $person->getUsername()
                  ,'Name' => $person->getName(),'Surname' => $person->getSurname(),'Email' => $person->getEmail(),'Phone' => $person->getPhone(),'Status' => $person->getStatus()));   
              echo "Save Completed!<br>";
              echo "<a href=list_user>List User</a><br>";
          }else{
            $tmpID = PersonRepository::find($person->getUserID());
            if($tmpID==NULL){
            DB::table('members')->where('id','=',$person->getUserID())->update(array('id' => $person->getUserID(),'Username' => $person->getUsername()
                ,'Name' => $person->getName(),'Surname' => $person->getSurname(),'Email' => $person->getEmail(),'Phone' => $person->getPhone(),'Status' => $person->getStatus()));   
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
    public function saveRepository($person){
        $tmpRepo = PersonRepository::where('Username','=',$person->getUsername())->get();
        if(count($tmpRepo)==0){
           $tmpRepo = new PersonRepository;
           $tmpRepo->id = $person->getUserID();
           $tmpRepo->Username = $person->getUsername();
           $tmpRepo->Password = $person->getPassword();
           $tmpRepo->Name = $person->getName();
           $tmpRepo->Surname = $person->getSurname();
           $tmpRepo->Address = $person->getAddress();
           $tmpRepo->Email = $person->getEmail();
           $tmpRepo->Phone = $person->getPhone();
           $tmpRepo->Status = $person->getStatus();
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

}