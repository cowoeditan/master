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

    <?php $this->view('messages')?>
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Data Pasien</h3>
            <div class="pull-right">
            <a href="<?=site_url('pasien/add')?>" class="btn btn-primary btn-flat" title="Tambah" data-toggle="tooltip"
                                            data-placement="top">
                <i class="fa fa-plus"></i>
            </a>
            </div>
        </div>
        <div class="box-body table-responsive">
            <table class="table table-bordered table-striped" id="table1">
                <thead>
                    <tr>
                        <th style="width:5%;">No</th>
                        <th >No_Rekamedis</th>
                        <th>Nama_Pasien</th>
                        <th>Golongan_Darah</th>
                        <th>Riwayat_Alergi</th>
                        <th>Jenis_Kelamin</th>
                        <th>Tanggal_Lahir</th>
                        <th>Usia</th>
                        <th>Alamat</th>
                        <th>Pekerjaan</th>
                        <th>No Telp</th>
                        <th>Nama_Penjamin</th>
                        <th>Pekerjaan_Penjamin</th>
                        <th>No.Telp_Penjamin</th>
                        <th>Alamat_Penjamin</th>
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
                        <td><?=$data->golongan_darah?></td>
                        <td><?=$data->riwayat_alergi?></td>
                        <td><?=$data->jenis_kelamin?></td>
                        <td><?=$data->tgl_lahir?></td>
                        <td><?=$data->usia?> Tahun</td>
                        <td><?=$data->alamat?></td>
                        <td><?=$data->pekerjaan?></td>
                        <td><?=$data->no_telp?></td>
                        <td><?=$data->nama_penjamin?></td>
                        <td><?=$data->pekerjaan_penjamin?></td>
                        <td><?=$data->no_telp_penjamin?></td>
                        <td><?=$data->alamat_penjamin?></td>
                        <td class="text-center" width="200px;">
                            <a href="<?=site_url('pasien/edit/'.$data->id)?>" class="btn btn-success btn-flat" title="Ubah" data-toggle="tooltip"
                                            data-placement="top">
                                <i class="fa fa-pencil"></i>
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