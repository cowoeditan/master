<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Daftar Pasien Masuk Poli
        <small>Pasien Masuk Poli</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i></a></li>
        <!-- <li><a href="#">Examples</a></li> -->
        <li class="active">Pasien Masuk Poli</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">

    <?php $this->view('messages')?>
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Daftar Pasien Masuk Poli</h3>
            
        </div>
        <div class="box-body table-responsive">
            <table class="table table-bordered table-striped" id="table1">
                <thead>
                    <tr>
                        <th style="width:5%;">No</th>
                        <th>No. Rekamedis</th>
                        <th>Nama_Pasien</th>
                        <th>Usia_Pasien</th>
                        <th>Jenis_Kelamin</th>
                        <th>Jenis_Pembayaran</th>
                        <th>Riwayat_Alergi</th>
                        <th class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    $no = 1;
                    foreach($row->result() as $key => $data) { ?>
                    <tr>
                        <td><?=$no++?>.</td>
                        <td><?=$data->no_rekamedis?></td>
                        <td><?=$data->panggilan .'. '.$data->nama_pasien?></td>
                        <td><?=$data->usia?> Tahun</td>
                        <td><?=$data->jenis_kelamin?></td>
                        <td><?=$data->nama_pembayaran?></td>
                        <td><?=$data->riwayat_alergi?></td>
                        <td class="text-center" width="15%;">
                            <a href="<?=site_url('pasien_masuk_poli/soap/'.$data->id.'?tab=soap')?>" class="btn btn-success btn-sm" title="Isi SOAP" data-toggle="tooltip"
                                            data-placement="top">
                                <i class="fa fa-newspaper-o"> </i>
                            </a> 
                            <a href="<?=site_url('pasien_masuk_poli/data_rekamedis/'.$data->id_pasien)?>" class="btn btn-info btn-sm" title="Riwayat Rekamedis" data-toggle="tooltip"
                                            data-placement="top">
                                <i class="fa fa-file-text-o"></i>
                            </a>
                            <a href="<?=site_url('pasien_masuk_poli/send/'.$data->id)?>" onclick="return confirm('yakin ingin mengirim data ini ??')" title="Kirim Ke Apotek" data-toggle="tooltip"
                                            data-placement="top"class="btn btn-warning btn-sm">
                                <i class="fa fa-send-o"></i>
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