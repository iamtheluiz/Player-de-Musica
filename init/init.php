<?php 

include('class/Sys.php');
$sys = new Sys;
session_start();
$sys->valid_login();
