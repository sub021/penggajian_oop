<div id="top" class="row mb-3">
    <div class="col">
    <h3>Tambah Data karyawan</h3>
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
    if (isset ($_POST["simpan"])){
     $crud = new  karyawan();   
     $data = array(
        'nik'         => trim($_POST['nik']),
        'nm_karyawan' => trim($_POST['nama']),
        'tgl'         => trim($_POST['tgl']),
        'gaji'        => trim($_POST['gaji']),
        'status'      => trim($_POST['status_karyawan']),
        'bagian'      => trim($_POST['bagian']),
     );
    
    $crud->tambah_karyawan($data);
    }
    ?>
    </div>
</div>

<div id="input" class="row mb-3">
    <div class="col">
        <div class="card px-3">
            <form action="" method="post">
            <div class="mb-3">
                    <label class="form-label">NIK</label>
                    <input type="text" name="nik" class="form-control" placeholder="misal : 0001" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Nama karyawan</label>
                    <input type="text" name="nama" class="form-control" placeholder="misal : Fulan" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">tanggal mulai</label>
                    <input type="date" name="tgl" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">gaji pokok</label>
                    <input type="text" name="gaji" class="form-control" required>
                </div>
                
                <div class="mb-3">
                    <label class="form-label">status karyawan</label>
                    <div class="mb-3 mt-3">
                        <input type="radio" class="form-check-input" name="status_karyawan" id="tetap" value="tetap" required>
                        <label for=" tetap" class="form-check-label">
                            tetap
                        </label>
                    </div>
                    <div class="mb-3 mt-3">
                        <input type="radio" class="form-check-input" name="status_karyawan" id="kontrak" value="kontrak" required>
                        <label for="kontrak" class="form-check-label">
                            kontrak
                        </label>
                    </div>
                    <div class="mb-3 mt-3">
                        <input type="radio" class="form-check-input" name="status_karyawan" id="magang" value="magang" required>
                        <label for=" magang" class="form-check-label">
                            magang
                        </label>
                    </div>
                    <!-- <div class="cvol mb-3">
                        <button type="submit" class="btn btn-success" name="simpan_button">
                        <i class="fas fa-save"></i>
                            simpan
                        </button>
                    </div> -->
                    <!-- <select name="status" id="" class="form-control">
                        <option value="">--</option>
                        <option value="">---</option>
                    </select> -->
                </div>
                <div class="mb-3">
                    <label class="form-label">bagian</label>
                    <select name="bagian" id="" class="form-control">
                    <option value=  > --Pilih Bagian-- </option>
                        <?php 
                         $crud = new  karyawan();
                        $items = $crud->all_bagian();
                            foreach($items as $x){ 
                        ?>
                        <option value= <?= $x['id']?> > <?= $x['nama']?></option>
                        <?php }?>
                    </select>
                </div>
                <div class="mb-3">
                <button type="submit" name="simpan" class="btn btn-success"><i class="fa fa-save"></i> simpan</button>
                 </div>
            </form>
        </div>
    </div>
</div>
