@include('layout.header')
@include('layout.navbar')
@include('layout.sidebar')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0"></h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- /.row -->
        <div class="row">          
          <div class="col-12 col-sm-6 col-md-3">
            <div class="card">
              <div class="card-body">
                <div class="info-box mb-3">
                  <span class="info-box-icon bg-yellow elevation-1"><i class="fas fa-users"></i></span>
                  <div class="info-box-content">                                 
                    <div class="inner" >
                      <h4 class="info-box-text" style="color: #000">Clientes</h4>
                    </div>
                  </div>
                </div>
                <a href="/cliente/" class="btn btn-info w-100" >Visualizar</a>
              </div>
            </div>
          </div>
          <div class="col-12 col-sm-6 col-md-3">
            <div class="card">
              <div class="card-body">
                <div class="info-box mb-3">
                  <span class="info-box-icon bg-red elevation-1"><i class="fas fa-users"></i></span>
                  <div class="info-box-content">                                 
                    <div class="inner" >
                      <h4 class="info-box-text" style="color: #000">Pets</h4>
                    </div>
                  </div>
                </div>
                <a href="/pet/" class="btn btn-info w-100" >Visualizar</a>
              </div>
            </div>
          </div>
          <div class="col-12 col-sm-6 col-md-3">
            <div class="card">
              <div class="card-body">
                <div class="info-box mb-3">
                  <span class="info-box-icon bg-black elevation-1"><i class="fas fa-users"></i></span>
                  <div class="info-box-content">                                 
                    <div class="inner" >
                      <h4 class="info-box-text" style="color: #000">Serviços</h4>
                    </div>
                  </div>
                </div>
                <a href="/servico/" class="btn btn-info w-100" >Visualizar</a>
              </div>
            </div>
          </div>
          <div class="col-12 col-sm-6 col-md-3">
            <div class="card">
              <div class="card-body">
                <div class="info-box mb-3">
                  <span class="info-box-icon bg-gray elevation-1"><i class="fas fa-users"></i></span>
                  <div class="info-box-content">                                 
                    <div class="inner" >
                      <h4 class="info-box-text" style="color: #000">Colaboradores</h4>
                    </div>
                  </div>
                </div>
                <a href="/colaborador/" class="btn btn-info w-100" >Visualizar</a>
              </div>
            </div>
          </div>
        </div>

        <!-- GRÁFICOS -->        
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h5 class="card-title">Gráfico de vendas</h5>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                  <div class="btn-group">
                    <button type="button" class="btn btn-tool dropdown-toggle" data-toggle="dropdown">
                      <i class="fas fa-wrench"></i>
                    </button>
                    <div class="dropdown-menu dropdown-menu-right" role="menu">
                      <a href="#" class="dropdown-item">Action</a>
                      <a href="#" class="dropdown-item">Another action</a>
                      <a href="#" class="dropdown-item">Something else here</a>
                      <a class="dropdown-divider"></a>
                      <a href="#" class="dropdown-item">Separated link</a>
                    </div>
                  </div>
                  <button type="button" class="btn btn-tool" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                  </button>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <div class="row">
                  <div class="col-md-8">
                    <p class="text-center">
                      <strong>Periodo: 1 Jan, 2023 - 13 Nov, 2023</strong>
                    </p>

                    <div class="chart">
                      <!-- Sales Chart Canvas -->
                      <canvas id="salesChart" height="180" style="height: 180px;"></canvas>
                    </div>
                    <!-- /.chart-responsive -->
                  </div>
                  <!-- /.col -->
                  <div class="col-md-4">
                    <p class="text-center">
                      <strong>Relatório completo</strong>
                    </p>

                    <div class="progress-group">
                      Banho e tosa
                      <span class="float-right"><b>160</b>/200</span>
                      <div class="progress progress-sm">
                        <div class="progress-bar bg-primary" style="width: 80%"></div>
                      </div>
                    </div>
                    <!-- /.progress-group -->

                    <div class="progress-group">
                      Apenas banho
                      <span class="float-right"><b>170</b>/200</span>
                      <div class="progress progress-sm">
                        <div class="progress-bar bg-danger" style="width: 75%"></div>
                      </div>
                    </div>                    
                    <!-- /.progress-group -->
                    <div class="progress-group">
                      <span class="progress-text">Apenas tosa</span>
                      <span class="float-right"><b>100</b>/200</span>
                      <div class="progress progress-sm">
                        <div class="progress-bar bg-success" style="width: 50%"></div>
                      </div>
                    </div>              
                  </div>
                  <!-- /.col -->
                </div>
                <!-- /.row -->
              </div>
              <!-- ./card-body -->
             
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
        
      </div><!--/. container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  
  
  @include('layout.footer')
