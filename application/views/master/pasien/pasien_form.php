<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Data Pasien
        <small>Pasien</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i></a></li>
        <!-- <li><a href="#">Examples</a></li> -->
        <li class="active">Pasien</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">

    <div class="box">
        <div class="box-header">
            <h3 class="box-title"><?=ucfirst($page)?> Pasien</h3>
            <div class="pull-right">
                <a href="<?=site_url('pasien')?>" class="btn btn-warning btn-flat" title="Kembali" data-toggle="tooltip"
                                            data-placement="top">
                    <i class="fa fa-undo"></i>
                </a>
            </div>
        </div>
        <div class="box-body">
            <div class="row">
                <div class="col-md-12">
                    <form action="<?=site_url('pasien/process')?>" method="post">
                        <div class="col-md-12">
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label>No Rekamedis *</label>
                                    <input type="hidden" name="id" value="<?=$row->id?>">
                                    <input type="text" name="no_rekamedis" value="<?=$no_urut?>"
                                        class="form-control" readonly>
                                </div>
                            </div>
                            <div class="col-md-1">
                                <div class="form-group">
                                    <label>Panggilan</label>
                                    <select name="panggilan" class="form-control">
                                        <option value="">---</option>
                                        <?php foreach($panggilan->result() as $key =>$data) { ?>
                                        <option value="<?=$data->panggilan?>"
                                            <?=$data->panggilan == $row->panggilan ? "selected" : null ?>>
                                            <?=$data->panggilan?>
                                        </option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label>Nama pasien *</label>
                                    <input type="text" name="nama_pasien" value="<?=$row->nama_pasien?>"
                                        class="form-control" required>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label>Tgl Lahir *</label>
                                    <input type="date" name="tgl_lahir" 
                                    <?php
                                    if($row->tgl_lahir == null){ ?>
                                        value="<?php echo date('Y-m-d');?>"
                                    <?php 
                                    } else {?>
                                    value="<?php echo date('Y-m-d', strtotime($row->tgl_lahir));?>"

                                    <?php } ?>
                                    
                                        class="form-control" required>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label>Jenis Kelamin</label>
                                    <select name="jenis_kelamin" class="form-control">
                                        <option value="">--Pilih--</option>
                                        <?php foreach($jenis_kelamin->result() as $key =>$data) { ?>
                                        <option value="<?=$data->jenis_kelamin?>"
                                            <?=$data->jenis_kelamin == $row->jenis_kelamin ? "selected" : null ?>>
                                            <?=$data->jenis_kelamin?> </option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label>No Telp *</label>
                                    <input type="text" name="no_telp" value="<?=$row->no_telp?>" class="form-control"
                                        required>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-12">

                            <div class="col-md-2">
                                <div class="form-group">
                                    <label>Pekerjaan *</label>
                                    <input type="text" name="pekerjaan" value="<?=$row->pekerjaan?>"
                                        class="form-control" required>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label>Golongan Darah *</label>
                                    <input type="text" name="golongan_darah" value="<?=$row->golongan_darah?>"
                                        class="form-control" required>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label>Riwayat Alergi *</label>
                                    <input type="text" name="riwayat_alergi" value="<?=$row->riwayat_alergi?>"
                                        class="form-control" required>
                                </div>
                            </div>
                            <div class="col-md-5">
                                <div class="form-group">
                                    <label>Alamat *</label>
                                    <textarea name="alamat" class="form-control" required><?=$row->alamat?> </textarea>
                                </div>
                            </div>

                        </div>
                        <div class="col-md-12">
                            <b>Penjamin</b>
                            <hr>
                        </div>

                        <div class="col-md-12">
                        <div class="col-md-2">
                                <div class="form-group">
                                    <label>Nama Penjamin *</label>
                                    <input type="text" name="nama_penjamin" value="<?=$row->nama_penjamin?>"
                                        class="form-control" required>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label>Pekerjaan Penjamin *</label>
                                    <input type="text" name="pekerjaan_penjamin" value="<?=$row->pekerjaan_penjamin?>"
                                        class="form-control" required>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label>No. Telp Penjamin *</label>
                                    <input type="text" name="no_telp_penjamin" value="<?=$row->no_telp_penjamin?>"
                                        class="form-control" required>
                                </div>
                            </div>
                            <div class="col-md-5">
                                <div class="form-group">
                                    <label>Alamat Penjamin *</label>
                                    <textarea name="alamat_penjamin" class="form-control" required><?=$row->alamat_penjamin ?> </textarea>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <button type="submit" name="<?=$page?>" class="btn btn-success btn-flat" title="Simpan" data-toggle="tooltip"
                                            data-placement="top">
                                <i class="fa fa-save"> </i>
                            </button>
                            <button type="reset" class="btn btn-flat" title="Reset" data-toggle="tooltip"
                                            data-placement="top"> <i class="fa fa-close"></i></button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>

</section>
<!-- /.content -->