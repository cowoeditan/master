<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Data Pbf
        <small>Pbf</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i></a></li>
        <!-- <li><a href="#">Examples</a></li> -->
        <li class="active">Pbf</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">

    <div class="box">
        <div class="box-header">
            <h3 class="box-title"><?=ucfirst($page)?> Pbf</h3>
            <div class="pull-right">
            <a href="<?=site_url('pbf')?>" class="btn btn-warning btn-flat">
                <i class="fa fa-undo"> Kembali</i>
            </a>
            </div>
        </div>
        <div class="box-body">
            <div class="row">
            <div class="col-md-4 col-md-offset-4">
            <form action="<?=site_url('pbf/process')?>" method="post">
                <div class="form-group">
                    <label>Kode Pbf *</label>
                    <input type="hidden" name="id" value="<?=$row->id?>">
                    <input type="text" name="kode_pbf" value="<?=$row->kode_pbf?>" class="form-control" required> 
                </div>
                <div class="form-group">
                    <label>Nama Pbf *</label>
                    <input type="text" name="nama_pbf" value="<?=$row->nama_pbf?>" class="form-control" required> 
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
