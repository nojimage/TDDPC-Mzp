<?php

App::import('Lib', 'Mzp');

Mock::generatePartial('HttpSocket', 'MockMzpHttpSocket', array('get'));

class MzpTestCase extends CakeTestCase {

    function startTest($method) {
        $this->Mzp = new Mzp();
    }

    function endTest($method) {
        unset($this->Mzp);
        ClassRegistry::flush();
    }

    function testTweetをパースする() {
        $this->assertIdentical("Norlal\tあいうえお", $this->Mzp->categorize("Alice\tあいうえお"));
    }

    function test日付付きのTweetをパースする() {
        $this->assertIdentical("Norlal\tあいうえお", $this->Mzp->categorize("2011/04/01 14:22:57\tAlice\tあいうえお"));
    }

    function test日付付きのTweetをパースする2() {
        $this->assertIdentical("Norlal\tかきくけこ", $this->Mzp->categorize("2011/04/01 14:22:57\tBob\tかきくけこ"));
    }

    function testTweetをパースする2() {
        $this->assertIdentical("Norlal\tかきくけこ", $this->Mzp->categorize("Bob\tかきくけこ"));
    }

    function testTweetをパースするrelpyを渡すとReplyをつけて返す() {
        $this->assertIdentical("Reply\t@Bob", $this->Mzp->categorize("AAA\t@Bob"));
    }

    function test日付付きのTweetをパースするrelpyを渡すとReplyをつけて返す() {
        $this->assertIdentical("Reply\t@Bob", $this->Mzp->categorize("2011/04/01 14:22:57\tAAA\t@Bob"));
    }

    function testTweetをパースするmentionを渡すとMentionをつけて返す() {
        $this->assertIdentical("Mention\tあああ@Bob", $this->Mzp->categorize("AAA\tあああ@Bob"));
    }

    function test日付付きのTweetをパースするmentionを渡すとMentionをつけて返す() {
        $this->assertIdentical("Mention\tあああ@Bob", $this->Mzp->categorize("2011/04/01 14:22:57\tAAA\tあああ@Bob"));
    }

    function testTweetをパースするhashtagを渡すとHashTagをつけて返す() {
        $this->assertIdentical("!HashTag\tあああ #tddpc", $this->Mzp->categorize("AAA\tあああ #tddpc"));
    }

    function test日付付きのTweetをパースするhashtagを渡すとHashTagをつけて返す() {
        $this->assertIdentical("!HashTag\tあああ #tddpc", $this->Mzp->categorize("2011/04/01 14:22:57\tAAA\tあああ #tddpc"));
    }

    function testTweetをパースするhashtagとreplyが含まれていた場合はカンマ区切りで返す() {
        $this->assertIdentical("!HashTag,Reply\t@Bob こんにちは #tddpc", $this->Mzp->categorize("AAA\t@Bob こんにちは #tddpc"));
    }

    function test日付付きのTweetをパースするhashtagとreplyが含まれていた場合はカンマ区切りで返す() {
        $this->assertIdentical("!HashTag,Reply\t@Bob こんにちは #tddpc", $this->Mzp->categorize("2011/04/01 14:22:57\tAAA\t@Bob こんにちは #tddpc"));
    }

    function testGetDataでデータをとってくる() {
        $results = $this->Mzp->getData();
        $this->assertTrue(is_array($results));
        $this->assertPattern('![0-9]{4}/(?:0[0-9]|1[0-2])/(?:[0-2][0-9]|3[0-1]) (?:[0-1][0-9]|2[0-3]):(?:[0-5][0-9]):(?:[0-5][0-9])\t[A-z_]+\t.*!', $results[0]);
    }

    function testHttpSocketが定義されている() {
        $this->assertIdentical('HttpSocket', get_class($this->Mzp->Http));
    }

    function testGetDataHttpSocketを呼び出している() {
        $this->Mzp->Http = new MockMzpHttpSocket();
        $this->Mzp->Http->expectOnce('get', array('http://tddbc.heroku.com/mzp/public_timeline'));

        $results = $this->Mzp->getData();
        $this->assertTrue(is_array($results));
    }

}