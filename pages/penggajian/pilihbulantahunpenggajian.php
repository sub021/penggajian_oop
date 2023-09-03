<div id="top" class="row mb-3">
<div class="row mb-3">
    <div class="col">
    <?php
    require_once "controller/penggajian.php";
    $gaji = new Penggajian();
    if(isset($_POST['lanjut_button'])){
        $data =array(
            'bulan' => trim($_POST['bulan_select']),
            'tahun' => trim($_POST['tahun_select']),
        );
        $gaji->proses_penggajian($data);
    }
    
    ?>        

</div>
</div>
<div id="pesan" class="row mb-3">
    <div class="col"></div>
</div>
<div id="inputan" class="row mb-3"> 
    <div class="col"> 
        <form action="" method="post">
            <div class="card px-3">
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
                <label for="tahun_select" class="form-label"> Tahun </label>
                <select class="form-select" name="tahun_select" id="">
                <option value="semua">semua</option>
                <?php 
                    require_once "controller/penggajian.php";
                    $gaji = new Penggajian();
                    $items = $gaji->tahun();
                    foreach($items as $x){
                ?>
                <option value="<?=$x['tahun']?>" selected><?=$x['tahun']?></option>
                <?php } ?>
                </select>
            </div>
            <div class="col mb-3">
                <button class=" btn btn-success " type="submit " name="lanjut_button">
                    <i class="fa fa-arrow-circle-right"></i>
                    lanjut
                </button>
            </div>
        </div>
        </form>
    </div>
</div>
