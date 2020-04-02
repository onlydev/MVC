<?php
date_default_timezone_set('Asia/Seoul');
error_reporting(E_ALL);
ini_set('display_errors', 1);

require '../vendor/autoload.php';

// 환경설정 라이브러리 - https://github.com/vlucas/phpdotenv
// .env 환경설정 로드
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__.'/../');
$dotenv->load();

header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: OPTIONS,GET,POST,PUT,DELETE');
header('Access-Control-Max-Age: 3600');
header('Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With');
//header('Content-Type: application/json; charset=UTF-8');
