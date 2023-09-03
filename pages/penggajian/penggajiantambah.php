<div id="top" class="row mb-3">
    <div class="col">
    <h3>Ubah Data karyawan</h3>
    </div>
    <div class="col">
        <a href="" class="btn btn-primary float-end"> <i class="fa fa-arrow-circle-left"></i>
        kembali</a>
    </div>
</div>

<div id="pesan" class="row mb-3">
    <div class="col">
    <?php 
    // require_once 'database/crud.php';
    require_once "controller/karyawan.php";
    require_once "controller/penggajian.php";
    $id = $_GET['nik'];
    // require_once 'database/crud.php';
    $crud = new karyawan();
        if(isset($id)){
        $data = $crud->get_karyawan($id);
         $nik   = $data['nik'];
        $nm_karyawan = $data ['nama'];
        $tgl = $data['tanggal_mulai'];
        $gaji = $data['gaji_pokok'];
        $bagian_id =$data['bagian_id'];
        $status = $data['status_karyawan'];
        }

        if(isset($_POST['simpan'])){
            $penggajina = new Penggajian();
            $data = array(
                'nik'       =>trim($_POST['nik_k']),
                'tahun'     =>trim($_POST['tahun']),
                'bulan'     =>trim($_POST['bulan_select']),
                'gaji'     =>trim($_POST['gaji']),
            );
            $penggajina->simpan_gaji($data);
        }

    ?>
    </div>
</div>

<div id="input" class="row mb-3">
    <div class="col">
        <div class="card px-3">
                <div class="row">
                    <div class="col-md-6 mb-3">
                            <label class="form-label">NIK</label>
                            <input type="text" disabled name="nik" class="form-control" placeholder="misal : 0001" required value="<?= $nik?>">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Nama karyawan</label>
                            <input type="text" disabled name="nama" class="form-control" placeholder="misal : Fulan" required value="<?= $nm_karyawan?>" >
                        </div>
                </div>

                <div class="row">

                    <div class="col-md-6 mb-3">
                        <label class="form-label">tanggal mulai</label>
                        <input type="date" name="tgl" class="form-control" value="<?=$tgl?>" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label">gaji pokok</label>
                        <input type="text" name="gaji" class="form-control" value="<?= $gaji?>" required>
                    </div>
                </div>

                <div class="row">

                <div class="col-md-6 mb-3">
                        <label class="form-label">Status karyawan</label>
                        <input type="text" name="status" class="form-control" value="<?=$status?>" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Bagian</label>
                        <?php 
                            require_once "controller/bagian.php";
                            $bagian = new bagian();
                            $items=$bagian ->get_bagian($bagian_id);
                            $nama_bagian = $items['nama'];
                        ?>
                        <input type="text" name="bagian" class="form-control" value="<?= $nama_bagian?>" required>
                    </div>
                </div>
                </div>


                <div class="card px-3 mt-3">
                    <form action="" method="post">
                    <input type="hidden"  name="nik_k" class="form-control" value="<?= $nik?>">
            <input type="hidden" name="gaji" class="form-control" value="<?= $gaji?>" >
            <div class="mb-3 mt-3">
            
                <label for="bagian_id" class="form-label"> bulan </label>
                <select class="form-control" aria-label="default select example" name="bulan_select">
                    <option value="semua" selected>semua</option>
                    <option value="01">januari</option>
                    <option value="02">februari</option>
                    <option value="03">maret</option>
                    <option value="04">april</option>
                    <option value="05">mei</option>
                    <option value="06">juni</option>
                    <option value="07">juli</option>
                    <option value="08">agustus</option>
                    <option value="09">september</option>
                    <option value="10">oktober</option>
                    <option value="11">november</option>
                    <option value="12">desember</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="" class="form-label">tahun</label>
                <input type="text" name="tahun" required class="form-control">
            </div>
                

                <div class="mb-3">
                <button type="submit" name="simpan" class="btn btn-success"><i class="fa fa-save"></i> simpan</button>
                 </div>
                 </div>
                 </form>
        </div>
    </div>
</div>
