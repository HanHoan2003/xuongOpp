<?php 
namespace Hp\XuongOop\Controllers\Admin;
use Hp\XuongOop\Commons\Controller;
class DashhoardController extends Controller{
    public function dashboard(){
        $this->renderViewAdmin(__FUNCTION__);
    }
}
?>