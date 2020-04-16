<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Data Barang
        <small>Barang</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i></a></li>
        <!-- <li><a href="#">Examples</a></li> -->
        <li class="active">Barang</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">

    <div class="box">
        <div class="box-header">
            <h3 class="box-title"><?=ucfirst($page)?> Barang</h3>
            <div class="pull-right">
            <a href="<?=site_url('barang')?>" class="btn btn-warning btn-flat">
                <i class="fa fa-undo"> Kembali</i>
            </a>
            </div>
        </div>
        <div class="box-body">
            <div class="row">
            <div class="col-md-4 col-md-offset-4">
            <form action="<?=site_url('barang/process')?>" method="post">
                <div class="form-group">
                    <label>Kode Barang *</label>
                    <input type="text" name="id" value="<?=$row->id?>">
                    <input type="text" name="kode_barang" value="<?=$row->kode_barang?>" class="form-control" required> 
                </div>
                <div class="form-group">
                    <label>Nama Barang *</label>
                    <input type="text" name="nama_barang" value="<?=$row->nama_barang?>" class="form-control" required> 
                </div>
                <div class="form-group">
                    <label>Satuan *</label>
                    <input type="text" name="satuan" value="<?=$row->satuan?>" class="form-control" required> 
                </div>
                <div class="form-group">
                    <label> Jenis</label>
                    <!-- <select name="jenis" class="form-control" required>
                        <option value="">Choise</option>
                        <option value="Medis">Medis</option>
                        <option value="Non Medis">Non Medis</option>
                    </select> -->
                    <select name="jenis" class="form-control">
                        <?php $jenis = $this->input->post('jenis') ? $this->input->post('jenis') : $row->jenis ?>
                        <option value="Medis">Medis</option>
                        <option value="Non Medis" <?=$jenis == 'Non Medis' ? 'selected' : null ?>>Non Medis</option>
                    </select>
                  
                </div>
                <div class="form-group">
                    <button type="submit" name="<?=$page?>" class="btn btn-success btn-flat">
                        <i class="fa fa-paper-plane"> Simpan</i>
                    </button>
                    <button type="reset" class="btn btn-flat"> Reset</button>
                </div>
            </form> 
            </div>
            </div>
        </div>
    </div>

</section>
<!-- /.content -->
