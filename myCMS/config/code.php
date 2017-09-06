<?php
/**
 * Created by PhpStorm.
 * User: node4
 * Date: 2017/8/29
 * Time: 15:39
 */
require substr(dirname(__FILE__), 0,-7).'/init.inc.php';
$_vc=new ValidateCode();
$_vc->doimg();
$_SESSION['code']=$_vc->getCode();
?>