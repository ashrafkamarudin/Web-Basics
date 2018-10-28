<?php

/**
* 
*/
class Controller
{
	public function redirect($url) {
        header('Location: '.$url);
        exit();
    }
}