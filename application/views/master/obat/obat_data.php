<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Data Obat
        <small>Obat</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i></a></li>
        <!-- <li><a href="#">Examples</a></li> -->
        <li class="active">Obat</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">

    <?php $this->view('messages')?>
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Data Obat</h3>
            <div class="pull-right">
            <a href="<?=site_url('obat/add')?>" class="btn btn-primary btn-flat">
                <i class="fa fa-plus"> Tambah</i>
            </a>
            </div>
        </div>
        <div class="box-body table-responsive">
            <table class="table table-bordered table-striped" id="table1">
                <thead>
                    <tr>
                        <th style="width:5%;">No</th>
                        <th>Kode Obat</th>
                        <th>Nama Obat</th>
                        <th>Satuan</th>
                        <th>Sediaan</th>
                        <th>Pbf</th>
                        <th>Principal</th>
                        <th>Jenis</th>
                        <th>Komposisi</th>
                        <th class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    $no = 1;
                    foreach($row->result() as $key => $data) { ?>
                    <tr>
                        <td><?=$no++?>.</td>
                        <td><?=$data->kode_obat?></td>
                        <td><?=$data->nama_obat?></td>
                        <td><?=$data->satuan?></td>
                        <td><?=$data->sediaan?></td>
                        <td><?=$data->nama_pbf?></td>
                        <td><?=$data->nama_principal?></td>
                        <td><?=$data->jenis?></td>
                        <td><?=$data->komposisi?></td>
                        <td class="text-center" width="160px;">
                            <a href="<?=site_url('obat/edit/'.$data->id)?>" class="btn btn-success btn-flat">
                                <i class="fa fa-pencil"> Ubah</i>
                            </a> 
                            <a href="<?=site_url('obat/del/'.$data->id)?>" onclick="return confirm('yakin ingin menghapus data ini ??')" class="btn btn-danger btn-flat">
                                <i class="fa fa-trash"> Hapus</i>
                            </button>
                            
                        </td>
                    </tr>

                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>

</section>
<!-- /.content -->