<?php

App::import('Lib', 'Mzp');

class MzpTestCase extends CakeTestCase {

    function startTest($method) {
        $this->Mzp = new Mzp();
    }

    function endTest($method) {
        unset($this->Mzp);
        ClassRegistry::flush();
    }

    function testTweetをパースする(){
        $this->assertIdentical("Norlal\tあいうえお", $this->Mzp->categorize("Alice\tあいうえお"));
    }
    function testTweetをパースする2(){
        $this->assertIdentical("Norlal\tかきくけこ", $this->Mzp->categorize("Bob\tかきくけこ"));
    }
    function testTweetをパースする3(){
        $this->assertIdentical("AAA\t@Bob", $this->Mzp->categorize("AAA\t@Bob"));
    }
    function testTweetをパースするmentionを渡すとそのまま返す(){
        $this->assertIdentical("AAA\tあああ@Bob", $this->Mzp->categorize("AAA\tあああ@Bob"));
    }
}