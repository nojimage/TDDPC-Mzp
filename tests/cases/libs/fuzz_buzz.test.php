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
        $this->assertIdentical('Fizz', fizzBuzz(3), '3の倍数でFizzを出力する: %s');
    }

    public function testFizzBuzz5の倍数はBuzz() {
        $this->assertIdentical('Buzz', fizzBuzz(5), '5の倍数でBuzzを出力する: %s');
    }

    public function testFizzBuzz3と5の倍数はFizzBuzz() {
        $this->assertIdentical('FizzBuzz', fizzBuzz(15), '3と5の倍数でFizzBuzzを出力する: %s');
    }

    public function testFizzBuzz6はFizz() {
        $this->assertIdentical('Fizz', fizzBuzz(6));
    }

    public function testFizzBuzz10はBuzz() {
        $this->assertIdentical('Buzz', fizzBuzz(10));
    }

    public function testFizzBuzz1は1() {
        $this->assertIdentical('1', fizzBuzz(1));
    }

    public function testFizzBuzz30はFizzBuzz() {
        $this->assertIdentical('FizzBuzz', fizzBuzz(30), '30でFizzBuzzを出力する: %s');
    }

    public function testFizzBuzz2は2() {
        $this->assertIdentical('2', fizzBuzz(2));
    }

    public function testFizzBuzz4は4() {
        $this->assertIdentical('4', fizzBuzz(4));
    }

    public function testFizzBuzz7は7() {
        $this->assertIdentical('7', fizzBuzz(7));
    }

    public function testFizzBuzz0は0() {
        $this->assertIdentical('0', fizzBuzz(0));
    }

    public function testFizzBuzz文字列は文字列で返す() {
        $this->assertIdentical('ほげほげほげ', fizzBuzz('ほげほげほげ'));
    }

    public function testFizzBuzz負の3の倍数はFizz() {
        $this->assertIdentical('Fizz', fizzBuzz(-3));
    }

    public function testFizzBuzz負の5の倍数はBuzz() {
        $this->assertIdentical('Buzz', fizzBuzz(-5));
    }

    public function testFizzBuzz負の３と5の倍数はFizzBuzz() {
        $this->assertIdentical('FizzBuzz', fizzBuzz(-15));
    }
    
    public function testFizzBuzz数字の入っている文字列は文字列で返す() {
        $this->assertIdentical('ほげ3ほげほげ', fizzBuzz('ほげ3ほげほげ'));
    }
    
    public function testFizzBuzz空文字列は空文字列で返す() {
        $this->assertIdentical('', fizzBuzz(''));
    }
    
    public function testFizzBuzzNullは空文字列で返す() {
        $this->assertIdentical('', fizzBuzz());
    }
}