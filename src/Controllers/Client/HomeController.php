<?php

namespace Hp\XuongOop\Controllers\Client;
// extent controller trong commons
use Hp\XuongOop\Commons\Controller;
// use Hp\XuongOop\Commons\Helper;
// use Hp\XuongOop\Models\User;


class HomeController extends Controller
{
    //de ten class la index de show ra chinh no
    public function index()
    {
    //   $user = new User();
    //  Helper::__debug($user);
      $name='Hoan';
      $this->renderViewClient('home',[
        'name' =>$name
      ]);

    }
}
