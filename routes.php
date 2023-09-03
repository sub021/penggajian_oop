<?php 

    if(isset($_GET["page"])){
        $page = $_GET["page"];
    }else{
        $page ="";
    }

switch ($page){
    case "";
    case "dashboard":
        include "pages/dashboard.php";
        break;
    case "bagian":
        include "pages/bagian/bagian.php";
        break;
    case "bagiantambah":
        include "pages/bagian/bagian_tambah.php";
        break;
    case "bagianubah":
        include "pages/bagian/bagian_ubah.php";
        break;
    case "bagianhapus":
        include "pages/bagian/bagian_hapus.php";
        break;
    case "karyawan":
            include "pages/karyawan/karyawan.php";
            break;
    case "karyawantambah":
            include "pages/karyawan/karyawan_tambah.php";
            break;
    case "karyawanubah":
            include "pages/karyawan/karyawan_ubah.php";
            break;
    case "karyawanhapus":
            include "pages/karyawan/karyawan_hapus.php";
            break;        
    case "penggajian":
        include "pages/penggajian/penggajian.php";
        break;
    case "penggajianbulan":
        include "pages/penggajian/pilihbulantahunpenggajian.php";
        break; 
    case "pilihkaryawan":
        include "pages/penggajian/pilihkaryawan.php";
        break; 
    case "penggajiantambah":
        include "pages/penggajian/penggajiantambah.php";
        break;
    case "penggajianhapus":
        include "pages/penggajian/penggajianhapus.php";
        break;
    default :
        include "pages/404.php";
}

?>