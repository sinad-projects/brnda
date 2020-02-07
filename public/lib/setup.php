<?php
header("Cache-Control: no-cache, no-store, must-revalidate"); // HTTP 1.1.
header("Pragma: no-cache"); // HTTP 1.0.
header("Expires: 0"); // Proxies.
session_start(); // start session for all pages
error_reporting(E_ALL); // turn off E_NOTICE Type
require LIB.'session.php';
require LIB.'db.php';
$link = new Database(LIB.'db-config.php');
require FUNCTIONS.DS.'helpers.php'; // general functions for general purposes
require LIB.'SerialNumberGenerator/SerialNumberGenerator.php';