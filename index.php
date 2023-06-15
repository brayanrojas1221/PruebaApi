<?php

session_name('chexter');
session_start();
error_reporting(E_ALL);
ini_set('display_errors', true);
ini_set('display_startup_errors', false);
date_default_timezone_set('America/Bogota');

define("PROJECT_NAME", "chexter");

require_once 'server.php';