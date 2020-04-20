<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Daftar Rekap Pembayaran Pasien
        <small>Daftar Rekap Pembayaran Pasien</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i></a></li>
        <!-- <li><a href="#">Examples</a></li> -->
        <li class="active">Rekap Pembayaran Pasien</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">

    <?php $this->view('messages') ?>
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Rekap Pembayaran Pasien</h3>

        </div>
        <div class="box-body table-responsive">
            <table class="table table-bordered table-striped" id="table2">
                <thead>
                    <tr>
                        <th style="width:5%;">No</th>
                        <th>No. Rekamedis</th>
                        <th>Nama_Pasien</th>
                        <th>Tgl_Berobat</th>
                        <th>Tujuan_Poli</th>
                        <th>Dokter</th>
                        <th>Jenis_Pembayaran</th>
                        <th>Status</th>
                        <th>Biaya Berobat</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 1;
                    foreach ($row->result() as $key => $data) { ?>
                        <tr>
                            <td><?= $no++ ?>.</td>
                            <td><?= $data->no_rekamedis ?></td>
                            <td><?= $data->panggilan . '. ' . $data->nama_pasien ?></td>
                            <td><?= $data->tgl_daftar ?></td>
                            <td><?= $data->nama_poliklinik ?></td>
                            <td><?= $data->name ?></td>
                            <td><?= $data->nama_pembayaran ?>
                                
                            </td>
                            <td>
                                <?php
                                if ($data->status == 7) { ?>
                                    <p style="color: green;"><b>Selesai Berobat<a href="<?= site_url('pasien_masuk_kasir/soap/' . $data->id . '?tab=obat') ?>" title="Detail" data-toggle="tooltip" data-placement="top">
                                    <i class="fa fa-eye"> </i>
                                </a></b></p>
                                <?php } ?>
                                
                            </td>
                            <td>Rp. <?= $data->biaya_keseluruhan ?></td>

                        </tr>

                    <?php } ?>
                </tbody>
                <tfoot>
                    <tr>
                        <th colspan="8" style="text-align:right">Total:</th>
                        <th></th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>

</section>
<!-- /.content -->