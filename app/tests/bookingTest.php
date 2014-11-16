<?php

class bookingTest extends TestCase {

	public static function mockBooking($idBook,$idUser,$day,$month,$year){

		$BookingBook = new Book;
		$toRepository = new Service;
		$BookingBook->setBookID($idBook);
		$BookingBook->setUserBooking($idUser);

		$dateNow=date("d-m-Y");
		$dateBooking = $day."-".$month."-".$year;

		$BookingBook->setDateBooking($dateNow);
		$BookingBook->setDateBorrow($dateBooking);
		$returnValue = $toRepository->BookingBookRepository($BookingBook);
		return $returnValue;
	}

	public static function mockServiceBook(){
		$newService = new InterfaceBookRepo;
		return $newService;
	}


	public function testBooking(){
		$day = 16;
		$month = 11;
		$year = 2014;
		$idBook = 39;
		$idUser = 2;

		bookingTest::mockBooking($idBook,$idUser,$day,$month,$year);
		$service = bookingTest::mockServiceBook();
		$result = $service->getRepositoryByID($idBook);
		
		$dateBooking = $day."-".$month."-".$year;
		$this->assertEquals($idBook,$result->id);
		$this->assertEquals($idUser,$result->UserBooking);
		$this->assertEquals($dateBooking,$result->DateBorrow);
	}
}

?>
