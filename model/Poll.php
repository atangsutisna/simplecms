<?php
class Poll extends CommonQuery {
    function __construct(){
        parent::CommonQuery('polls');
    }
}