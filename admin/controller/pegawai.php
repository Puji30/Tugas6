<?php
$con->auth();
$conn=$con->koneksi();
switch (@$_GET['page']){
    case 'add':
        $sql="select * from ref_spesialisasi";
        $spesialis=$conn->query($sql);
        $content="views/pegawai/tambah.php";
        include_once 'views/template.php';
    break;
    case 'save':
        if($_SERVER['REQUEST_METHOD']=="POST"){
            if(empty($_POST['nama_pegawai'])){
                $err['nama_pegawai']="Nama Pegawai Wajib";
            }
            if(!is_numeric($_POST['alm_pegawai'])){
                $err['alm_pegawai']="Alamat Mohon Diisi";
            }
            if(!is_numeric($_POST['no_telp_pegawai'])){
                $err['no_telp_pegawai']="No Telepon Mohon Diisi";
            }
            if(!is_numeric($_POST['id_spesialisasi'])){
                $err['id_spesialisasi']="Spesialisasi Wajib Terisi";
            }
            if(!isset($err)){
                $id_pegawai=$_SESSION['login']['id'];
                if(!empty($_POST['id_pegawai'])){
                    //update
                    $sql="update pegawai set nama_pegawai='$_POST[nama_pegawai]', alm_pegawai='$_POST[alm_pegawai]', no_telp_pegawai='$_POST[no_telp_pegawai]',id_spesialisasi='$_POST[id_spesialisasi]',
                    , id_pgw=$id_pgw where md5(id_pegawai)='$_POST[id_pegawai]'";
                }else{
                    //save
                    $sql = "INSERT INTO pegawai (nama_pegawai, alm_pegawai, no_telp_pegawai, id_spesialis, id_pegawai) 
                    VALUES ('$_POST[nama_pegawai]','$_POST[alm_pegawai]','$_POST[no_telp_pegawai]','$_POST[id_spesialisasi]',$id_pgw)";
                }
                    if ($conn->query($sql) === TRUE) {
                        header('Location: '.$con->site_url().'/admin/index.php?mode=pegawai');
                    } else {
                        $err['msg']= "Error: " . $sql . "<br>" . $conn->error;
                    }
            }
        }else{
            $err['msg']="tidak diijinkan";
        }
        if(isset($err)){
            $sql="select * from ref_spesialisasi";
            $spesialis=$conn->query($sql);
            $content="views/pegawai/tambah.php";
            include_once 'views/template.php';
        }
    break;
    case 'edit':
        $pegawai ="select * from pegawai where md5(id_pegawai)='$_GET[id]'";
        $pegawai=$conn->query($pegawai);
        $_POST=$pegawai->fetch_assoc();
        $_POST['alm_pegawai']=$_POST['alm_pegawai'];
        $_POST['id_pegawai']=md5($_POST['id_pegawai']);
        //var_dump($pegawai);
        $sql="select * from ref_spesialisasi";
        $spesialis=$conn->query($sql);
        $content="views/pegawai/tambah.php";
        include_once 'views/template.php';
    break;
    case 'delete';
        $pegawai ="delete from pegawai where md5(id_pegawai)='$_GET[id]'";
        $pegawai=$conn->query($pegawai);
        header('Location: '.$con->site_url().'/admin/index.php?mode=pegawai');
    break;
    default:
        $sql ="Select * from pegawai inner join ref_spesialisasi on ref_spesialisasi.id_spesialisasi=pegawai.id_spesialis";
        $pegawai=$conn->query($sql);
        $conn->close();
        $content="views/pegawai/tampil.php";
        include_once 'views/template.php';
}
?>