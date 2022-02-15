<?php

session_start();

define("BURL","http://localhost/medicalServices/");
define("BURLA","http://localhost/medicalServices/admin/");
define("ASSETS","http://localhost/medicalServices/assets/");

define("BL",__DIR__.'/');
define("BLA",__DIR__.'/admin/');

require_once(BL.'functions/db.php');
