<!-- -TRang chu
-Gioi thieu
-San pham
-Chi tiet san pham
Lien he -->

<!-- // De dinh nghia :
B1:tao controller trong src
B2:khai bao function de xu ly 
B3 dinh nghia duong dan -->
<?php

use Hp\XuongOop\Controllers\Client\AboutController;
use Hp\XuongOop\Controllers\Client\ConTactController;
use Hp\XuongOop\Controllers\Client\HomeController;
use Hp\XuongOop\Controllers\Client\LoginController;
use Hp\XuongOop\Controllers\Client\ProductController;

// HomeController::class:viet tat cua use Hp\XuongOop\Controllers\Client\ProductController;

$routes->get('/',                    HomeController::class .     '@index');
$routes->get('/about',               AboutController::class .    '@index');
$routes->get('/contact',            ConTactController::class .   '@index');
$routes->post('/contact/store',     ConTactController::class .   '@store');
$routes->get('/products',           ProductController::class .   '@index');
$routes->get('/products{$id}',        ProductController::class .   '@detail');
$routes->post( '/handle-login',     LoginController::class    . '@login');
$routes->get('/login',LoginController::class . '@showFormLogin');
$routes->get( '/logout',            LoginController::class    . '@logout');




?>