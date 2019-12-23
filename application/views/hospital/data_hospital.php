<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Data Hospital
        <small>Hospital</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="<?=site_url('dashboard')?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <!-- <li><a href="#">Examples</a></li> -->
        <li class="active">Data Hospital</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">

    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Data Hospital</h3>
            <div class="pull-right">
            <a href="<?=site_url('hospital/hospital/add')?>" class="btn btn-primary btn-flat">
                <i class="fa fa-plus"> Create</i>
            </a>
            </div>
        </div>
        <div class="box-body table-responsive">
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Name</th>
                        <th>Address</th>
                        <th>No Telp</th>
                        <th>Contact Emergency</th>
                        <th>Image</th>
                        <th>Note</th>
                        <th class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    $no = 1;
                    foreach($row->result() as $key => $data) { ?>
                    <tr>
                        <td><?=$no++?>.</td>
                        <td><?=$data->nama?></td>
                        <td><?=$data->alamat?></td>
                        <td><?=$data->no_telp?></td>
                        <td><?=$data->emergency_contact?></td>
                        <td>
                           <img src="<?=base_url('/assets/img/'.$data->image_hospital)?>" style="width:100px;">
                        </td>
                        <td><?=$data->keterangan?></td>
                        <td class="text-center" width="200px">
                            <form action="<?=site_url('hospital/hospital/del?')?>" method="post">
                            <a href="<?=site_url('hospital/hospital/edit/'.$data->id_hospital)?>" class="btn btn-success btn-flat">
                                <i class="fa fa-pencil"> Update</i>
                            </a>
                            <input type="text" name="id_hospital" value="<?=$data->id_hospital?>"> 
                            <button onclick="return confirm('Are you sure ??')" class="btn btn-danger btn-flat">
                                <i class="fa fa-trash"> Delete</i>
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