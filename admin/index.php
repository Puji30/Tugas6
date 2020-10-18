<?php
include_once '../config/Config.php';
$con = new Config();
if($con->auth()){
    switch(@$_GET['mod']){
        case 'pegawai':
           include_once 'controller/pegawai.php';
        break;
        default:
           include_once 'controller/pegawai.php';
    }
}else{
    include_once 'controller/login.php';
}
?>