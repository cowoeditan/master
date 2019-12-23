<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Edit Hospital
        <small>Hospital</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <!-- <li><a href="#">Examples</a></li> -->
        <li class="active">Edit Hospital</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">

    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Edit Hospital</h3>
            <div class="pull-right">
                <a href="<?=site_url('hospital/hospital')?>" class="btn btn-warning btn-flat">
                    <i class="fa fa-undo"> Back</i>
                </a>
            </div>
        </div>
        <div class="box-body">
            <div class="row">
                <div class="col-md-4 col-md-offset-4">
                    <form action="" method="post">
                        
                        <div class="form-group <?=form_error('nama') ? 'has-error' : null ?>">
                            <label> Hospital Name</label>
                            <input type="hidden" name="id_hospital" value="<?= $row->id_hospital?>">
                            <input type="text" name="nama" value="<?=$this->input->post('nama') ?? $row->nama ?>" class="form-control">
                            <?=form_error('nama')?>
                        </div>
                        <div class="form-group <?=form_error('alamat') ? 'has-error' : null ?>">
                            <label> Address</label>
                            <textarea name="alamat" class="form-control"> <?=$this->input->post('alamat') ?? $row->alamat ?> </textarea>
                            <?=form_error('alamat')?>
                        </div>
                        <div class="form-group <?=form_error('no_telp') ? 'has-error' : null ?>">
                            <label> No. Telp</label>
                            <input type="text" name="no_telp" value="<?=$this->input->post('no_telp') ?? $row->no_telp ?>" class="form-control">
                            <?=form_error('no_telp')?>
                        </div>
                        <div class="form-group <?=form_error('emergency_contact') ? 'has-error' : null ?>">
                            <label> Emergency Contact</label>
                            <input type="text" name="emergency_contact" value="<?=$this->input->post('emergency_contact') ?? $row->emergency_contact ?>" class="form-control">
                            <?=form_error('emergency_contact')?>
                        </div>
                        <div class="form-group <?=form_error('keterangan') ? 'has-error' : null ?>">
                            <label> Note</label>
                            <textarea name="keterangan" class="form-control"> <?=$this->input->post('keterangan') ?? $row->keterangan ?> </textarea>
                            <?=form_error('keterangan')?>
                        </div>
                        <div class="form-group">
                            <label> Image</label>
                            <?php 
                                if($row->image_hospital != null) { ?>
                                    <div style="margin-bottom:5px">
                                        <img src="<?=base_url('./assets/img/'.$row->image_hospital)?>" style="width:150px;">
                                    </div>
                               <?php }
                            ?>
                            <input type="file" name="image_hospital" class="form-control">
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-success btn-flat">
                                <i class="fa fa-paper-plane"></i>Save
                            </button>
                            <button type="reset" class="btn btn-flat">Reset</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</section>
<!-- /.content -->