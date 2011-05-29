<?php

class Mzp {

    public function categorize($tweet) {
        $tweet = explode("\t", $tweet);
        $tweet[0] = 'Norlal';
        return join("\t", $tweet);
    }

}