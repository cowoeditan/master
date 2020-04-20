<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Detail
        <small><?php
                foreach ($query_nama_pasien->result() as $key => $data) {
                    echo $data->no_rekamedis . '   -   ' . $data->nama_pasien . ',  ' . $data->daftar;
                }
                ?></small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i></a></li>
        <!-- <li><a href="#">Examples</a></li> -->
        <li class="active">Detail</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <?php $tab = (isset($_GET['tab'])) ? $_GET['tab'] : null; ?>
            <div class="nav-tabs-custom">
                <ul class="nav nav-tabs">
                    <li class="<?php echo ($tab == 'obat') ? 'active' : ''; ?>"><a href="<?php echo site_url('pasien_masuk_kasir/soap/' . $row->id . '?tab=obat'); ?>" data-toggle="obat">Pemberian Obat</a></li>
                    <li class="<?php echo ($tab == 'alat') ? 'active' : ''; ?>"><a href="<?php echo site_url('pasien_masuk_kasir/soap/' . $row->id . '?tab=alat'); ?>" data-toggle="alat">Pemberian Alat</a></li>
                    <li class="<?php echo ($tab == 'racikan') ? 'active' : ''; ?>"><a href="<?php echo site_url('pasien_masuk_kasir/soap/' . $row->id . '?tab=racikan'); ?>" data-toggle="racikan">Pemberian Racikan</a></li>
                </ul>
                <div class="tab-content">



                    <!-- obat-->
                    <div class="tab-pane <?php echo ($tab == 'obat') ? 'active' : ''; ?>" id="obat">

                        <section class="content">

                            <div class="box">
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
                                            $totalobat = 0;
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

                                            <?php $totalobat = $totalobat + ($data->biaya * $data->jumlah);
                                            } ?>
                                            <tr>
                                                <td colspan="4">T O T A L</td>
                                                <td>Rp. <?php echo number_format($totalobat, 2); ?></td>
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
                                            $totalbarang = 0;
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

                                            <?php $totalbarang = $totalbarang + ($data->biaya * $data->jumlah);
                                            } ?>
                                            <tr>
                                                <td colspan="4">T O T A L</td>
                                                <td>Rp. <?php echo number_format($totalbarang, 2); ?></td>
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
                                            $totalracikan = 0;
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

                                            <?php $totalracikan = $totalracikan + ($data->biaya * $data->jumlah);
                                            } ?>
                                            <tr>
                                                <td colspan="4">T O T A L</td>
                                                <td>Rp. <?php echo number_format($totalracikan, 2); ?></td>
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
                <section class="content">
                    <div class="col-xs-8">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Rincian</th>

                                    <th>Sub Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                <form action="<?= site_url('pasien_masuk_kasir/bayar') ?>" method="post">
                                    <input type="hidden" name="id" value="<?= $data->id_pasien ?>">
                                    <tr>
                                        <td>TOTAL BIAYA TINDAKAN (TINDAKAN & ALAT)</td>
                                        <td> <input id="totaltindakan" type="text" value="Rp. <?php echo $totalbarang ?>" readonly> </td>
                                    </tr>
                                    <tr>
                                        <td>TOTAL BIAYA OBAT (OBAT & RACIKAN)</td>
                                        <td><input id="totalobat" type="text" value="Rp. <?php echo $totalobat ?>" readonly> </td>
                                    </tr>
                                    <tr>
                                        <td>PENAMBAHAN BIAYA</td>
                                        <td><input id="penambahanbiaya" name="tambah_biaya" type="text" value="Rp. 0"></td>
                                    </tr>
                                    <tr>
                                        <td>PENGURANGAN BIAYA</td>
                                        <td><input id="penguranganbiaya" name="kurang_biaya" type="text" value="Rp. 0"></td>
                                    </tr>
                                    <tr>
                                        <td>TOTAL KESELURUHAN</td>
                                        <td><input id="totalkeseluruhan" name="biaya_keseluruhan" style="color: red; font-style: bold;" type="text" value="" readonly></td>
                                    </tr>
                                    <tr>
                                        <td>TUNAI</td>
                                        <td><input id="tunai" name="tunai" type="text" value="Rp. <?php echo number_format(0, 0); ?>"></td>
                                    </tr>
                                    <tr>
                                        <td>KEMBALIAN</td>
                                        <td><input id="kembalian" name="kembalian" type="text" style="color: red; font-style: bold;" value="Rp. <?php echo number_format(0, 0); ?>" readonly></td>
                                    </tr>
                                    <div class="form-group">
                                        <button type="submit" name="bayar" class="btn btn-success btn-flat" title="Bayar" data-toggle="tooltip" data-placement="top">
                                            <i class="fa fa-save"></i>
                                        </button>
                                        <a href="<?= site_url('pasien_masuk_kasir') ?>" class="btn btn-default btn-flat" title="Kembali" data-toggle="tooltip" data-placement="top">
                                            <i class="fa fa-undo"></i>
                                        </a>
                                    </div>
                                </form>
                            </tbody>
                        </table>
                    </div>

                </section>
                <!-- /.tab-content -->
            </div>
            <!-- /.nav-tabs-custom -->
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->


</section>
<!-- /.content -->