<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Riwayat Rekamedis
        <small> <?php
                foreach($data_pasien->result() as $key => $data) { 
                    echo $data->no_rekamedis.'   -   '. $data->nama_pasien;
                 } 
            ?></small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i></a></li>
        <!-- <li><a href="#">Examples</a></li> -->
        <li class="active">Riwayat Rekamedis Pasien</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">

    <?php $this->view('messages')?>
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">
            <?php
                foreach($data_pasien->result() as $key => $data) { 
                    echo $data->no_rekamedis.'   -   '. $data->nama_pasien;
                 }  
            ?>
            </h3>
            <div class="pull-right">
                <a href="<?=site_url('pasien_masuk_poli')?>" class="btn btn-warning btn-flat" title="Kembali"
                    data-toggle="tooltip" data-placement="top">
                    <i class="fa fa-undo"></i>
                </a>
            </div>
        </div>
        <div class="box-body table-responsive">
            <table class="table table-bordered table-striped" id="table1">
                <thead>
                    <tr>
                        <th style="width:5%;">No</th>
                        <th>Tanggal_Berobat</th>
                        <th>Jenis_Pembayaran</th>
                        <th>Tujuan_Poli</th>
                        <th>Dokter</th>
                        <th class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    $no = 1;
                    foreach($row->result() as $key => $data) { ?>
                    <tr>
                        <td><?=$no++?>.</td>
                        <td><?=$data->daftar?></td>
                        <td><?=$data->nama_pembayaran?></td>
                        <td><?=$data->nama_poliklinik?></td>
                        <td><?=$data->nama_dokter?></td>
                        <td class="text-center" width="15%;">
                            <a href="<?=site_url('pasien_masuk_poli/data_soap_rekamedis/'.$data->id.'?tab=soap')?>"
                                class="btn btn-success btn-sm" title="Soap" data-toggle="tooltip"
                                            data-placement="top">
                                <i class="fa fa-newspaper-o"> </i>
                            </a>
                        </td>
                    </tr>

                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>

</section>
<!-- /.content -->