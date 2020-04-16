<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Data Distributor
        <small>Distributor</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i></a></li>
        <!-- <li><a href="#">Examples</a></li> -->
        <li class="active">Distributor</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">

    <div class="box">
        <div class="box-header">
            <h3 class="box-title"><?=ucfirst($page)?> Distributor</h3>
            <div class="pull-right">
            <a href="<?=site_url('distributor')?>" class="btn btn-warning btn-flat">
                <i class="fa fa-undo"> Kembali</i>
            </a>
            </div>
        </div>
        <div class="box-body">
            <div class="row">
            <div class="col-md-4 col-md-offset-4">
            <form action="<?=site_url('distributor/process')?>" method="post">
                <div class="form-group">
                    <label>Kode Distributor *</label>
                    <input type="hidden" name="id" value="<?=$row->id?>">
                    <input type="text" name="kode_distributor" value="<?=$row->kode_distributor?>" class="form-control" required> 
                </div>
                <div class="form-group">
                    <label>Nama Distributor *</label>
                    <input type="text" name="nama_distributor" value="<?=$row->nama_distributor?>" class="form-control" required> 
                </div>
                <div class="form-group">
                    <label>Alamat *</label>
                    <textarea name="alamat"class="form-control"> <?=$row->alamat?></textarea>
                </div>
                <div class="form-group">
                    <label>Telp *</label>
                    <input type="text" name="telp" value="<?=$row->telp?>" class="form-control" required> 
                </div>
                <div class="form-group">
                    <label>Bank *</label>
                    <input type="text" name="bank" value="<?=$row->bank?>" class="form-control" required> 
                </div>
                <div class="form-group">
                    <label>Nomor Rekening *</label>
                    <input type="text" name="nomor_rekening" value="<?=$row->nomor_rekening?>" class="form-control" required> 
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
