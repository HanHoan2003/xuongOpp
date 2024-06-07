<?php 
//CRUD 
//USER 
//GET ->USER/INDEX         ->INDEX              ->DANH SACH
//GET ->USER/CREATE        ->CREATE             ->HIEN THI FORM THEM MOI
//POST ->USER/STORE        ->STORE              ->LUU DU LIEU TU FORM THEM MOI VAO DB
//GET ->USER/ID/SHOW           ->SHOW($ID)          -> XEM CHI TITE
//GET ->USER/ID/EDIT       ->EDIT($ID)          ->HIEN THI FORM CAP NHAT
//PUT ->USER/ID            ->UPDATE($ID)        ->LUU DU LIEU TU FORM CAP NHAT VAO DB
//DELETE ->USER/ID         -DELETE($ID)         ->XOA DU LIEU BAN GHI TRONG DB

use Hp\XuongOop\Controllers\Admin\DashhoardController;
use Hp\XuongOop\Controllers\Admin\UserController;

$routes->before('GET|POST', '/admin/*.*', function() {
  if (! isset($_SESSION['user'])) {
      header('location: ' . url('login') );
      exit();
  }
});

$routes->mount('/admin', function () use ($routes) {
  $routes->get('/',DashhoardController::class . '@dashboard');

    $routes->mount('/users', function () use ($routes) {
      $routes->get('/', UserController::class . '@index');
  
      $routes->get('/create', UserController::class . '@create');
  
      $routes->post('/store', UserController::class . '@store');
  
      $routes->get('/{id}/show', UserController::class . '@show');
      $routes->get('/{id}/edit', UserController::class . '@edit');
      $routes->post('/{id}/update',   UserController::class . '@update');
      $routes->post('/{id}', UserController::class . '@update');
      
      $routes->get('/{id}/delete', UserController::class . '@delete');
      
    });
  });
  
  


?>