<?php 
namespace Hp\XuongOop\Commons;
//khoi tao cac ham k can khoi tao doi tuong
class Helper{
    public static function __debug($data)
    {
        echo '<pre>';
        print_r($data);
        die;
    }
}
?>