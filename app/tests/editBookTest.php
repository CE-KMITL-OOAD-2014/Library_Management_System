<?php

class editBookTest extends TestCase {

	public static function mockEditBook($inBookID,$inTitle1,$inTitle2,$inSubject,$inAuthor,$inPublishing,$inEdition,$inYear,$inDetail,$inISBN
		,$inCallNum,$inType,$inStatus)
	{
		$editBook = new Book;
		$editBook->setBookIDold($inBookID);
		$editBook->setBookID($inBookID);
		$editBook->setTitle1($inTitle1);
		$editBook->setTitle2($inTitle2);
		$editBook->setSubject($inSubject);
		$editBook->setAuthor($inAuthor);
		$editBook->setPublishing($inPublishing);
		$editBook->setEdition($inEdition);
		$editBook->setYear($inYear);
		$editBook->setDetail($inDetail);
		$editBook->setISBN($inISBN);
		$editBook->setCallNum($inCallNum);
		$editBook->setType($inType);
		$editBook->setStatus($inStatus);
		return $editBook;
	}

	public static function mockServiceBook(){
		$newService = new InterfaceBookRepo;
		return $newService;
	}

	public function testEditBook(){

	$BookID = 39;
    $Title1 = 'ศักยภาพเหนือขอบฟ้า'; //Title(Thai)
    $Title2 = 'Power Beyond the Horizon'; //Title(English)
    $Subject = 'การบิน';
    $Author = 'Prajin Jayema';
    $Publishing = 'RTAF';
    $Edition = 3;
    $Year = 2557;
    $Detail = 'การบิน';
    $ISBN = '936-534-002';
    $CallNum = '500 ส 49';
    $Type = 600;
    $Status = 'Borrow';

	$test = editBookTest::mockEditBook($BookID,$Title1,$Title2,$Subject,$Author,$Publishing,$Edition,$Year,$Detail,$ISBN,$CallNum,$Type,$Status);
	$service = editBookTest::mockServiceBook();
	$result = $service->editBookRepository($test);

	$this->assertEquals($BookID,$result->id);
	$this->assertEquals($Title1,$result->Title1);
	$this->assertEquals($Title2,$result->Title2);
	$this->assertEquals($Subject,$result->Subject);
	$this->assertEquals($Author,$result->Author);
	$this->assertEquals($Publishing,$result->Publishing);
	$this->assertEquals($Edition,$result->Edition);
	$this->assertEquals($Year,$result->Year);
	$this->assertEquals($Detail,$result->Detail);
	$this->assertEquals($ISBN,$result->ISBN);
	$this->assertEquals($CallNum,$result->CallNum);
	$this->assertEquals($Type,$result->Type);
	$this->assertEquals($Status,$result->Status);
	}
}

?>
