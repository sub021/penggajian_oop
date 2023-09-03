<?php
    class karyawan {

        function all_bagian(){
            require_once "database/connection.php";
            $db = new databese();
            $mysqli = $db->connect();
            $sql = "SELECT * FROM bagian";
            $result = $mysqli->query($sql);
            while ($row = $result->fetch_assoc()){
                $hasil[]=$row;
            }
            if(!empty($hasil)){
                return $hasil;
            }
        }

        function tampil_karyawan(){
            require_once "database/connection.php";
            $db = new databese();
            $mysqli = $db->connect();
            $sql = "SELECT karyawan.*,bagian.nama nama_bagian FROM karyawan INNER JOIN bagian ON karyawan.bagian_id = bagian.id";
            $result =$mysqli->query($sql);
            while ($row = $result->fetch_assoc()){
                $hasil[]=$row;}
            if (!empty($hasil)){
                return $hasil;}
            echo "  <div class='alert alert-danger' role='alert'>Data Kosong </div>";
        }
    
          function get_karyawan ($id){
            require_once "database/connection.php";
            $db = new databese();
            $mysqli = $db->connect();
            $sql = "SELECT * FROM karyawan WHERE nik ='$id'";
            $result = $mysqli->query($sql);
            $data = $result->fetch_assoc();
            return $data;
        }


        function tambah_karyawan($request){
            require_once "database/connection.php";
            $db = new databese();
            $mysqli = $db->connect();
            $nik = $mysqli->real_escape_string($request['nik']);
            $nama = $mysqli->real_escape_string($request['nm_karyawan']);
            $tgl = $mysqli->real_escape_string($request['tgl']);
            $gaji = $mysqli->real_escape_string($request['gaji']);
            $status = $mysqli->real_escape_string($request['status']);
            $bagian = $mysqli->real_escape_string($request['bagian']);

            $cek = false;
            $ceksql= $mysqli->query("SELECT * FROM karyawan WHERE nama='$nama'");
            if ($ceksql->num_rows >0){
                echo "  <div class='alert alert-danger' role='alert'> data sudah ada</div>";
            }else {
                $sql ="INSERT INTO karyawan SET
                        nik ='$nik',
                        nama='$nama',
                        tanggal_mulai='$tgl',
                        gaji_pokok='$gaji',
                        status_karyawan='$status',
                        bagian_id='$bagian'";
                $result = $mysqli->query($sql);
                if($result){
                    echo "  <div class='alert alert-success' role='alert'> data berhasil disimpan</div>";
                }
            }
        }
    
        function hapus_karyawan($id){
            require_once "database/connection.php";
            $db = new databese();
            $mysqli = $db->connect();
            $sql = "DELETE FROM karyawan WHERE id ='$id'";
            $result = $mysqli->query($sql);
               if($result){
                   echo "  <div class='alert alert-success' role='alert'> data berhasil dihapus</div>"; 
               }
           }

           function karyawan_ubah($request){
            require_once "database/connection.php";
            $db = new databese();
            $mysqli = $db->connect();
            $nik = $mysqli->real_escape_string($request['nik']);
            $nama = $mysqli->real_escape_string($request['nm_karyawan']);
            $tgl = $mysqli->real_escape_string($request['tgl']);
            $gaji = $mysqli->real_escape_string($request['gaji']);
            $status = $mysqli->real_escape_string($request['status']);
            $bagian = $mysqli->real_escape_string($request['bagian']);

                $sql ="UPDATE karyawan SET
                        nama='$nama',
                        tanggal_mulai='$tgl',
                        gaji_pokok='$gaji',
                        status_karyawan='$status',
                        bagian_id='$bagian'
                        WHERE nik ='$nik'";
                $result = $mysqli->query($sql);
                if($result){
                    echo "  <div class='alert alert-success' role='alert'> data berhasil disimpan</div>";
                }
        
           }
   


    }
?>