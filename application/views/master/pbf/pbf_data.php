<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Data Pbf
        <small>Pbf</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i></a></li>
        <!-- <li><a href="#">Examples</a></li> -->
        <li class="active">Pbf</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">

    <?php $this->view('messages')?>
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Data Pbf</h3>
            <div class="pull-right">
            <a href="<?=site_url('pbf/add')?>" class="btn btn-primary btn-flat">
                <i class="fa fa-plus"> Tambah</i>
            </a>
            </div>
        </div>
        <div class="box-body table-responsive">
            <table class="table table-bordered table-striped" id="table1">
                <thead>
                    <tr>
                        <th style="width:5%;">No</th>
                        <th>Kode Pbf</th>
                        <th>Nama Pbf</th>
                        <th class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    $no = 1;
                    foreach($row->result() as $key => $data) { ?>
                    <tr>
                        <td><?=$no++?>.</td>
                        <td><?=$data->kode_pbf?></td>
                        <td><?=$data->nama_pbf?></td>
                        <td class="text-center" width="160px;">
                            <a href="<?=site_url('pbf/edit/'.$data->id)?>" class="btn btn-success btn-flat">
                                <i class="fa fa-pencil"> Ubah</i>
                            </a> 
                            <a href="<?=site_url('pbf/del/'.$data->id)?>" onclick="return confirm('yakin ingin menghapus data ini ??')" class="btn btn-danger btn-flat">
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