<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Daftar Pasien Masuk Apotek
        <small>Pasien Masuk Apotek</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i></a></li>
        <!-- <li><a href="#">Examples</a></li> -->
        <li class="active">Pasien Masuk Apotek</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">

    <?php $this->view('messages')?>
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Daftar Pasien Masuk Apotek</h3>
            
        </div>
        <div class="box-body table-responsive">
            <table class="table table-bordered table-striped" id="table1">
                <thead>
                    <tr>
                        <th style="width:5%;">No</th>
                        <th>No. Rekamedis</th>
                        <th>Nama_Pasien</th>
                        <!-- <th>Usia_Pasien</th>
                        <th>Jenis_Kelamin</th> -->
                        <th>Jenis_Pembayaran</th>
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
                        <td><?=$data->no_rekamedis?></td>
                        <td><?=$data->panggilan .'. '.$data->nama_pasien?></td>
                        <td><?=$data->nama_pembayaran?></td>
                        <td><?=$data->status?></td>
                        <td class="text-center" width="15%;">
                            <?php 
                                if ($data->status == 3) { ?>
                                    <a href="<?=site_url('pasien_masuk_apotek/soap/'.$data->id.'?tab=obat')?>" class="btn btn-warning btn-sm" title="Detail" data-toggle="tooltip"
                                                    data-placement="top">
                                        <i class="fa fa-newspaper-o"> </i>
                                    </a> 
                                <?php } else if ($data->status == 5) { ?>
                                    <a href="<?=site_url('pasien_masuk_apotek/ambilobat/'.$data->id.'?tab=obat')?>" class="btn btn-success btn-sm" title="Ambil Obat" data-toggle="tooltip"
                                                    data-placement="top">
                                        <i class="fa fa-check"> </i>
                                    </a> 
                                <?php }
                                
                            ?>
                            
                            
                           
                        </td>
                    </tr>

                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>

</section>
<!-- /.content -->