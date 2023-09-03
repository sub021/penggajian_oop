<div id="top" class="row mb-3">
    <div class="col">
        <h3>Penggajian</h3>
    </div>
</div>
<div class="row mb-3">

    <div class="col">
        <a href="?page=pilihbulantahunpenggajian" class="btn btn-success float-end"><i class="fa fa-plus-circle"></i>Kembali</a>
        <a href="?page=pilihkaryawan" class="btn btn-success float-end"><i class="fa fa-plus-circle"></i>Tambah</a>
    </div>
</div>
<div class="row mb-3">
    <div class="col">
    <table class="table bg-white rounded shadow-sm table-hover">
            <thead>
                <tr>
                    <th scope="col" width="50">#</th>
                    <th scope="col">NIK</th>
                    <th scope="col">nama</th>
                    <th scope="col">bulan</th>
                    <th scope="col">tahun</th>
                    <th scope="col">Gaji Dibayar</th>
                    <th scope="col" width="200">opsi</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                require_once "database/connection.php";
                $db = new databese();
                $mysqli = $db->connect();
                $no=1;
                $bulan =$_REQUEST['bulan'];
                $tahun   =  $_REQUEST['tahun'];
                if($bulan == "semua"){
                    if($tahun == "semua"){
                        $ceksql="SELECT P.*, K.nama FROM penggajian P LEFT JOIN karyawan K ON P.karyawan_nik = K.nik";
                    }else{
                        $ceksql = "SELECT P.*, K.nama FROM penggajian P LEFT JOIN karyawan K ON P.karyawan_nik = K.nik WHERE tahun =$tahun";
                    }
                }else {
                if($tahun != "semua"){
                    $ceksql ="SELECT P.*, K.nama FROM penggajian P LEFT JOIN karyawan K ON P.karyawan_nik = K.nik WHERE tahun =$tahun AND bulan ='$bulan'";
                }
            }
                $result = $mysqli->query($ceksql);
                if(!$result){
                    echo $mysqli->error;
                }

                if($ceksql != ""){

                    if($result->num_rows == 0){
                        echo "  <div class='alert alert-success' role='alert'> data bulan dan tahun kosong </div>";
                    }
                }
                
                   while($row = $result->fetch_assoc()){?>
                <tr>
                    <th scope="row"><?=$no++ ?></th>
                    <td scope="row"><?=$row['karyawan_nik'] ?></td>
                    <td scope="row"><?=$row['nama'] ?></td>
                    <td scope="row"><?=$row['bulan'] ?></td>
                    <td scope="row"><?=$row['tahun'] ?></td>
                    <td scope="row"><?=number_format($row['gaji_bayar'] )?></td>
                    <td>
                        <a href="?page=penggajianhapus&id=<?=$row['id']?>&bulan=<?= $bulan?>&tahun=<?=$tahun?>" 
                        onclick="javascript;return confirm('konfirmasi data akan dihapus')"
                        class="btn btn-danger"><i class="fa fa-trash"></i>hapus</a>
                    </td>
                </tr>
                <?php }?>
            </tbody>
    </table>
    </div>
</div>