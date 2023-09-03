<div id="top" class="row mb-3">
    <div class="col">
    <h3>Tambah Data Bagian</h3>
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
    require_once "controller/bagian.php";
    if (isset ($_POST["simpan"])){
     $crud = new  bagian();   
    $data =array(
       'nama'=>  $nm_bagian =trim($_POST['nama'])
    );
    

    $crud->tambah_bagian($data);


   

    }
    ?>
    </div>
</div>

<div id="input" class="row mb-3">
    <div class="col">
        <div class="card px-3">
            <form action="" method="post">

            <div class="mb-3">
  <label class="form-label">Nama Bagian</label>
  <input type="text" name="nama" class="form-control" required>
</div>
    <div class="mb-3">
        <button type="submit" name="simpan" class="btn btn-success"><i class="fa fa-save"></i> simpan</button>
    </div>
            </form>
        </div>
    </div>
</div>
