<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Daftar Pasien Masuk
        <small>Pasien Masuk</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i></a></li>
        <!-- <li><a href="#">Examples</a></li> -->
        <li class="active">Pasien Masuk</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">

    <div class="box">
        <div class="box-header">
            <h3 class="box-title"><?=ucfirst($page)?> Pasien Masuk</h3>
            <div class="pull-right">
                <a href="<?=site_url('pasien_masuk')?>" class="btn btn-warning btn-flat" title="Kembali" data-toggle="tooltip"
                                            data-placement="top">
                    <i class="fa fa-undo"></i>
                </a>
            </div>
        </div>
        <div class="box-body">
            <div class="row">
                <div class="col-md-4 col-md-offset-4">
                    <form action="<?=site_url('pasien_masuk/process')?>" method="post">
                        <div class="form-group">
                            <label>No Pendaftaran *</label>
                            <input type="hidden" name="id" value="<?=$row->id?>">
                            <input type="text" name="no_regis" value="<?=$no_urut?>" class="form-control"
                            readonly>
                        </div>
                        <div class="form-group">
                            <label>Nama Pasien *</label>
                            <select name="id_pasien" class="form-control" required>
                                <option value="">--Pilih--</option>
                                <?php foreach($pasien->result() as $key =>$data) { ?>
                                <option value="<?=$data->id?>" <?=$data->id == $row->id_pasien ? "selected" : null ?>>
                                    <?=$data->panggilan.'. '.$data->nama_pasien.' || '. $data->tgl_lahir?> </option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Jenis Pembayaran *</label>
                            <select name="id_pembayaran" class="form-control" required>
                                <option value="">--Pilih--</option>
                                <?php foreach($pembayaran->result() as $key =>$data) { ?>
                                <option value="<?=$data->id?>"
                                    <?=$data->id == $row->id_pembayaran ? "selected" : null ?>>
                                    <?=$data->nama_pembayaran?> </option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Tgl Pemeriksaan *</label>
                            <input type="date" name="tgl_daftar" <?php
                                    if($row->tgl_daftar == null){ ?> value="<?php echo date('Y-m-d');?>" <?php 
                                    } else {?> value="<?php echo date('Y-m-d', strtotime($row->tgl_daftar));?>"
                                <?php } ?> class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Tujuan Poliklinik *</label>
                            <select name="id_poliklinik" id="id_poliklinik" class="form-control" required>
                                <option value="">--Pilih--</option>
                                <?php foreach($poliklinik->result() as $key =>$data) { ?>
                                <option value="<?=$data->id?>"
                                    <?=$data->id == $row->id_poliklinik ? "selected" : null ?>>
                                    <?=$data->nama_poliklinik?> </option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Dokter</label>
                            <select class="form-control" id="id_dokter" name="id_dokter" required>
                                <option value="">Belum Dipilih</option>

                            </select>
                        </div>
                        <div class="form-group">
                            <button type="submit" name="<?=$page?>" class="btn btn-success btn-flat" title="Simpan" data-toggle="tooltip"
                                            data-placement="top">
                                <i class="fa fa-save"></i>
                            </button>
                            <button type="reset" class="btn btn-flat" title="Reset" data-toggle="tooltip"
                                            data-placement="top"><i class="fa fa-close"></i></button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</section>
<!-- /.content -->
