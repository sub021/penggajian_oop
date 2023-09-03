


<div id="top" class="row mb-3">
    <div class="col">
    <h3>Hapus data karyawan</h3>
    </div>
    <div class="col">
        <a href="" class="btn btn-primary float-end"> <i class="fa fa-arrow-circle-left"></i>
        kembali</a>
    </div>
</div>

<div id="pesan" class="row mb-3">
    <div class="col">

    <?php 
        // require_once "database/crud.php";
        require_once "controller/karyawan.php";

        if (isset($_GET['id'])){    
            $crud = new karyawan ();
            $id = $_GET['id'];
            $crud->hapus_karyawan($id);
        }
    ?>
    </div>
</div>

