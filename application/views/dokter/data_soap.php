<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Rekamedis Soap Pasien
        <small><?php
                foreach ($query_nama_pasien->result() as $key => $data) {
                    echo $data->no_rekamedis . '   -   ' . $data->nama_pasien . ',  ' . $data->daftar;
                }
                ?></small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i></a></li>
        <li class="active">Rekamedis Soap Pasien</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <?php $tab = (isset($_GET['tab'])) ? $_GET['tab'] : null; ?>
            <div class="nav-tabs-custom">
                <ul class="nav nav-tabs">
                    <li class="<?php echo ($tab == 'soap') ? 'active' : ''; ?>"><a href="<?php echo site_url('pasien_masuk_poli/data_soap_rekamedis/' . $row->id . '?tab=soap'); ?>" data-toggle="soap">Soap</a></li>
                    <li class="<?php echo ($tab == 'tindakan') ? 'active' : ''; ?>"><a href="<?php echo site_url('pasien_masuk_poli/data_soap_rekamedis/' . $row->id . '?tab=tindakan'); ?>" data-toggle="tindakan">Pemberian Tindakan</a></li>
                    <li class="<?php echo ($tab == 'obat') ? 'active' : ''; ?>"><a href="<?php echo site_url('pasien_masuk_poli/data_soap_rekamedis/' . $row->id . '?tab=obat'); ?>" data-toggle="obat">Pemberian Obat</a></li>
                    <li class="<?php echo ($tab == 'alat') ? 'active' : ''; ?>"><a href="<?php echo site_url('pasien_masuk_poli/data_soap_rekamedis/' . $row->id . '?tab=alat'); ?>" data-toggle="alat">Pemberian Alat</a></li>
                    <li class="<?php echo ($tab == 'racikan') ? 'active' : ''; ?>"><a href="<?php echo site_url('pasien_masuk_poli/data_soap_rekamedis/' . $row->id . '?tab=racikan'); ?>" data-toggle="racikan">Pemberian Racikan</a></li>
                </ul>
                <div class="tab-content">
                    <!-- soap -->
                    <div class="tab-pane <?php echo ($tab == 'soap') ? 'active' : ''; ?>">
                        <!-- Main content -->
                        <section class="content">

                            <div class="box">
                                <div class="box-header">
                                    <div class="pull-right">
                                        <a href="<?= site_url('pasien_masuk_poli/data_rekamedis/' . $row->id_pasien) ?>" class="btn btn-warning btn-flat" title="Kembali" data-toggle="tooltip" data-placement="top">
                                            <i class="fa fa-undo"></i>
                                        </a>
                                    </div>
                                </div>
                                <div class="box-body">
                                    <div class="row">
                                        <form action="<?= site_url('pasien_masuk_poli/process') ?>" method="post">
                                            <input type="hidden" name="id" value="<?= $row->id ?>">
                                            <div class="col-md-12">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>KELUHAN : </label><?= $row->keterangan_sakit ?>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-12">
                                                <hr>
                                            </div>
                                            <div class="col-md-12">

                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <label>TD : </label> <?= $row->td ?>

                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <label>N : </label> <?= $row->n ?>
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <label>RR : </label> <?= $row->rr ?>
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <label>S : </label> <?= $row->s ?>
                                                    </div>
                                                </div>
                                            </div>


                                            <?php

                                            if ($row->id_poliklinik == 3) { ?>
                                                <div class="col-md-12">
                                                    <div class="col-md-2">
                                                        <div class="form-group">
                                                            <label>GIGI : </label> <?= $row->gigi ?>

                                                        </div>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <div class="form-group">
                                                            <label>PERIODONTAL : </label> <?= $row->periodontal ?>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <div class="form-group">
                                                            <label>LIDAH : </label> <?= $row->lidah ?>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <div class="form-group">
                                                            <label>BUKAL : </label> <?= $row->bukal ?>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <div class="form-group">
                                                            <label>PALATUM : </label> <?= $row->palatum ?>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <div class="form-group">
                                                            <label>BIBIR : </label> <?= $row->bibir ?>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <div class="form-group">
                                                            <label>LEHER ATAS</label> <?= $row->leher_atas ?>
                                                        </div>
                                                    </div>

                                                </div>
                                            <?php
                                            } else if ($row->id_poliklinik == 10) { ?>

                                                <div class="col-md-12">
                                                    <div class="col-md-2">
                                                        <div class="form-group">
                                                            <label>KEPALA : </label> <?= $row->kepala ?>

                                                        </div>
                                                    </div>

                                                    <div class="col-md-2">
                                                        <div class="form-group">
                                                            <label>LEHER : </label> <?= $row->leher ?>

                                                        </div>
                                                    </div>

                                                    <div class="col-md-2">
                                                        <div class="form-group">
                                                            <label>THORAX : </label> <?= $row->thorax ?>

                                                        </div>
                                                    </div>

                                                    <div class="col-md-2">
                                                        <div class="form-group">
                                                            <label>ABDOMEN : </label> <?= $row->abdomen ?>

                                                        </div>
                                                    </div>

                                                    <div class="col-md-2">
                                                        <div class="form-group">
                                                            <label>EXTREMITAS : </label> <?= $row->extremitas ?>

                                                        </div>
                                                    </div>


                                                </div>
                                            <?php } else if ($row->id_poliklinik == 4) { ?>
                                                <div class="col-md-12">
                                                    <div class="col-md-2">
                                                        <div class="form-group">
                                                            <label>HPL : </label> <?= $row->hpl ?>

                                                        </div>
                                                    </div>

                                                    <div class="col-md-2">
                                                        <div class="form-group">
                                                            <label>HPHT : </label> <?= $row->hpht ?>

                                                        </div>
                                                    </div>

                                                    <div class="col-md-2">
                                                        <div class="form-group">
                                                            <label>USIA KEHAMILAN : </label> <?= $row->usia_kehamilan ?>

                                                        </div>
                                                    </div>

                                                    <div class="col-md-2">
                                                        <div class="form-group">
                                                            <label>BB : </label> <?= $row->bb ?>

                                                        </div>
                                                    </div>

                                                    <div class="col-md-2">
                                                        <div class="form-group">
                                                            <label>DJJ : </label> <?= $row->djj ?>

                                                        </div>
                                                    </div>
                                                    
                                                    <div class="col-md-2">
                                                        <div class="form-group">
                                                            <label>ABDOMEN : </label> <?= $row->abdomen_bidan ?>

                                                        </div>
                                                    </div>
                                                    
                                                    <div class="col-md-2">
                                                        <div class="form-group">
                                                            <label>THERAPY : </label> <?= $row->therapy ?>

                                                        </div>
                                                    </div>
                                                    
                                                    <div class="col-md-2">
                                                        <div class="form-group">
                                                            <label>PEMERIKSAAN PENUNJANG : </label> <?= $row->pemeriksaan_penunjang ?>

                                                        </div>
                                                    </div>
                                                    
                                                    <div class="col-md-2">
                                                        <div class="form-group">
                                                            <label>LILA : </label> <?= $row->lila ?>

                                                        </div>
                                                    </div>


                                                </div>

                                            <?php } ?>


                                            <div class="col-md-12">
                                                <hr>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>DIAGNOSA : </label> <?= $row->diagnosa ?>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-12">
                                                <hr>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Perawat : </label> <?= $row->perawat ?>
                                                    </div>
                                                </div>
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
                                    <div class="pull-right">
                                        <a href="<?= site_url('pasien_masuk_poli/data_rekamedis/' . $row->id_pasien) ?>" class="btn btn-warning btn-flat" title="Kembali" data-toggle="tooltip" data-placement="top">
                                            <i class="fa fa-undo"></i>
                                        </a>
                                    </div>
                                </div>
                                <div class="box-body">
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Tindakan</th>
                                                <th>Biaya</th>
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
                                    <div class="pull-right">
                                        <a href="<?= site_url('pasien_masuk_poli/data_rekamedis/' . $row->id_pasien) ?>" class="btn btn-warning btn-flat" title="Kembali" data-toggle="tooltip" data-placement="top">
                                            <i class="fa fa-undo"></i>
                                        </a>
                                    </div>
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
                                    <div class="pull-right">
                                        <a href="<?= site_url('pasien_masuk_poli/data_rekamedis/' . $row->id_pasien) ?>" class="btn btn-warning btn-flat" title="Kembali" data-toggle="tooltip" data-placement="top">
                                            <i class="fa fa-undo"></i>
                                        </a>
                                    </div>
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
                                    <div class="pull-right">
                                        <a href="<?= site_url('pasien_masuk_poli/data_rekamedis/' . $row->id_pasien) ?>" class="btn btn-warning btn-flat" title="Kembali" data-toggle="tooltip" data-placement="top">
                                            <i class="fa fa-undo"></i>
                                        </a>
                                    </div>
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