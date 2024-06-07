<?php

namespace Hp\XuongOop\Controllers\Client;
// extent controller trong commons
use Hp\XuongOop\Commons\Controller;
use Hp\XuongOop\Commons\Helper;
use Hp\XuongOop\Models\User;

// use Hp\XuongOop\Commons\Helper;
// use Hp\XuongOop\Models\User;


class LoginController extends Controller
{

  private User $user;
  public function __construct()
  {
      $this->user = new User();
  }
    //de ten class la index de show ra chinh no
    public function showFormLogin()
    {
    auth_check();

      $this->renderViewClient('login');

    }
    public function login(){
      auth_check();
    
    // dung password verify de matching pasword o form gui len va password trong databae
     try {
      $user = $this->user->findByEmail($_POST['email']);
     if(empty($user)){
         throw new \Exception('Không tồn tại email' .$_POST['email']) ;   
     }
     $flag = password_verify($_POST['password'], $user['password']); 
     if($flag){
      $_SESSION['user'] =$user;
      header('Location: ' . url('admin/') );
      exit();
     }
     throw new \Exception('password không đúng') ;  
     } catch (\Throwable $th) {
      $_SESSION['error'] = $th->getMessage();
     header('Location :' .url('login'));
     exit();
     }
    }
    public function logout(){
      unset($_SESSION['user']);
      header('Location' .url());
    }
}
