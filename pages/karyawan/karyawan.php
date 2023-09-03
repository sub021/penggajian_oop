<?php
// require_once "database/crud.php";
    require_once "controller/karyawan.php";
$crud = new karyawan();
?>
<div class="row">
    <div class="col">
        <h3>karyawan</h3>
    </div>
    <div class="col">
        <a href="?page=karyawantambah" class="btn btn-success float-end">
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
                    <th scope="col">NIK</th>
                    <th scope="col">nama</th>
                    <th scope="col">tanggal mulai</th>
                    <th scope="col">gaji pokok</th>
                    <th scope="col">status karyawan</th>
                    <th scope="col">bagian</th>
                    <th scope="col" width="200">opsi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $no =1;
                $items = $crud->tampil_karyawan();
                    if(!empty ($items)){
                        foreach($items as $x){ ?>

                            <tr class="align-middle">

                            <td><?= $no++?></td>
                            <td><?= $x["nik"]?></td>
                            <td><?= $x["nama"]?></td>
                            <td><?=date( 'd F Y',strtotime($x["tanggal_mulai"]))?></td>
                            <td><?= $x["gaji_pokok"]?></td>
                            <td><?= $x["status_karyawan"]?></td>
                            <td><?= $x["nama_bagian"]?></td>
                            <td>
                                <a href="?page=karyawanubah&id=<?= $x['nik']?>" class="btn btn-primary"> <i class="fa fa-edit"></i>edit</a>
                                <a href="?page=karyawanhapus&id=<?= $x['nik']?>" onclick="javascript: return confirm('komfirmasi data akan dihapus?');" class="btn btn-danger"> <i class="fa fa-trash"></i>hapus</a>
                            </td>
                            
                          </tr>
                            
                       <?php }
                    } ?>

            </tbody>
        </table>
    </div>
</div>