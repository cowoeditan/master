<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Data Obat
        <small>Obat</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i></a></li>
        <!-- <li><a href="#">Examples</a></li> -->
        <li class="active">Obat</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">

    <div class="box">
        <div class="box-header">
            <h3 class="box-title"><?=ucfirst($page)?> Obat</h3>
            <div class="pull-right">
            <a href="<?=site_url('obat')?>" class="btn btn-warning btn-flat">
                <i class="fa fa-undo"> Kembali</i>
            </a>
            </div>
        </div>
        <div class="box-body">
            <div class="row">
            <div class="col-md-4 col-md-offset-4">
            <form action="<?=site_url('obat/process')?>" method="post">
                <div class="form-group">
                    <label>Kode Obat *</label>
                    <input type="hidden" name="id" value="<?=$row->id?>">
                    <input type="text" name="kode_obat" value="<?=$row->kode_obat?>" class="form-control" required> 
                </div>
                <div class="form-group">
                    <label>Nama Obat *</label>
                    <input type="text" name="nama_obat" value="<?=$row->nama_obat?>" class="form-control" required> 
                </div>
                <div class="form-group">
                    <label>Satuan *</label>
                    <input type="text" name="satuan" value="<?=$row->satuan?>" class="form-control" required> 
                </div>
                <div class="form-group">
                    <label>Sediaan *</label>
                    <input type="text" name="sediaan" value="<?=$row->sediaan?>" class="form-control" required> 
                </div>
                <div class="form-group">
                    <label>Pbf</label>
                    <select name="id_pbf" class="form-control">
                        <option value="">--Pilih--</option>
                        <?php foreach($pbf->result() as $key =>$data) { ?>
                            <option value="<?=$data->id?>" <?=$data->id == $row->id_pbf ? "selected" : null ?>> <?=$data->nama_pbf?> </option>
                        <?php } ?>
                    </select>
                </div>
                <div class="form-group">
                    <label>Principal</label>
                    <select name="id_principal" class="form-control">
                        <option value="">--Pilih--</option>
                        <?php foreach($principal->result() as $key =>$data) { ?>
                            <option value="<?=$data->id?>" <?=$data->id == $row->id_principal ? "selected" : null ?>> <?=$data->nama_principal?> </option>
                        <?php } ?>
                    </select>
                </div>
                <div class="form-group">
                    <label>Jenis *</label>
                    <input type="text" name="jenis" value="<?=$row->jenis?>" class="form-control" required> 
                </div>
                <div class="form-group">
                    <label>Komposisi *</label>
                    <textarea name="komposisi" class="form-control" required><?=$row->komposisi?> </textarea>
                </div>
                <div class="form-group">
                    <button type="submit" name="<?=$page?>" class="btn btn-success btn-flat">
                        <i class="fa fa-paper-plane"> Simpan</i>
                    </button>
                    <button type="reset" class="btn btn-flat"> Reset</button>
                </div>
            </form> 
            </div>
            </div>
        </div>
    </div>

</section>
<!-- /.content -->
