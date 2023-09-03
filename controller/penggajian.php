<?php
class Penggajian{
    function karyawan_penggajian(){
        require_once "database/connection.php";
        $db= new databese();
        $mysqli = $db->connect();
        $sql="SELECT K.*,B.nama nama_bagian FROM karyawan K LEFT JOIN bagian B ON K.bagian_id = B.id";
        $result = $mysqli->query($sql);

        if ($result->num_rows ==0 ){
            echo " <div class='alert alert-danger role='alert>Data Kosong</div>";
        }
    }

    function tahun(){
        require_once "database/connection.php";
        $db= new databese();
        $mysqli = $db->connect();
        $sql = "SELECT DISTINCT tahun FROM penggajian";
        $result =$mysqli->query($sql);
        if ($result->num_rows == 0){
            echo "  <div class='alert alert-danger' role='alert'> data Kosong</div>";
        }
        while ($row = $result->fetch_assoc()){
            $hasil[]=$row;}
        if (!empty($hasil)){
            return $hasil;}

    }

    function proses_penggajian($request){
        require_once "database/connection.php";
        $db= new databese();
        $mysqli = $db->connect();
        $bulan = $mysqli->real_escape_string($request['bulan']);
        $tahun = $mysqli->real_escape_string($request['tahun']);
        $ceksql ="";
        var_dump($request['tahun']);
        if($bulan == "semua"){
            if($tahun == "semua"){
                $ceksql="SELECT * FROM penggajian";
            }else{
                $ceksql = "SELECT * FROM penggajian WHERE tahun = $tahun";
            }
        }else {
        if($tahun != "semua"){
            $ceksql ="SELECT * FROM penggajian WHERE tahun = $tahun AND bulan = $bulan";
        }
    }
        if($ceksql != ""){
            $result= $mysqli->query($ceksql);
            if($result->num_rows == 0){
                
                echo "  <div class='alert alert-success' role='alert'> data kosong</div>";
            }else{
               
                echo "<meta http-equiv='refresh' content='0; url=?page=penggajian&bulan=$bulan&tahun=$tahun'>";
            }

            }
        }


        function simpan_gaji($request){
            require_once "database/connection.php";
            $db= new databese();
            $mysqli = $db->connect();
            $nik=$mysqli->real_escape_string($request['nik']);
            $tahun=$mysqli->real_escape_string($request['tahun']);
            $bulan=$mysqli->real_escape_string($request['bulan']);
            $gaji=$mysqli->real_escape_string($request['gaji']);

            $ceksql = "SELECT * FROM penggajian WHERE karyawan_nik ='$nik' AND bulan= '$bulan' AND tahun='$tahun'";
            $result = $mysqli->query($ceksql);
            
            if($result->num_rows > 0){
                echo "  <div class='alert alert-success' role='alert'> data sudah ada</div>";
            }
            else{
                $sql ="INSERT INTO penggajian SET
                karyawan_nik ='$nik',
                tahun='$tahun',
                bulan='$bulan',
                gaji_bayar='$gaji'";
                $result = $mysqli->query($sql);
                var_dump($sql);
                if($result){
                    echo "  <div class='alert alert-success' role='alert'> data berhasi disimpan</div>";
                }
            }
        }


        
        function hapus_penggajian($id,$bulan,$tahun){
            require_once "database/connection.php";
            $db = new databese();
            $mysqli = $db->connect();
            $sql = "DELETE FROM penggajian WHERE id ='$id'";
            $result = $mysqli->query($sql);
               if($result){
                   echo "  <div class='alert alert-success' role='alert'> data berhasil dihapus</div>";
                   echo "<meta http-equiv='refresh' content='2; url=?page=penggajian&bulan=$bulan&tahun=$tahun'>";
               }
           }


}

?>