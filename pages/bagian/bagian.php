<?php
// require_once "database/crud.php";
require_once "controller/bagian.php";
$crud = new bagian();
?>
<div class="row">
    <div class="col">
        <h3>bagian</h3>
    </div>
    <div class="col">
        <a href="?page=bagiantambah" class="btn btn-success float-end">
            <i class="fa fa-plus-circle"></i>
            Tambah
        </a>
    </div>
</div>
<div class="row mt-3">
    <div class="col">


        <table class="table bg-white rounded shadow-sm table-hover">
            <thead>
                <tr>
                    <th scope="col" width="50">#</th>
                    <th scope="col">bagian</th>
                    <th scope="col" width="200">opsi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $no =1;
                $items = $crud->tampil_bagian();
                    if(!empty ($items)){
                        foreach($items as $x){ ?>

                            <tr class="align-middle">

                            <td><?= $no++?></td>
                            <td><?= $x["nama"]?></td>
                            <td>
                                <a href="?page=bagianubah&id=<?= $x['id']?>" class="btn btn-primary"> <i class="fa fa-edit"></i>edit</a>
                                <a href="?page=bagianhapus&id=<?= $x['id']?>" onclick="javascript: return confirm('komfirmasi data akan dihapus?');" class="btn btn-danger"> <i class="fa fa-trash"></i>hapus</a>
                            </td>
                            
                          </tr>
                            
                       <?php }
                    } ?>

            </tbody>
        </table>
    </div>
</div>