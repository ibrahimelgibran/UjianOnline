<body>
<?php if ($this->session->userdata('level')=='operator'){?>
    <nav class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0">
      <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="#">Smk Muhamadiyah Gamping</a>
     
      <ul class="navbar-nav px-3">
        <li class="nav-item text-nowrap">
          <a class="nav-link" href="<?php echo base_url()?>index.php/login/logout">Sign out</a>
        </li>
      </ul>
    </nav>

    <div class="container-fluid">
      <div class="row">
        <nav class="col-md-2 d-none d-md-block bg-light sidebar">
          <div class="sidebar-sticky">
            <ul class="nav flex-column">
              <li class="nav-item">
                <a class="nav-link active" href="<?php echo base_url()?>index.php/dashboard">
                  <span data-feather="home"></span>
                  Dashboard <span class="sr-only">(current)</span>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="<?php echo base_url()?>pendaftaran">
                  <span data-feather="file"></span>
                  Pendaftaran
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="<?php echo base_url()?>index.php/pendaftaran/transfer">
                  <span data-feather="shopping-cart"></span>
                  Bukti Transfer
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="<?php echo base_url()?>index.php/nilai">
                  <span data-feather="shopping-cart"></span>
                  Nilai UN
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="<?php echo base_url()?>nilaiujian">
                  <span data-feather="shopping-cart"></span>
                  Nilai Ujian
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="<?php echo base_url()?>index.php/daftarujian">
                  <span data-feather="shopping-cart"></span>
                  Set Token
                </a>
              <li class="nav-item">
                <a class="nav-link" href="<?php echo base_url()?>index.php/kelulusan">
                  <span data-feather="users"></span>
                  Kelulusan
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="<?php echo base_url()?>index.php/reports">
                  <span data-feather="bar-chart-2"></span>
                  Reports
                </a>
              </li>
             
            </ul>
          </div>
        </nav>
<?php } ?>

<?php if ($this->session->userdata('level')=='kepsek'){?>
    <nav class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0">
      <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="#">Smk Muhamadiyah Gamping</a>
      <input class="form-control form-control-dark w-100" type="text" placeholder="Search" aria-label="Search">
      <ul class="navbar-nav px-3">
        <li class="nav-item text-nowrap">
        <a class="nav-link" href="<?php echo base_url()?>index.php/login/logout">Sign out</a>
        </li>
      </ul>
    </nav>

    <div class="container-fluid">
      <div class="row">
        <nav class="col-md-2 d-none d-md-block bg-light sidebar">
          <div class="sidebar-sticky">
            <ul class="nav flex-column">
              <li class="nav-item">
                <a class="nav-link active" href="<?php echo base_url()?>index.php/dashboard">
                  <span data-feather="home"></span>
                  Dashboard <span class="sr-only">(current)</span>
                </a>
              <li class="nav-item">
                <a class="nav-link" href="<?php echo base_url()?>index.php/reports">
                  <span data-feather="bar-chart-2"></span>
                  Reports
                </a>
              </li>
             
            </ul>
          </div>
        </nav>
<?php } ?>

<?php if ($this->session->userdata('level')=='calonsiswa'){?>
    <nav class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0">
      <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="#">Smk Muhamadiyah Gamping</a>
      <input class="form-control form-control-dark w-100" type="text" placeholder="Search" aria-label="Search">
      <ul class="navbar-nav px-3">
        <li class="nav-item text-nowrap">
        <a class="nav-link" href="<?php echo base_url()?>index.php/login/logout">Sign out</a>
        </li>
      </ul>
    </nav>

    <div class="container-fluid">
      <div class="row">
        <nav class="col-md-2 d-none d-md-block bg-light sidebar">
          <div class="sidebar-sticky">
            <ul class="nav flex-column">
              <li class="nav-item">
                <a class="nav-link active" href="<?php echo base_url()?>index.php/dashboard">
                  <span data-feather="home"></span>
                  Dashboard <span class="sr-only">(current)</span>
                </a>
                <li class="nav-item">
                <a class="nav-link" href="<?php echo base_url()?>index.php/pendaftaran1">
                  <span data-feather="file"></span>
                  Pendaftaran
                </a>
                <li class="nav-item">
                <a class="nav-link" href="<?php echo base_url()?>index.php/nilai">
                  <span data-feather="shopping-cart"></span>
                  Nilai UN
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="<?php echo base_url()?>index.php/ujian/index1">
                  <span data-feather="bar-chart-2"></span>
                  Ujian 
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="<?php echo base_url()?>index.php/token">
                  <span data-feather="bar-chart-2"></span>
                  Token 
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="<?php echo base_url()?>index.php/kelulusan">
                  <span data-feather="users"></span>
                  Kelulusan
                </a>
              </li>
            </ul>
          </div>
        </nav>
<?php } ?>
