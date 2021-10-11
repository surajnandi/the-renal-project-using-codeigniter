<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col col-sm-6">
          <h1 class="m-0 text-dark">Dashboard</h1>
        </div><!-- /.col -->
        <div class="col col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="<?= base_url('admin/dashboard') ?>">Home</a></li>
            <li class="breadcrumb-item active">Dashboard</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->

  <!-- Main content -->

  <!--  -->
  <section class="content">
    <div class="row">
      <div class="col-lg-12 col-md-12 col-sm-12">

        <h3 style="text-align: center; padding-top: 10px; padding-bottom: 20px;">Welcome To Admin Dashboard</h3>
      </div>
    </div>
    <div class="container-fluid">
      <!-- Small boxes (Stat box) -->
      <div class="row">

        <div class="col-lg-4 col-6">
          <div class="small-box bg-info">
            <div class="inner">
              <?php
              $totalRows = $this->db
                ->where('active_flag', 'Y')
                ->where('del_flag', 'N')
                ->count_all_results("branch");
              ?>
              <h3><?= $totalRows ?></h3>
              <p>Total Branch</p>
            </div>
            <div class="icon">
              <i class="ion ion-home"></i>
            </div>
            <a href="<?= base_url('admin/branch') ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>

        <div class="col-lg-4 col-6">
          <div class="small-box bg-success">
            <div class="inner">
              <?php
              $totalRows = $this->db
                ->where('active_flag', 'Y')
                ->where('del_flag', 'N')
                ->count_all_results("staff");
              ?>
              <h3><?= $totalRows ?></h3>
              <p>Total Staff</p>
            </div>
            <div class="icon">
              <i class="ion ion-stats-bars"></i>
            </div>
            <a href="<?= base_url('admin/staff') ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>

        <div class="col-lg-4 col-6">
          <div class="small-box bg-warning">
            <div class="inner">
              <?php
              $totalRows = $this->db
                ->where('active_flag', 'Y')
                ->where('del_flag', 'N')
                ->count_all_results("doctor");
              ?>
              <h3><?= $totalRows ?></h3>
              <p>Total Doctor</p>
            </div>
            <div class="icon">
              <i class="ion ion-person-add"></i>
            </div>
            <a href="<?= base_url('admin/doctor') ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>


      </div>
    </div><!-- /.container-fluid -->
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper