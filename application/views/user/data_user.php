<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Data Users
        <small>Users</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <!-- <li><a href="#">Examples</a></li> -->
        <li class="active">Data Users</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">

    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Data User</h3>
            <div class="pull-right">
            <a href="<?=site_url('user/user/add')?>" class="btn btn-primary btn-flat">
                <i class="fa fa-user-plus"> Create</i>
            </a>
            </div>
        </div>
        <div class="box-body table-responsive">
            <table class="table table-bordered table-striped" id="table1">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Username</th>
                        <th>Name</th>
                        <th>Level</th>
                        <th>Hospital</th>
                        <th class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    $no = 1;
                    foreach($row->result() as $key => $data) { ?>
                    <tr>
                        <td><?=$no++?>.</td>
                        <td><?=$data->username?></td>
                        <td><?=$data->name?></td>
                        <td><?=$data->level == 1 ? "Admin" : "User"?></td>
                        <td><?=$data->name_hospital?></td>
                        <td class="text-center" width="200px">
                            <form action="<?=site_url('user/user/del')?>" method="post">
                            <a href="<?=site_url('user/user/edit/'.$data->id)?>" class="btn btn-success btn-flat">
                                <i class="fa fa-pencil"> Update</i>
                            </a>
                            <input type="hidden" name="id" value="<?=$data->id?>"> 
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