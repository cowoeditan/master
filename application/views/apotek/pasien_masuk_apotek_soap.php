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
                    <li class="<?php echo ($tab == 'obat') ? 'active' : ''; ?>"><a href="<?php echo site_url('pasien_masuk_apotek/soap/' . $row->id . '?tab=obat'); ?>" data-toggle="obat">Pemberian Obat</a></li>
                    <li class="<?php echo ($tab == 'alat') ? 'active' : ''; ?>"><a href="<?php echo site_url('pasien_masuk_apotek/soap/' . $row->id . '?tab=alat'); ?>" data-toggle="alat">Pemberian Alat</a></li>
                    <li class="<?php echo ($tab == 'racikan') ? 'active' : ''; ?>"><a href="<?php echo site_url('pasien_masuk_apotek/soap/' . $row->id . '?tab=racikan'); ?>" data-toggle="racikan">Pemberian Racikan</a></li>
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
    <div class="col-md-12">
        <div class="form-group">
            <!-- <button type="submit" name="<?= $page ?>" class="btn btn-primary btn-flat" title="Simpan" data-toggle="tooltip" data-placement="top">
                <i class="fa fa-save"></i>
            </button> -->

            <?php
            foreach ($query_nama_pasien->result() as $key => $data) { ?>
                <a href="<?= site_url('pasien_masuk_apotek/send/' .$data->id_pasien) ?>" class="btn btn-warning btn-flat" title="Kirim Ke Apotek" data-toggle="tooltip" data-placement="top">
                    <i class="fa fa-send-o"> </i>
                </a>
            <?php }
            ?>


            <a href="<?= site_url('pasien_masuk_apotek') ?>" class="btn btn-default btn-flat" title="Selesai" data-toggle="tooltip" data-placement="top">
                <i class="fa fa-undo"></i>
            </a>
        </div>
    </div>
</section>
<!-- /.content -->