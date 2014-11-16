<?php

class InterfacePersonRepo {

    public function getRepositoryAll(){
      $inRepository = PersonRepository::All();
      return $inRepository;
    }

    public function getRepositoryByID($inID){
      $inRepository = PersonRepository::find($inID);
      return $inRepository;
    }

    public function getRepositoryBySearchUsername($inUsername){
      $inRepository = PersonRepository::where('Username','like',"$inUsername%")->orWhere('Name','like',"$inUsername%")->get();
      return $inRepository;
    }

    public function getRepositoryByFine(){
      $inRepository = PersonRepository::where('Fine','!=',0)->orderBy('Fine', 'desc')->get();
      return $inRepository;
    }

    public function getRepositoryByUsername($inUsername){
      $inRepository = PersonRepository::where('Username','=',"$inUsername")->get();
      return $inRepository;
    }

    public function getRepository($inUsername){
      $tmpRepo = PersonRepository::where('Username','=',$inUsername)->get();
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
        $tmpData->setPath_file($tmpRepo[0]->Filename);
        $tmpData->setFine($tmpRepo[0]->Fine);
        return $tmpData;
      }else{
        return NULL;
      }
    }

    public function editRepository($person){
      $tmpRepo = PersonRepository::find($person->getUserID());
      if($tmpRepo!=NULL){
        DB::table('members')->where('id','=',$person->getUserID())->update(array('Username' => $person->getUsername(),'Password' => $person->getPassword()
          ,'Name' => $person->getName(),'Surname' => $person->getSurname(),'Address' => $person->getAddress(),'Email' => $person->getEmail(),
          'Phone' => $person->getPhone(), 'Filename' => $person->getPath_file()));        
        return 1;
      }else{
        return 0;
      }
    }

    public function editUserRepository($person){
      $tmpRepo = PersonRepository::find($person->getUserIDold());
      if($tmpRepo!=NULL){
        if($person->getUserIDold()==$person->getUserID()){
          DB::table('members')->where('id','=',$person->getUserID())->update(array('id' => $person->getUserID(),'Username' => $person->getUsername()
            ,'Name' => $person->getName(),'Surname' => $person->getSurname(),'Email' => $person->getEmail(),'Phone' => $person->getPhone(),
            'Status' => $person->getStatus(), 'Filename' => $person->getPath_file()));   
          return 2;
        }else{
          $tmpID = PersonRepository::find($person->getUserID());
          if($tmpID==NULL){
            DB::table('members')->where('id','=',$person->getUserID())->update(array('id' => $person->getUserID(),'Username' => $person->getUsername()
              ,'Name' => $person->getName(),'Surname' => $person->getSurname(),'Email' => $person->getEmail(),'Phone' => $person->getPhone(),
              'Status' => $person->getStatus(), 'Filename' => $person->getPath_file()));   
            return 2;
          }else{
            return 1;
          }
        }
      }else{
        return 0;
      }
    }

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
        $tmpRepo->Filename = $person->getPath_file();
        $tmpRepo->save();
        return 1;
      }else{
        return 0;
      }
    }

    public function deleteRepository($inID){
      $tmpRepo = PersonRepository::find($inID);
      $filename = public_path().'/memberPicture/'.$tmpRepo->Filename;
      if (File::exists($filename)) {
        File::delete($filename);
      }
      PersonRepository::destroy($inID);
    }

    public function sendmailRepository($person){
      $tmpRepo = PersonRepository::where('Username','=',$person->getUsername())->get();
      $strTo = $tmpRepo[0]->Email;
      $password = str_random(8);
      $newPassword = Hash::make($password);
      $tmpRepo[0]->Password = $newPassword;
      $tmpRepo[0]->save();

      Mail::send('emails.mailpassword', array('Password'=>$password,'Name'=>$tmpRepo[0]->Name,
        'Username'=>$tmpRepo[0]->Username,), function($message) use ($strTo)
      {
        $message->to($strTo)->subject('Your Account information username and password.');
      });
      return $tmpRepo[0]->Email;
    }
}