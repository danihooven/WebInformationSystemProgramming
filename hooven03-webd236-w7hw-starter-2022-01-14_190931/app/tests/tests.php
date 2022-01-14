<?php
require_once "tests/testing.php";

function test_reduce1() {
  
  $arr = [2, 8, 10, 5, 3, 5, 1, 2, 5, 7, 4];
  assertEquals(10, reduce($arr, 'max'), "maximum should be 10");
  assertEquals(1,  reduce($arr, 'min'), "minimum should be 1");
  assertEquals(52, reduce($arr, function($x, $y) { return $x + $y; }), "sum should be 52");
}

function test_modeMaker() {
  $arr = [2, 8, 10, 5, 3, 5, 1, 2, 5, 7, 4];
  assertEquals(5, reduce($arr, modeMaker()), "mode should be 5");
  $arr[] = 2;
  $arr[] = 2;
  assertEquals(2, reduce($arr, modeMaker()), "mode should be 2");
}

function test_carConstructor() {
  $car = new Car(20.0, 10.0);
  assertEquals(0.0, $car->readOdometer(), "A newly constructed car should have 0 miles on the odometer");
  assertEquals(20.0, $car->readFuelGauge(), "A newly constructed car should have the initial gas");
}

function test_carDrive1() {
  $car = new Car(20.0, 10.0);
  $car->drive(15.0);
  assertEquals(15.0, $car->readOdometer(), "After driving 15 miles, the odometer should read 15");
  assertEquals(18.5, $car->readFuelGauge(), "After consuming 1.5 gallons of gas, the fuel gauge should read 18.5");
}

function test_carDrive2() {
  $car = new Car(0.0, 10.0);
  $car->drive(15.0);
  assertEquals(0.0, $car->readOdometer(), "A car with no gas shouldn't drive");
  assertEquals(0.0, $car->readFuelGauge(), "A car that can't drive should consume no gas");
}

function test_carDrive3() {
  $car = new Car(5.0, 10.0);
  $car->drive(50.0);
  assertEquals(50.0, $car->readOdometer(), "After driving 50 miles, the odometer should read 50");
  assertEquals(0.0, $car->readFuelGauge(), "The car should have exactly run out of gas");
}

function test_carDrive4() {
  $car = new Car(5.0, 10.0);
  $car->drive(150.0);
  assertEquals(50.0, $car->readOdometer(), "The car should have run out of gas after 50 miles");
  assertEquals(0.0, $car->readFuelGauge(), "The car should have run out of gas");
}

function test_carDrive5() {
  $car = new Car(20.0, 10.0);
  $car->drive(10.0);
  $car->drive(5.0);
  assertEquals(15.0, $car->readOdometer(), "After driving 15 miles, the odometer should read 15");
  assertEquals(18.5, $car->readFuelGauge(), "After consuming 1.5 gallons of gas, the fuel gauge should read 18.5");
}

function test_carAddGas() {
  $car = new Car(5.0, 10.0);
  $car->addGas(10.0);
  assertEquals(15.0, $car->readFuelGauge(), "Adding 10 gallons to 5 gallons should be 15 gallons");
  $car->drive(10.0);
  assertEquals(10.0, $car->readOdometer(), "The car should driven 10 miles");
  assertEquals(14.0, $car->readFuelGauge(), "The car should have run out of gas");
}
