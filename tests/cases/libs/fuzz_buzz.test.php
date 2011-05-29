<?php

/* FuzzBuzz Test cases generated on: 2011-05-29 15:05:11 : 1306649771 */
App::import('Lib', 'FizzBuzz');

/**
 * @property FuzzBuzz $FuzzBuzz
 */
class FizzBuzzTestCase extends CakeTestCase {

    public $fixtures = array();

    public function startTest($method) {
    }

    public function endTest($method) {
    }

    public function testFizzBuzz() {
        $this->assertIdentical('Fizz', fizzBuzz(3));
    }
}