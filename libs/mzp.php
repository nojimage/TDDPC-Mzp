<?php
APP::import('core','HttpSocket');
/**
 * @property HttpSocket $Http
 */
class Mzp {

    function __construct() {
        $this->Http = new HttpSocket();
    }
    public function categorize($tweet) {
        $tweet = explode("\t", $tweet);
        $types = array();
        if (preg_match('/#/', $tweet[1])) {
            $types[] = '!HashTag';
        }
        if (preg_match('/^@/', $tweet[1])) {
            $types[] = 'Reply';
        } else if (preg_match('/@/', $tweet[1])) {
            $types[] = 'Mention';
        }
        if (!empty($types)) {
            $tweet[0] = join(',', $types);
        } else {
            $tweet[0] = 'Norlal';
        }
        return join("\t", $tweet);
    }

    public function getData(){
        $this->Http->get('http://tddbc.heroku.com/mzp/public_timeline');
        $return = array();
        $tweet = "ああ\tああ\tあああ";
        array_push($return, $tweet);
        return $return;
    }
}