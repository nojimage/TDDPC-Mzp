<?php

class Mzp {

    public function categorize($tweet) {
        $tweet = explode("\t", $tweet);
        if (preg_match('/#/', $tweet[1])) {
            $tweet[0] = '!HashTag';
        } else if (preg_match('/^@/', $tweet[1])) {
            $tweet[0] = 'Reply';
        } else if (!preg_match('/@/', $tweet[1])) {
            $tweet[0] = 'Norlal';
        }
        return join("\t", $tweet);
    }

}