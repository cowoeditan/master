<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Soap
        <small><?php
                foreach ($query_nama_pasien->result() as $key => $data) {
                    echo $data->no_rekamedis . '   -   ' . $data->nama_pasien . ',  ' . $data->daftar;
                }
                ?></small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i></a></li>
        <!-- <li><a href="#">Examples</a></li> -->
        <li class="active">Soap</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <?php $tab = (isset($_GET['tab'])) ? $_GET['tab'] : null; ?>
            <div class="nav-tabs-custom">
                <ul class="nav nav-tabs">
                    <li class="<?php echo ($tab == 'soap') ? 'active' : ''; ?>"><a href="<?php echo site_url('pasien_masuk_poli/soap/' . $row->id . '?tab=soap'); ?>" data-toggle="soap">Soap</a></li>
                    <li class="<?php echo ($tab == 'tindakan') ? 'active' : ''; ?>"><a href="<?php echo site_url('pasien_masuk_poli/soap/' . $row->id . '?tab=tindakan'); ?>" data-toggle="tindakan">Pemberian Tindakan</a></li>
                    <li class="<?php echo ($tab == 'obat') ? 'active' : ''; ?>"><a href="<?php echo site_url('pasien_masuk_poli/soap/' . $row->id . '?tab=obat'); ?>" data-toggle="obat">Pemberian Obat</a></li>
                    <li class="<?php echo ($tab == 'alat') ? 'active' : ''; ?>"><a href="<?php echo site_url('pasien_masuk_poli/soap/' . $row->id . '?tab=alat'); ?>" data-toggle="alat">Pemberian Alat</a></li>
                    <li class="<?php echo ($tab == 'racikan') ? 'active' : ''; ?>"><a href="<?php echo site_url('pasien_masuk_poli/soap/' . $row->id . '?tab=racikan'); ?>" data-toggle="racikan">Pemberian Racikan</a></li>
                </ul>
                <div class="tab-content">
                    <!-- soap -->
                    <div class="tab-pane <?php echo ($tab == 'soap') ? 'active' : ''; ?>">
                        <!-- Main content -->
                        <section class="content">

                            <div class="box">
                                <div class="box-header">
                                    <!-- <div class="pull-right">
                                        <a href="<?= site_url('pasien_masuk_poli') ?>" class="btn btn-warning btn-flat">
                                            <i class="fa fa-check"> Selesai</i>
                                        </a>
                                    </div> -->
                                </div>
                                <div class="box-body">
                                    <div class="row">
                                        <form action="<?= site_url('pasien_masuk_poli/process') ?>" method="post">
                                            <input type="hidden" name="id" value="<?= $row->id ?>">
                                            <input type="hidden" name="id_poliklinik" value="<?= $row->id_poliklinik ?>">
                                            <div class="col-md-12">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Keluhan</label>
                                                        <textarea name="keterangan_sakit" class="form-control" required> <?= $row->keterangan_sakit ?></textarea>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-12">
                                                <hr>
                                            </div>
                                            <div class="col-md-12">

                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label>TD</label>
                                                        <input name="td" class="form-control" value="<?= $row->td ?>" required>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label>N</label>
                                                        <input name="n" class="form-control" value="<?= $row->n ?>" required>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label>RR</label>
                                                        <input name="rr" class="form-control" value="<?= $row->rr ?>" required>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label>S</label>
                                                        <input name="s" class="form-control" value="<?= $row->s ?>" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <?php

                                            if ($row->id_poliklinik == 3) { ?>

                                                <div class="col-md-12">
                                                    <div class="col-md-2">
                                                        <div class="form-group">
                                                            <label>GIGI</label>
                                                            <input name="gigi" class="form-control" value="<?= $row->gigi ?>" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <div class="form-group">
                                                            <label>PERIODONTAL</label>
                                                            <input name="periodontal" class="form-control" value="<?= $row->periodontal ?>" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <div class="form-group">
                                                            <label>LIDAH</label>
                                                            <input name="lidah" class="form-control" value="<?= $row->lidah ?>" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <div class="form-group">
                                                            <label>BUKAL</label>
                                                            <input name="bukal" class="form-control" value="<?= $row->bukal ?>" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <div class="form-group">
                                                            <label>PALATUM</label>
                                                            <input name="palatum" class="form-control" value="<?= $row->palatum ?>" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <div class="form-group">
                                                            <label>BIBIR</label>
                                                            <input name="bibir" class="form-control" value="<?= $row->bibir ?>" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <div class="form-group">
                                                            <label>LEHER ATAS</label>
                                                            <input name="leher_atas" class="form-control" value="<?= $row->leher_atas ?>" required>
                                                        </div>
                                                    </div>
                                                </div>

                                            <?php
                                            } else if ($row->id_poliklinik == 10) { ?>
                                                <div class="col-md-12">
                                                    <div class="col-md-2">
                                                        <div class="form-group">
                                                            <label>KEPALA</label>
                                                            <input name="kepala" class="form-control" value="<?= $row->kepala ?>" required>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-2">
                                                        <div class="form-group">
                                                            <label>LEHER</label>
                                                            <input name="leher" class="form-control" value="<?= $row->leher ?>" required>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-2">
                                                        <div class="form-group">
                                                            <label>THORAX</label>
                                                            <input name="thorax" class="form-control" value="<?= $row->thorax ?>" required>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-2">
                                                        <div class="form-group">
                                                            <label>ABDOMEN</label>
                                                            <input name="abdomen" class="form-control" value="<?= $row->abdomen ?>" required>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-2">
                                                        <div class="form-group">
                                                            <label>EXTREMITAS</label>
                                                            <input name="extremitas" class="form-control" value="<?= $row->extremitas ?>" required>
                                                        </div>
                                                    </div>


                                                </div>
                                            <?php } else if ($row->id_poliklinik == 4) { ?>

                                                <div class="col-md-12">
                                                    <div class="col-md-2">
                                                        <div class="form-group">
                                                            <label>HPL</label>
                                                            <input name="hpl" class="form-control" value="<?= $row->hpl ?>" required>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-2">
                                                        <div class="form-group">
                                                            <label>HPHT</label>
                                                            <input name="hpht" class="form-control" value="<?= $row->hpht ?>" required>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-2">
                                                        <div class="form-group">
                                                            <label>USIA KEHAMILAN</label>
                                                            <input name="usia_kehamilan" class="form-control" value="<?= $row->usia_kehamilan ?>" required>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-2">
                                                        <div class="form-group">
                                                            <label>BB</label>
                                                            <input name="bb" class="form-control" value="<?= $row->bb ?>" required>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-2">
                                                        <div class="form-group">
                                                            <label>DJJ</label>
                                                            <input name="djj" class="form-control" value="<?= $row->djj ?>" required>
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="col-md-2">
                                                        <div class="form-group">
                                                            <label>ABDOMEN</label>
                                                            <input name="abdomen_bidan" class="form-control" value="<?= $row->abdomen_bidan ?>" required>
                                                        </div>
                                                    </div>
                                                   
                                                    <div class="col-md-2">
                                                        <div class="form-group">
                                                            <label>THERAPY</label>
                                                            <input name="therapy" class="form-control" value="<?= $row->therapy ?>" required>
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="col-md-2">
                                                        <div class="form-group">
                                                            <label>PEMERIKSAAN PENUNJANG </label>
                                                            <input name="pemeriksaan_penunjang" class="form-control" value="<?= $row->pemeriksaan_penunjang ?>" required>
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="col-md-2">
                                                        <div class="form-group">
                                                            <label>LILA </label>
                                                            <input name="lila" class="form-control" value="<?= $row->lila ?>" required>
                                                        </div>
                                                    </div>


                                                </div>
                                            <?php  } ?>


                                            <div class="col-md-12">
                                                <hr>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Diagnosa</label>
                                                        <textarea name="diagnosa" class="form-control" required> <?= $row->diagnosa ?> </textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <hr>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label>Perawat</label>
                                                        <input name="perawat" class="form-control" value="<?= $row->perawat ?>" required>
                                                    </div>
                                                </div>
                                            </div>


                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <button type="submit" name="<?= $page ?>" class="btn btn-primary btn-flat" title="Simpan" data-toggle="tooltip" data-placement="top">
                                                        <i class="fa fa-save"></i>
                                                    </button>
                                                    <a href="<?= site_url('pasien_masuk_poli') ?>" class="btn btn-warning btn-flat" title="Selesai" data-toggle="tooltip" data-placement="top">
                                                        <i class="fa fa-check"></i>
                                                    </a>
                                                    <!-- <button type="reset" class="btn btn-flat"> Reset</button> -->
                                                </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                    </div>

</section>
<!-- /.content -->
</div>
<!-- end soap -->

<!-- tindakan-->
<div class="tab-pane <?php echo ($tab == 'tindakan') ? 'active' : ''; ?>" id="tindakan">

    <section class="content">

        <div class="box">
            <div class="box-header">
                <?php echo form_open('pasien_masuk_poli/simpan', array('class' => 'form-horizontal')); ?>
                <input type="hidden" name="id" value="<?= $row->id ?>">
                <div class="form-group">
                    <label class="col-sm-2 control-label">Nama Tindakan</label>
                    <div class="col-sm-4">
                        <input list="id_tindakan" name="tindakan" placeholder="masukan nama tindakan" class="form-control">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                        <button type="submit" name="submit_tindakan" class="btn btn-primary btn-flat" title="Simpan" data-toggle="tooltip" data-placement="top"><i class="fa fa-save"></i></button>
                        <a href="<?= site_url('pasien_masuk_poli') ?>" class="btn btn-warning btn-flat" title="Selesai" data-toggle="tooltip" data-placement="top">
                            <i class="fa fa-check"></i>
                        </a>
                    </div>
                </div>
                </form>
                <datalist id="id_tindakan">
                    <?php foreach ($tindakan->result() as $b) {
                        echo "<option value='$b->nama_tindakan'>";
                    } ?>

                </datalist>
            </div>
            <div class="box-body">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Tindakan</th>
                            <th>Biaya</th>
                            <th style="text-align: right;">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        $total = 0;
                        foreach ($querytindakan->result() as $key => $data) { ?>
                            <tr>
                                <td><?= $no++ ?>.</td>
                                <td><?= $data->nama_tindakan ?></td>
                                <td>Rp. <?= number_format($data->biaya, 2); ?></td>
                                <td class="text-center" width="15%;">
                                    <?php echo form_open('pasien_masuk_poli/simpan', array('class' => 'form-horizontal')); ?>
                                    <input type="hidden" name="id_pasien" value="<?= $row->id ?>">
                                    <input type="hidden" name="id" value="<?= $data->id ?>">
                                    <button type="submit" name="del_tindakan" class="btn btn-danger btn-flat" title="Hapus" data-toggle="tooltip" data-placement="top"><i class="fa fa-trash"></i></button>
                                    </form>

                                </td>
                            </tr>

                        <?php $total = $total + ($data->biaya);
                        } ?>
                        <tr>
                            <td colspan="2">T O T A L</td>
                            <td>Rp. <?php echo number_format($total, 2); ?></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

    </section>
    <!-- /.content -->

</div>
<!-- end tindakan -->

<!-- obat-->
<div class="tab-pane <?php echo ($tab == 'obat') ? 'active' : ''; ?>" id="obat">

    <section class="content">

        <div class="box">
            <div class="box-header">
                <?php echo form_open('pasien_masuk_poli/simpan', array('class' => 'form-horizontal')); ?>
                <input type="hidden" name="id" value="<?= $row->id ?>">
                <div class="form-group">
                    <label class="col-sm-2 control-label">Nama Obat</label>
                    <div class="col-sm-4">
                        <input list="id_obat" name="obat" placeholder="masukan nama obat" class="form-control">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">Jumlah / Tablet</label>
                    <div class="col-sm-4">
                        <input name="jumlah" placeholder="masukan jumlah obat" class="form-control">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                        <button type="submit" name="submit_obat" class="btn btn-primary btn-flat" title="Simpan" data-toggle="tooltip" data-placement="top"><i class="fa fa-save"></i></button>
                        <a href="<?= site_url('pasien_masuk_poli') ?>" class="btn btn-warning btn-flat" title="Selesai" data-toggle="tooltip" data-placement="top">
                            <i class="fa fa-check"></i>
                        </a>
                    </div>
                </div>
                </form>
                <datalist id="id_obat">
                    <?php foreach ($obat->result() as $b) {
                        echo "<option value='$b->nama_obat'>";
                    } ?>

                </datalist>
            </div>
            <div class="box-body">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Obat</th>
                            <th>Jumlah / Tablet</th>
                            <th>Harga / Tablet</th>
                            <th>Sub Total</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        $total = 0;
                        foreach ($queryobat->result() as $key => $data) { ?>
                            <tr>
                                <td><?= $no++ ?>.</td>
                                <td><?= $data->nama_obat ?></td>
                                <td><?= $data->jumlah ?></td>
                                <td>Rp. <?= number_format($data->biaya, 2); ?></td>
                                <td>Rp. <?php echo number_format($data->jumlah * $data->biaya, 2) ?></td>
                                <td class="text-center" width="15%;">
                                    <?php echo form_open('pasien_masuk_poli/simpan', array('class' => 'form-horizontal')); ?>
                                    <input type="hidden" name="id_pasien" value="<?= $row->id ?>">
                                    <input type="hidden" name="id" value="<?= $data->id ?>">
                                    <button type="submit" name="del_obat" class="btn btn-danger btn-flat" title="Hapus" data-toggle="tooltip" data-placement="top"><i class="fa fa-trash"></i></button>
                                    </form>

                                </td>
                            </tr>

                        <?php $total = $total + ($data->biaya * $data->jumlah);
                        } ?>
                        <tr>
                            <td colspan="4">T O T A L</td>
                            <td>Rp. <?php echo number_format($total, 2); ?></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

    </section>
    <!-- /.content -->

</div>
<!-- end obat -->

<!-- alat-->
<div class="tab-pane <?php echo ($tab == 'alat') ? 'active' : ''; ?>" id="alat">

    <section class="content">

        <div class="box">
            <div class="box-header">
                <?php echo form_open('pasien_masuk_poli/simpan', array('class' => 'form-horizontal')); ?>
                <input type="hidden" name="id" value="<?= $row->id ?>">
                <div class="form-group">
                    <label class="col-sm-2 control-label">Nama Alat</label>
                    <div class="col-sm-4">
                        <input list="id_alat" name="alat" placeholder="masukan nama alat" class="form-control">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">Jumlah / Pcs</label>
                    <div class="col-sm-4">
                        <input name="jumlah" placeholder="masukan jumlah alat" class="form-control">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                        <button type="submit" name="submit_alat" class="btn btn-primary btn-flat" title="Simpan" data-toggle="tooltip" data-placement="top"><i class="fa fa-save"></i></button>
                        <a href="<?= site_url('pasien_masuk_poli') ?>" class="btn btn-warning btn-flat" title="Selesai" data-toggle="tooltip" data-placement="top">
                            <i class="fa fa-check"> </i>
                        </a>
                    </div>
                </div>
                </form>
                <datalist id="id_alat">
                    <?php foreach ($alat->result() as $b) {
                        echo "<option value='$b->nama_barang'>";
                    } ?>

                </datalist>
            </div>
            <div class="box-body">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Alat</th>
                            <th>Jumlah / Pcs</th>
                            <th>Harga / Pcs</th>
                            <th>Sub Total</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        $total = 0;
                        foreach ($queryalat->result() as $key => $data) { ?>
                            <tr>
                                <td><?= $no++ ?>.</td>
                                <td><?= $data->nama_barang ?></td>
                                <td><?= $data->jumlah ?></td>
                                <td>Rp. <?= number_format($data->biaya, 2); ?></td>
                                <td>Rp. <?php echo number_format($data->jumlah * $data->biaya, 2) ?></td>
                                <td class="text-center" width="15%;">
                                    <?php echo form_open('pasien_masuk_poli/simpan', array('class' => 'form-horizontal')); ?>
                                    <input type="hidden" name="id_pasien" value="<?= $row->id ?>">
                                    <input type="hidden" name="id" value="<?= $data->id ?>">
                                    <button type="submit" name="del_alat" class="btn btn-danger btn-flat" title="Hapus" data-toggle="tooltip" data-placement="top"><i class="fa fa-trash"></i></button>
                                    </form>

                                </td>
                            </tr>

                        <?php $total = $total + ($data->biaya * $data->jumlah);
                        } ?>
                        <tr>
                            <td colspan="4">T O T A L</td>
                            <td>Rp. <?php echo number_format($total, 2); ?></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

    </section>
    <!-- /.content -->

</div>
<!-- end alat -->


<!-- racikan-->
<div class="tab-pane <?php echo ($tab == 'racikan') ? 'active' : ''; ?>" id="racikan">

    <section class="content">

        <div class="box">
            <div class="box-header">
                <?php echo form_open('pasien_masuk_poli/simpan', array('class' => 'form-horizontal')); ?>
                <input type="hidden" name="id" value="<?= $row->id ?>">
                <div class="form-group">
                    <label class="col-sm-2 control-label">Nama Obat Racikan</label>
                    <div class="col-sm-4">
                        <input list="id_racikan" name="obat_racikan" placeholder="masukan nama obat racikan" class="form-control">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">Jumlah / Tablet</label>
                    <div class="col-sm-4">
                        <input name="jumlah" placeholder="masukan jumlah obat racikan" class="form-control">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                        <button type="submit" name="submit_racikan" class="btn btn-primary btn-flat" title="Simpan" data-toggle="tooltip" data-placement="top"><i class="fa fa-save "></i></button>
                        <a href="<?= site_url('pasien_masuk_poli') ?>" class="btn btn-warning btn-flat" title="Selesai" data-toggle="tooltip" data-placement="top">
                            <i class="fa fa-check"></i>
                        </a>
                    </div>
                </div>
                </form>
                <datalist id="id_racikan">
                    <?php foreach ($racikan->result() as $b) {
                        echo "<option value='$b->nama_obat'>";
                    } ?>

                </datalist>
            </div>
            <div class="box-body">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Obat Racikan</th>
                            <th>Jumlah / Tablet</th>
                            <th>Harga / Tablet</th>
                            <th>Sub Total</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        $total = 0;
                        foreach ($queryracikan->result() as $key => $data) { ?>
                            <tr>
                                <td><?= $no++ ?>.</td>
                                <td><?= $data->nama_obat ?></td>
                                <td><?= $data->jumlah ?></td>
                                <td>Rp. <?= number_format($data->biaya, 2); ?></td>
                                <td>Rp. <?php echo number_format($data->jumlah * $data->biaya, 2) ?></td>
                                <td class="text-center" width="15%;">
                                    <?php echo form_open('pasien_masuk_poli/simpan', array('class' => 'form-horizontal')); ?>
                                    <input type="hidden" name="id_pasien" value="<?= $row->id ?>">
                                    <input type="hidden" name="id" value="<?= $data->id ?>">
                                    <button type="submit" name="del_racikan" class="btn btn-danger btn-flat" title="Hapus" data-toggle="tooltip" data-placement="top"><i class="fa fa-trash"></i></button>
                                    </form>

                                </td>
                            </tr>

                        <?php $total = $total + ($data->biaya * $data->jumlah);
                        } ?>
                        <tr>
                            <td colspan="4">T O T A L</td>
                            <td>Rp. <?php echo number_format($total, 2); ?></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

    </section>
    <!-- /.content -->

</div>
<!-- end alat -->

</div>
<!-- /.tab-content -->
</div>
<!-- /.nav-tabs-custom -->
</div>
<!-- /.col -->
</div>
<!-- /.row -->
</section>
<!-- /.content -->