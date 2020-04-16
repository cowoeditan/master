<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Data Tindakan
        <small>Tindakan</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i></a></li>
        <!-- <li><a href="#">Examples</a></li> -->
        <li class="active">Tindakan</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">

    <div class="box">
        <div class="box-header">
            <h3 class="box-title"><?=ucfirst($page)?> Tindakan</h3>
            <div class="pull-right">
            <a href="<?=site_url('tindakan')?>" class="btn btn-warning btn-flat">
                <i class="fa fa-undo"> Kembali</i>
            </a>
            </div>
        </div>
        <div class="box-body">
            <div class="row">
            <div class="col-md-4 col-md-offset-4">
            <form action="<?=site_url('tindakan/process')?>" method="post">
                <div class="form-group">
                    <label>Kode tindakan *</label>
                    <input type="hidden" name="id" value="<?=$row->id?>">
                    <input type="text" name="kode_tindakan" value="<?=$row->kode_tindakan?>" class="form-control" required> 
                </div>
                <div class="form-group">
                    <label>Nama tindakan *</label>
                    <input type="text" name="nama_tindakan" value="<?=$row->nama_tindakan?>" class="form-control" required> 
                </div>
                <div class="form-group">
                    <label>Harga *</label>
                    <input type="number" name="harga" value="<?=$row->harga?>" class="form-control" required> 
                </div>
                <div class="form-group">
                    <label>Poliklinik</label>
                    <select name="id_poliklinik" class="form-control">
                        <option value="">--Pilih--</option>
                        <?php foreach($poliklinik->result() as $key =>$data) { ?>
                            <option value="<?=$data->id?>" <?=$data->id == $row->id_poliklinik ? "selected" : null ?>> <?=$data->nama_poliklinik?> </option>
                        <?php } ?>
                    </select>
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
