<?php

class regisUserTest extends TestCase {

	public static function mockRegisUser($inUsername,$inPassword,$inName,$inSurname,$inAddress,$inEmail,$inPhone,$inStatus)
	{
		$newPerson = new Person;
		$newPerson->setUsername($inUsername);
		$newPerson->setPassword($inPassword);
		$newPerson->setName($inName);
		$newPerson->setSurname($inSurname);
		$newPerson->setAddress($inAddress);
		$newPerson->setEmail($inEmail);
		$newPerson->setPhone($inPhone);
		$newPerson->setStatus($inStatus);
		return $newPerson;
	}

	public function testRegisUser(){

	$Username = 'TestGuest';
	$Password = 'guest';
	$Name = 'Phaholyothin';
	$Surname = 'Chaengwatthana';
	$Address = 'Donmuaeng Bangkok';
	$Email = 'test@kmitl.ac.th';
	$Phone = '02-534-1000';
	$Status = 'ADMIN';

	$test = regisUserTest::mockRegisUser($Username,$Password,$Name,$Surname,$Address,$Email,$Phone,$Status);
	$result = $test->saveRepository();

	$this->assertEquals($Username,$result->Username);
	$this->assertEquals($Password,$result->Password);
	$this->assertEquals($Name,$result->Name);
	$this->assertEquals($Surname,$result->Surname);
	$this->assertEquals($Address,$result->Address);
	$this->assertEquals($Email,$result->Email);
	$this->assertEquals($Phone,$result->Phone);
	$this->assertEquals($Status,$result->Status);
	}
}

?>
