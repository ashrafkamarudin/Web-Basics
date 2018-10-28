<?php

session_start();

require_once dirname(__FILE__) . '/Config.php';
require_once dirname(__FILE__) . '/Database.php';
require_once dirname(__FILE__) . '/Session.php';
require_once dirname(__FILE__) . '/Model.php';
require_once dirname(__FILE__) . '/Controller.php';


// Controllers
require_once dirname(dirname(__FILE__)) . '/Controller/ViewController.php';