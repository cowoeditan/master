<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>BOUGENVILLE</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="<?= base_url() ?>assets/bower_components/bootstrap/dist/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?= base_url() ?>assets/bower_components/font-awesome/css/font-awesome.min.css">
    <!-- DataTables -->
    <link rel="stylesheet" href="<?= base_url() ?>assets/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
    <!-- Ionicons -->
    <!-- <link rel="stylesheet" href="<?= base_url() ?>assets/bower_components/Ionicons/css/ionicons.min.css"> -->
    <!-- Theme style -->
    <link rel="stylesheet" href="<?= base_url() ?>assets/dist/css/AdminLTE.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="<?= base_url() ?>assets/dist/css/skins/_all-skins.min.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

    <!-- Google Font -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>

<body class="hold-transition skin-blue sidebar-mini">
    <!-- Site wrapper -->
    <div class="wrapper">

        <header class="main-header">
            <!-- Logo -->
            <a href="<?= base_url() ?>" class="logo">
                <!-- mini logo for sidebar mini 50x50 pixels -->
                <span class="logo-mini"><b>BGV</b></span>
                <!-- logo for regular state and mobile devices -->
                <span class="logo-lg"><b>BOUGENVILLE</b></span>
            </a>
            <!-- Header Navbar: style can be found in header.less -->
            <nav class="navbar navbar-static-top">
                <!-- Sidebar toggle button-->
                <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </a>

                <div class="navbar-custom-menu">
                    <ul class="nav navbar-nav">


                        <li class="dropdown tasks-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="fa fa-flag-o"></i>
                                <span class="label label-danger">9</span>
                            </a>
                            <ul class="dropdown-menu">
                                <li class="header">You have 9 tasks</li>
                                <li>
                                    <!-- inner menu: contains the actual data -->
                                    <ul class="menu">
                                        <li>
                                            <!-- Task item -->
                                            <a href="#">
                                                <h3>
                                                    Design some buttons
                                                    <small class="pull-right">20%</small>
                                                </h3>
                                                <div class="progress xs">
                                                    <div class="progress-bar progress-bar-aqua" style="width: 20%" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                                                        <span class="sr-only">20% Complete</span>
                                                    </div>
                                                </div>
                                            </a>
                                        </li>
                                        <!-- end task item -->
                                    </ul>
                                </li>
                                <li class="footer">
                                    <a href="#">View all tasks</a>
                                </li>
                            </ul>
                        </li>
                        <!-- User Account: style can be found in dropdown.less -->
                        <li class="dropdown user user-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <img src="<?= base_url() ?>assets/dist/img/admin.jpg" class="user-image" alt="User Image">
                                <span class="hidden-xs"><?= ucfirst($this->fungsi->user_login()->username) ?> </span>
                            </a>
                            <ul class="dropdown-menu">
                                <!-- User image -->
                                <li class="user-header">
                                    <img src="<?= base_url() ?>assets/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">

                                    <p>
                                        <?= $this->fungsi->user_login()->name ?>
                                        <!-- <small>Member since Nov. 2012</small> -->
                                    </p>
                                </li>

                                <li class="user-footer">
                                    <div class="pull-left">
                                        <a href="#" class="btn btn-default btn-flat">Profile</a>
                                    </div>
                                    <div class="pull-right">
                                        <a href="<?= site_url('auth/auth/logout') ?>" class="btn btn-default btn-flat">Sign out</a>
                                    </div>
                                </li>
                            </ul>
                        </li>
                        <!-- Control Sidebar Toggle Button -->
                        <!-- <li>
            <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
          </li> -->
                    </ul>
                </div>
            </nav>
        </header>

        <!-- =============================================== -->

        <!-- Left side column. contains the sidebar -->
        <aside class="main-sidebar">
            <!-- sidebar: style can be found in sidebar.less -->
            <section class="sidebar">
                <!-- Sidebar user panel -->
                <div class="user-panel">
                    <div class="pull-left image">
                        <img src="<?= base_url() ?>assets/dist/img/admin.jpg" class="img-circle" alt="User Image">
                    </div>
                    <div class="pull-left info">
                        <p><?= ucfirst($this->fungsi->user_login()->username) ?></p>
                        <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
                    </div>
                </div>
                <!-- sidebar menu: : style can be found in sidebar.less -->
                <ul class="sidebar-menu" data-widget="tree">
                    <li class="header">MAIN NAVIGATION</li>
                    <li <?= $this->uri->segment(1) == 'dashboard' || $this->uri->segment(1) == '' ? 'class="active"' : '' ?>>
                        <a href="<?= site_url('dashboard') ?>"><i class="fa fa-area-chart"></i>
                            <span>Dashboard</span>
                        </a>
                    </li>
                    <li class="header">ADMINISTRATOR</li>
                    <?php if ($this->fungsi->user_login()->level == 1) { ?>

                        <li <?= $this->uri->segment(1) == 'user' ? 'class="active"' : '' ?>>
                            <a href="<?= site_url('user/user') ?>"><i class="fa fa-users"></i>
                                <span>Data User</span>
                            </a>
                        </li>
                        <!-- <li <?= $this->uri->segment(1) == 'hospital' ? 'class="active"' : '' ?>>
                            <a href="<?= site_url('hospital/hospital') ?>"><i class="fa fa-hospital-o"></i>
                                <span>Data Hospital</span>
                            </a>
                        </li> -->
                        <li class="treeview  
                        <?= $this->uri->segment(1) == 'distributor' ||
                            $this->uri->segment(1) == 'principal' ||
                            $this->uri->segment(1) == 'pbf' ||
                            $this->uri->segment(1) == 'obat' ||
                            $this->uri->segment(1) == 'poliklinik' ||
                            $this->uri->segment(1) == 'barang' ||
                            $this->uri->segment(1) == 'pembayaran' ||
                            $this->uri->segment(1) == 'asuransi' ||
                            $this->uri->segment(1) == 'sarana' ||
                            $this->uri->segment(1) == 'sipa' ||
                            $this->uri->segment(1) == 'pasien' ||
                            $this->uri->segment(1) == 'tindakan' ? 'active' : '' ?>">
                            <a href="#">
                                <i class="fa fa-cube"></i> <span>Data Utama</span><span class="pull-right-container">
                                    <i class="fa fa-angle-left pull-right"></i></span>
                            </a>
                            <ul class="treeview-menu">
                                <li <?= $this->uri->segment(1) == 'asuransi' ? 'class="active"' : '' ?>><a href="<?= site_url('asuransi') ?>"><i class="fa fa-credit-card"></i>Data Asuransi</a></li>
                                <li <?= $this->uri->segment(1) == 'barang' ? 'class="active"' : '' ?>><a href="<?= site_url('barang') ?>"><i class="fa fa-circle-o"></i>Data Barang</a></li>
                                <li <?= $this->uri->segment(1) == 'obat' ? 'class="active"' : '' ?>><a href="<?= site_url('obat') ?>"><i class="fa fa-medkit"></i>Data Obat</a></li>
                                <li <?= $this->uri->segment(1) == 'poliklinik' ? 'class="active"' : '' ?>><a href="<?= site_url('poliklinik') ?>"><i class="fa fa-hospital-o"></i>Data Poliklinik</a></li>
                                <li <?= $this->uri->segment(1) == 'pembayaran' ? 'class="active"' : '' ?>><a href="<?= site_url('pembayaran') ?>"><i class="fa fa-cc-mastercard"></i>Data Pembayaran</a></li>
                                <li <?= $this->uri->segment(1) == 'pasien' ? 'class="active"' : '' ?>><a href="<?= site_url('pasien') ?>"><i class="fa fa-users"></i>Data Pasien</a></li>


                                <li <?= $this->uri->segment(1) == 'principal' ? 'class="active"' : '' ?>><a href="<?= site_url('principal') ?>"><i class="fa fa-sitemap"></i>Data Principal</a></li>
                                <li <?= $this->uri->segment(1) == 'distributor' ? 'class="active"' : '' ?>><a href="<?= site_url('distributor') ?>"><i class="fa fa-sitemap"></i>Data Distributor</a></li>
                                <li <?= $this->uri->segment(1) == 'sarana' ? 'class="active"' : '' ?>><a href="<?= site_url('sarana') ?>"><i class="fa fa-institution"></i>Data Sarana</a></li>
                                <li <?= $this->uri->segment(1) == 'sipa' ? 'class="active"' : '' ?>><a href="<?= site_url('sipa') ?>"><i class="fa fa-institution"></i>Data SIPA</a></li>


                                <li <?= $this->uri->segment(1) == 'pbf' ? 'class="active"' : '' ?>><a href="<?= site_url('pbf') ?>"><i class="fa fa-institution"></i>Data PBF</a></li>

                                <li <?= $this->uri->segment(1) == 'tindakan' ? 'class="active"' : '' ?>><a href="<?= site_url('tindakan') ?>"><i class="fa fa-stethoscope"></i>Data Tindakan</a></li>

                            </ul>
                        </li>

                        <li class="treeview  
                        <?=
                            $this->uri->segment(1) == 'pasien_masuk' ||
                                $this->uri->segment(1) == 'pasien_hari_ini' ? 'active' : '' ?>">
                            <a href="#">
                                <i class="fa  fa-newspaper-o"></i> <span>Pendaftaran</span><span class="pull-right-container">
                                    <i class="fa fa-angle-left pull-right"></i></span>
                            </a>
                            <ul class="treeview-menu">
                                <li <?= $this->uri->segment(1) == 'pasien_masuk' ? 'class="active"' : '' ?>><a href="<?= site_url('pasien_masuk') ?>"><i class="fa fa-pencil-square"></i>Pasien Masuk</a></li>
                            </ul>
                        </li>

                        <li class="treeview  
                        <?=
                            $this->uri->segment(1) == 'pasien_masuk_poli' ||
                                $this->uri->segment(1) == 'pasien_hari_ini' ? 'active' : '' ?>">
                            <a href="#">
                                <i class="fa  fa-stethoscope"></i> <span>Poli</span><span class="pull-right-container">
                                    <i class="fa fa-angle-left pull-right"></i></span>
                            </a>
                            <ul class="treeview-menu">
                                <li <?= $this->uri->segment(1) == 'pasien_masuk_poli' ? 'class="active"' : '' ?>><a href="<?= site_url('pasien_masuk_poli') ?>"><i class="fa fa-users"></i>Pasien Masuk Poli</a></li>
                            </ul>
                        </li>

                        <li class="treeview  
                        <?=
                            $this->uri->segment(1) == 'pasien_masuk_apotek' ||
                                $this->uri->segment(1) == 'pasien_hari_ini' ? 'active' : '' ?>">
                            <a href="#">
                                <i class="fa fa-hospital-o"></i> <span>Apotek</span><span class="pull-right-container">
                                    <i class="fa fa-angle-left pull-right"></i></span>
                            </a>
                            <ul class="treeview-menu">
                                <li <?= $this->uri->segment(1) == 'pasien_masuk_apotek' ? 'class="active"' : '' ?>><a href="<?= site_url('pasien_masuk_apotek') ?>"><i class="fa fa-users"></i>Pasien Masuk Apotek</a></li>
                            </ul>
                        </li>

                        <li class="treeview  
                        <?=
                            $this->uri->segment(1) == 'pasien_masuk_kasir' ||
                                $this->uri->segment(1) == 'pasien_hari_ini' ? 'active' : '' ?>">
                            <a href="#">
                                <i class="fa  fa-money"></i> <span>Kasir</span><span class="pull-right-container">
                                    <i class="fa fa-angle-left pull-right"></i></span>
                            </a>
                            <ul class="treeview-menu">
                                <li <?= $this->uri->segment(1) == 'pasien_masuk_kasir' ? 'class="active"' : '' ?>><a href="<?= site_url('pasien_masuk_kasir') ?>"><i class="fa fa-users"></i>Pasien Masuk Kasir</a></li>
                            </ul>
                        </li>

                        <li class="treeview  
                        <?=
                            $this->uri->segment(1) == 'rekap_pembayaran' ||
                                $this->uri->segment(1) == 'rekap_data_pasien' ? 'active' : '' ?>">
                            <a href="#">
                                <i class="fa fa-database"></i> <span>Rekap</span><span class="pull-right-container">
                                    <i class="fa fa-angle-left pull-right"></i></span>
                            </a>
                            <ul class="treeview-menu">
                                <li <?= $this->uri->segment(1) == 'rekap_pembayaran' ? 'class="active"' : '' ?>><a href="<?= site_url('rekap_pembayaran') ?>"><i class="fa fa-money"></i>Rekap Pembayaran</a></li>
                                <li <?= $this->uri->segment(1) == 'rekap_data_pasien' ? 'class="active"' : '' ?>><a href="<?= site_url('rekap_data_pasien') ?>"><i class="fa fa-users"></i>Rekap Data Pasien</a></li>
                            </ul>
                        </li>

                    <?php } ?>
                </ul>
            </section>
            <!-- /.sidebar -->
        </aside>

        <!-- =============================================== -->

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->

            <?php echo $contents  ?>
            <!-- Main content -->
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->

        <footer class="main-footer">
            <!-- <div class="pull-right hidden-xs">
      <b>Version</b> 2.4.0
    </div> -->
            <strong>Copyright &copy; 2019.</strong> All rights
            reserved.
        </footer>


        <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
        <!-- <div class="control-sidebar-bg"></div> -->
    </div>
    <!-- ./wrapper -->

    <!-- jQuery 3 -->
    <script src="<?= base_url() ?>assets/bower_components/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap 3.3.7 -->
    <script src="<?= base_url() ?>assets/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- SlimScroll -->
    <script src="<?= base_url() ?>assets/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>


    <!-- FastClick -->
    <!-- <script src="<?= base_url() ?>assets/bower_components/fastclick/lib/fastclick.js"></script> -->
    <!-- AdminLTE App -->
    <script src="<?= base_url() ?>assets/dist/js/adminlte.min.js"></script>
    <script src="<?= base_url() ?>assets/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="<?= base_url() ?>assets/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <!-- <script src="<?= base_url() ?>assets/dist/js/demo.js"></script>
    <script src="<?= base_url() ?>assets/browser_components/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="<?= base_url() ?>assets/browser_components/datatables.net-bs/js/jquery.dataTables.boostrap.js"></script> -->
    <script>
        $(document).ready(function() {

            $('#table2').DataTable({
                "footerCallback": function(row, data, start, end, display) {
                    var api = this.api(),
                        data;

                    // Remove the formatting to get integer data for summation
                    var intVal = function(i) {
                        return typeof i === 'string' ?
                            i.replace(/[\Rp. ]/g, '') * 1 :
                            typeof i === 'number' ?
                            i : 0;
                    };

                    // Total over all pages
                    total = api
                        .column(8)
                        .data()
                        .reduce(function(a, b) {
                            return intVal(a) + intVal(b);
                        }, 0);

                    // Total over this page
                    pageTotal = api
                        .column(8, {
                            page: 'current'
                        })
                        .data()
                        .reduce(function(a, b) {
                            return intVal(a) + intVal(b);
                        }, 0);

                    // Update footer
                    $(api.column(8).footer()).html(
                        // 'Rp. ' + pageTotal + ' ( Rp. ' + total + ' total)'
                        'Rp. ' + pageTotal
                    );
                }
            });

            $('#table1').DataTable()

            $('#id_poliklinik').change(function() {
                var id = $(this).val();
                $.ajax({
                    url: "<?php echo site_url('pasien_masuk/get_dokter_poli'); ?>",
                    method: "POST",
                    data: {
                        id: id
                    },
                    async: true,
                    dataType: 'json',
                    success: function(data) {

                        var html = '';
                        var i;
                        for (i = 0; i < data.length; i++) {
                            html += '<option value=' + data[i].id + '>' + data[i].name + '</option>';
                        }
                        $('#id_dokter').html(html);

                    }
                });
                return false;
            });

            var totaltindakan = $("#totaltindakan").val().replace(/,|Rp. |/g, '');
            var totalobat = $("#totalobat").val().replace(/,|Rp. |/g, '');
            var totalkes = parseInt(totaltindakan) + parseInt(totalobat);
            $("#totalkeseluruhan").val('Rp. ' + totalkes);
            $("#penambahanbiaya").change(function() {
                var totaltindakan = $("#totaltindakan").val().replace(/,|Rp. |/g, '');
                var totalobat = $("#totalobat").val().replace(/,|Rp. |/g, '');
                var penambahanbiaya = $("#penambahanbiaya").val().replace(/,|Rp. |/g, '');
                var penguranganbiaya = $("#penguranganbiaya").val().replace(/,|Rp. |/g, '');
                var total = parseInt(totaltindakan) +
                    parseInt(totalobat) +
                    parseInt(penambahanbiaya) -
                    parseInt(penguranganbiaya);
                $("#totalkeseluruhan").val('Rp. ' + total);
            });

            $("#penguranganbiaya").change(function() {
                var totaltindakan = $("#totaltindakan").val().replace(/,|Rp. |/g, '');
                var totalobat = $("#totalobat").val().replace(/,|Rp. |/g, '');
                var penambahanbiaya = $("#penambahanbiaya").val().replace(/,|Rp. |/g, '');
                var penguranganbiaya = $("#penguranganbiaya").val().replace(/,|Rp. |/g, '');
                var total = parseInt(totaltindakan) +
                    parseInt(totalobat) +
                    parseInt(penambahanbiaya) -
                    parseInt(penguranganbiaya);
                $("#totalkeseluruhan").val('Rp. ' + total);
            });

            $("#tunai").change(function() {
                var totaltindakan = $("#totaltindakan").val().replace(/,|Rp. |/g, '');
                var totalobat = $("#totalobat").val().replace(/,|Rp. |/g, '');
                var penambahanbiaya = $("#penambahanbiaya").val().replace(/,|Rp. |/g, '');
                var penguranganbiaya = $("#penguranganbiaya").val().replace(/,|Rp. |/g, '');
                var tunai = $("#tunai").val().replace(/,|Rp. |/g, '');
                var totall =
                    parseInt(totaltindakan) +
                    parseInt(totalobat) +
                    parseInt(penambahanbiaya) -
                    parseInt(penguranganbiaya);
                var kebalian = parseInt(tunai) - parseInt(totall);
                $("#totalkeseluruhan").val('Rp. ' + totall);
                $("#kembalian").val('Rp. ' + kebalian);
                // console.log(kebalian);
            });
        })
    </script>
</body>

</html>