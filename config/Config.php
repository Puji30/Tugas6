<?php
class Config{
    function koneksi(){
        $conn=new mysqli('localhost','root','','lady_laundry');
        if($conn->connect_error){
            $conn =die("Koneksi gagal : ". $conn->connect_error);
        }
        return $conn;
    }
    function auth(){
        if(isset($_SESSION['login']['email'])){
            return true;
        }else{
            return false;
        }
    }
}
?>