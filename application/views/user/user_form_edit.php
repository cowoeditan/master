<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Edit Users
        <small>Users</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <!-- <li><a href="#">Examples</a></li> -->
        <li class="active">Edit Users</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">

    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Edit User</h3>
            <div class="pull-right">
                <a href="<?=site_url('user/user')?>" class="btn btn-warning btn-flat">
                    <i class="fa fa-undo"> Back</i>
                </a>
            </div>
        </div>
        <div class="box-body">
            <div class="row">
                <div class="col-md-4 col-md-offset-4">
                    <form action="" method="post">
                        
                        <div class="form-group <?=form_error('fullname') ? 'has-error' : null ?>">
                            <label> Full Name</label>
                            <input type="hidden" name="id" value="<?= $row->id?>">
                            <input type="text" name="fullname" value="<?=$this->input->post('fullname') ?? $row->name ?>" class="form-control">
                            <?=form_error('fullname')?>
                        </div>
                        <div class="form-group <?=form_error('username') ? 'has-error' : null ?>">
                            <label> Username</label>
                            <input type="text" name="username" value="<?=$this->input->post('username') ?? $row->username ?>" class="form-control">
                            <?=form_error('username')?>
                        </div>
                        <div class="form-group <?=form_error('password') ? 'has-error' : null ?>">
                            <label> Password</label>
                            <input type="password" name="password" value="<?=$this->input->post('password')?>" class="form-control">
                            <?=form_error('password')?>
                        </div>
                        <div class="form-group <?=form_error('passconf') ? 'has-error' : null ?>">
                            <label> Password Confirmation</label>
                            <input type="password" name="passconf" value="<?=$this->input->post('passconf')?>" class="form-control">
                            <?=form_error('passconf')?>
                        </div>
                        <div class="form-group <?=form_error('level') ? 'has-error' : null ?>">
                            <label> Level</label>
                            <select name="level" class="form-control">
                                <?php $level = $this->input->post('level') ? $this->input->post('level') : $row->level ?>
                                <option value="1">Admin</option>
                                <option value="2" <?=$level == 2 ? 'selected' : null ?>>User</option>
                            </select>
                            <?=form_error('level')?>
                        </div>
                        <div class="form-group">
                            <label> Hospital</label>
                            <select name="id_hospital" class="form-control">
                                <option value="">Choise</option>
                               <?php foreach($hospital->result() as $key => $data) { ?>
                               <option value="<?=$data->id_hospital?>" <?=$data->id_hospital == $row->id_hospital ? "selected" : null ?>><?=$data->nama?></option>
                               <?php } ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-success btn-flat">
                                <i class="fa fa-paper-plane"></i>Save
                            </button>
                            <button type="reset" class="btn btn-flat">Reset</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</section>
<!-- /.content -->