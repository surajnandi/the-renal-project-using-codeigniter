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
            <li class="breadcrumb-item"><a href="<?= base_url('doctor/dashboard') ?>">Home</a></li>
            <li class="breadcrumb-item active">Dashboard</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->

  <!-- Main content -->


  <section class="content">
    <div class="row">
      <div class="col-lg-12 col-md-12 col-sm-12">

        <!-- <h3 style="text-align: center; padding-top: 20px; padding-bottom: 50px;">Welcome To Doctor Dashboard</h3> -->
      </div>
    </div>
    <div class="container-fluid">


      <!-- <div class="row">
        <div class="col-lg-4 col-6">
          
          <div class="small-box bg-info">
            <div class="inner">
              <h3>150</h3>

              <p>Students</p>
            </div>
            <div class="icon">
              <i class="ion ion-android-person"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        
        <div class="col-lg-4 col-6">
          
          <div class="small-box bg-success">
            <div class="inner">
              <h3>53<sup style="font-size: 20px"></sup></h3>

              <p>Teachers</p>
            </div>
            <div class="icon">
              <i class="ion ion-android-contacts"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        
        <div class="col-lg-4 col-6">
          
          <div class="small-box bg-warning">
            <div class="inner">
              <h3>5</h3>

              <p>Subject</p>
            </div>
            <div class="icon">
              <i class="ion ion-android-list"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <div class="col-lg-4 col-6">
          
          <div class="small-box bg-secondary">
            <div class="inner">
              <h3>10</h3>

              <p>Classs</p>
            </div>
            <div class="icon">
              <i class="ion ion-compose"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <div class="col-lg-4 col-6">
          
          <div class="small-box bg-primary">
            <div class="inner">
              <h3>44</h3>

              <p>Questions</p>
            </div>
            <div class="icon">
              <i class="ion ion-android-document"></i>
            </div>
            <a href="<?= base_url('academy/question') ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        
        <div class="col-lg-4 col-6">
          
          <div class="small-box bg-danger">
            <div class="inner">
              <h3>1</h3>

              <p>Academy Profile</p>
            </div>
            <div class="icon">
              <i class="ion ion-gear-b"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        
      </div> -->



      <!-- <div class="card card-success">
        <div class="card-header">
          <h3 class="card-title">Doctor's Graph</h3>

          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse">
              <i class="fas fa-minus"></i>
            </button>
            <button type="button" class="btn btn-tool" data-card-widget="remove">
              <i class="fas fa-times"></i>
            </button>
          </div>
        </div>
        <div class="card-body">
          <div class="chart">
            <div class="chartjs-size-monitor">
              <div class="chartjs-size-monitor-expand">
                <div class=""></div>
              </div>
              <div class="chartjs-size-monitor-shrink">
                <div class=""></div>
              </div>
            </div>
            <canvas id="barChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%; display: block; width: 487px;" width="487" height="250" class="chartjs-render-monitor"></canvas>
          </div>
        </div>
        
      </div> -->

      <div id="container"></div>
      <canvas id="myChart"></canvas>


    </div>
  </section>

</div>