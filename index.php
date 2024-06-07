<?php
//k viet code logic o day 
//viet class cha de o trong common ->tai su dung

use Hp\XuongOop\Commons\Helper;

session_start();
 require 'vendor/autoload.php';
 //khoi tạo hàm k thong qua class nhưng muốn gọi như global
 require_once 'helper.php';
 $dotenv = Dotenv\Dotenv::createImmutable(__DIR__)->load();//tim kiem file env cung cap voi index
 //add file index cua folders routes
require_once __DIR__  .'/routes/index.php';
// Helper::__debug($_ENV);
?>