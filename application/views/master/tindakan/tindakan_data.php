<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Data Tindakan
        <small>Tindakan</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i></a></li>
        <!-- <li><a href="#">Examples</a></li> -->
        <li class="active">Tindakan</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">

    <?php $this->view('messages')?>
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Data Tindakan</h3>
            <div class="pull-right">
            <a href="<?=site_url('tindakan/add')?>" class="btn btn-primary btn-flat">
                <i class="fa fa-plus"> Tambah</i>
            </a>
            </div>
        </div>
        <div class="box-body table-responsive">
            <table class="table table-bordered table-striped" id="table1">
                <thead>
                    <tr>
                        <th style="width:5%;">No</th>
                        <th>Kode Tindakan</th>
                        <th>Nama Tindakan</th>
                        <th>Harga</th>
                        <th>Poliklinik</th>
                        <th class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    $no = 1;
                    foreach($row->result() as $key => $data) { ?>
                    <tr>
                        <td><?=$no++?>.</td>
                        <td><?=$data->kode_tindakan?></td>
                        <td><?=$data->nama_tindakan?></td>
                        <td><?=$data->harga?></td>
                        <td><?=$data->nama_poliklinik?></td>
                        <td class="text-center" width="160px;">
                            <a href="<?=site_url('tindakan/edit/'.$data->id)?>" class="btn btn-success btn-flat">
                                <i class="fa fa-pencil"> Ubah</i>
                            </a> 
                            <a href="<?=site_url('tindakan/del/'.$data->id)?>" onclick="return confirm('yakin ingin menghapus data ini ??')" class="btn btn-danger btn-flat">
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