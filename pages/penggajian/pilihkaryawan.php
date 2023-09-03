<?php
// require_once "database/crud.php";
    require_once "controller/karyawan.php";
$crud = new karyawan();
?>
<div class="row">
    <div class="col">
        <h3>Pilih karyawan</h3>
    </div>
    <div class="col">
       
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
                    <th scope="col">gaji pokok</th>

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

                            <td><?= number_format($x["gaji_pokok"])?></td>
                            <td><?= $x["nama_bagian"]?></td>
                            <td>
                                <a href="?page=penggajiantambah&nik=<?=$x['nik']?>" class="btn btn-success"><i class="fa fa-arrow circle-right"></i>pilih</a>
                            </td>
                            
                          </tr>
                            
                       <?php }
                    } ?>

            </tbody>
        </table>
    </div>
</div>