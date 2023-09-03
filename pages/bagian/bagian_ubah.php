<div id="top" class="row mb-3">
    <div class="col">
    <h3>Ubah Data Bagian</h3>
    </div>
    <div class="col">
        <a href="" class="btn btn-primary float-end"> <i class="fa fa-arrow-circle-left"></i>
        kembali</a>
    </div>
</div>

<div id="pesan" class="row mb-3">
    <div class="col">
    <?php 

        $id = $_GET['id'];
        // require_once 'database/crud.php';
        require_once "controller/bagian.php";
        $crud = new bagian();
            if(isset($id)){
            $data = $crud->get_bagian($id);
            $id   = $data['id'];
            $nm_bagian = $data ['nama'];

             if(isset($_POST['ubah'])){

             $request = array (
                'id'    => $id = $_POST['id'],
                'nama'  => $nm_bagian = trim($_POST['nama']),
             );  
            $crud->ubah_bagian($request);
            }
        }
    ?>
    </div>
</div>

<div id="input" class="row mb-3">
    <div class="col">
        <div class="card px-3">
            <form action="" method="post">
        <input type="hidden" name="id" value="<?= $id; ?>">
            <div class="mb-3">
  <label class="form-label">Nama Bagian</label>
  <input type="text" name="nama" class="form-control" value="<?= $nm_bagian ?>" required>
</div>
    <div class="mb-3">
        <button type="submit" name="ubah" class="btn btn-success"><i class="fa fa-save"></i> simpan</button>
    </div>
            </form>
        </div>
    </div>
</div>
