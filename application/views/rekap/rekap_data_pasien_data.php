<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Daftar Rekap Pasien
        <small>Daftar Rekap Pasien</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i></a></li>
        <!-- <li><a href="#">Examples</a></li> -->
        <li class="active">Rekap Pasien</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">

    <?php $this->view('messages') ?>
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Rekap Pasien</h3>

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
                                if ($data->status == 1) { ?>
                                    <p style="color: orange;"><b>Dalam Antrian</b></p>
                                <?php } else if ($data->status == 2) { ?>
                                    <p style="color: dodgerblue;"><b>Berada Di Poli</b></p>
                                <?php } else if ($data->status == 3) { ?>
                                    <p style="color: slateblue;"><b>Penyiapan Obat Oleh Apotek</b></p>
                                <?php } else if ($data->status == 4) { ?>
                                    <p style="color: tomato;"><b>Menunggu Pembayaran</b></p>
                                <?php } else if ($data->status == 5) { ?>
                                    <p style="color: mediumaquamarine;"><b>Ambil Obat di Apotek</b></p>
                                <?php } else if ($data->status == 6) { ?>
                                    <p style="color: mediumseagreen;"><b>Pengambilan Obat</b></p>
                                <?php } else if ($data->status == 7) { ?>
                                    <p style="color: green;"><b>Selesai Berobat</b></p>
                                <?php } ?>
                                

                            </td>

                        </tr>

                    <?php } ?>
                </tbody>

            </table>
        </div>
    </div>

</section>
<!-- /.content -->