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

    <?php $this->view('messages')?>
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Daftar Pasien Masuk</h3>
            <div class="pull-right">
            <a href="<?=site_url('pasien_masuk/add')?>" class="btn btn-primary btn-flat" title="Tambah" data-toggle="tooltip"
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
                        <th>No. Pendaftaran</th>
                        <th>Nama_Pasien</th>
                        <th>Usia_Pasien</th>
                        <th>Poli_Tujuan</th>
                        <th>Dokter_Tujuan</th>
                        <th>Jenis_Pembayaran</th>
                        <th>Tgl_Pemeriksaan</th>
                        <th>Status</th>
                        <th class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    $no = 1;
                    foreach($row->result() as $key => $data) { ?>
                    <tr>
                        <td><?=$no++?>.</td>
                        <td><?=$data->no_regis?></td>
                        <td><?=$data->panggilan .'. '.$data->nama_pasien?></td>
                        <td><?=$data->usia?> Tahun</td>
                        <td><?=$data->nama_poliklinik?></td>
                        <td><?=$data->nama_dokter?></td>
                        <td><?=$data->nama_pembayaran?></td>
                        <td><?=$data->tgl_daftar?></td>
                        <td><?=$data->status?></td>
                        <td class="text-center" width="12%;">
                            <a href="<?=site_url('pasien_masuk/edit/'.$data->id)?>" class="btn btn-success btn-flat" title="Ubah" data-toggle="tooltip"
                                            data-placement="top">
                                <i class="fa fa-pencil"></i>
                            </a> 
                            <a href="<?=site_url('pasien_masuk/del/'.$data->id)?>" onclick="return confirm('yakin ingin menghapus data ini ??')" class="btn btn-danger btn-flat" title="Hapus" data-toggle="tooltip"
                                            data-placement="top">
                                <i class="fa fa-trash"></i>
                            </a>
                            <a href="<?=site_url('pasien_masuk/send/'.$data->id)?>" onclick="return confirm('yakin ingin mengirim data ini ??')" class="btn btn-warning btn-flat" title="Kirim" data-toggle="tooltip"
                                            data-placement="top">
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