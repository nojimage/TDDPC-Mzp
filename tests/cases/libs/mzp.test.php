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

}