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
    function testTweetをパースするrelpyを渡すとReplyをつけて返す(){
        $this->assertIdentical("Reply\t@Bob", $this->Mzp->categorize("AAA\t@Bob"));
    }
    function testTweetをパースするmentionを渡すとMentionをつけて返す(){
        $this->assertIdentical("Mention\tあああ@Bob", $this->Mzp->categorize("AAA\tあああ@Bob"));
    }
    function testTweetをパースするhashtagを渡すとHashTagをつけて返す(){
        $this->assertIdentical("!HashTag\tあああ #tddpc", $this->Mzp->categorize("AAA\tあああ #tddpc"));
    }
    function testTweetをパースするhashtagとreplyが含まれていた場合はカンマ区切りで返す(){
        $this->assertIdentical("!HashTag,Reply\t@Bob こんにちは #tddpc", $this->Mzp->categorize("AAA\t@Bob こんにちは #tddpc"));
    }
}