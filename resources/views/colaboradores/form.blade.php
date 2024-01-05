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
               <h1 class="m-0">{{ isset($colaborador) ? 'Editar' : 'Novo' }} Colaborador </h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
               <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="/colaborador" class="harpia-text-color">Colaborador</a></li>
                  <li class="breadcrumb-item active">{{ isset($colaborador) ? 'Editar' : 'Novo' }}</li>
               </ol>
            </div><!-- /.col -->
         </div><!-- /.row -->
      </div><!-- /.container-fluid -->
   </div>
    
    <!-- /.content-header -->
   <div class="content">
      <div class="container-fluid">
         {{-- @if(isset($cliente))
            <div class="col-12">
               <div class="card card-primary card-outline">
                  <div class="card-body box-profile">
                     @if(!empty($cliente->foto))
                     <div class="text-center">
                        <img class="profile-user-img img-fluid img-circle" src="{{ $cliente->foto }}" alt="" style="max-height: 100px;">
                        <h5 class="text-secondary'">{{$cliente->nome}}</h5>
                     </div>
                     @endif
                  </div>
               </div>
            </div>
         @endif --}}
         <div class="card">
            @isset($colaborador)
            <div class="card-header">
               <a href="/colaborador/novo" class="btn btn-primary">
                  Novo Colaborador
                  <i class="fas fa-plus"></i>
               </a>
               <!-- /.content-headlientes> -->
            </div>
            @endisset
            <div class="col card-body">
               <form action="/colaborador/salvar" method="post" enctype="multipart/form-data">
                  @csrf
                  <input type="hidden" name="id" value="@if(isset($colaborador)){{$colaborador->id}}@else{{ old('id') }}@endif">
                  <div class="row">
                     <div class="col-sm-3 col-md-3 col-lg-3 col-xl-3">
                        <label class="form-label" for="nome">Nome:</label>
                        <input required type="text" placeholder="Informe seu nome" name="nome" id="nome" class="form-control" value="@if(isset($colaborador)) {{$colaborador->nome}} @else{{ old('nome') }} @endif" >
                     </div>
                     <div class="col-sm-3 col-md-3 col-lg-3 col-xl-3">
                        <label class="form-label" for="cpf">CPF:</label>
                        <input type="text" name="cpf" id="cpf" class="form-control" value="@if(isset($colaborador)) {{$colaborador->cpf}} @else{{ old('cpf') }} @endif" required>
                     </div>              
                     <div class="col-sm-3 col-md-3 col-lg-3 col-xl-3">
                        <label class="form-label" for="email">E-mail:</label>
                        <input type="email" name="email" id="email" class="form-control" value="@if(isset($colaborador)) {{$colaborador->email}} @else{{ old('email') }} @endif" required>
                     </div>                 
                     <div class="col-sm-3 col-md-3 col-lg-3 col-xl-3">
                        <label class="form-label" for="perfil">Perfil:</label>
                        <input type="text" name="perfil" id="perfil" class="form-control" value="@if(isset($colaborador)) {{$colaborador->perfil}} @else{{ old('perfil') }} @endif" required>
                     </div>
                     <div class="col-12">
                        <label class="form-label" for="observacao">Observações:</label>
                        <textarea class="form-control" name="observacao" id="observacao" rows="3">@if(isset($colaborador)){{$colaborador->observacao}}@else{{ old('observacao') }}@endif</textarea>
                     </div>
                  </div>
                  <hr>
                  <div class="row justify-content-between">
                     <div class="col-sm-3 col-md-3 col-lg-3 col-xl-3" >
                        <a href="/colaborador" class="btn btn-danger w-100 hover-shadow">
                           @if(isset($colaborador))
                           Sair
                           @else
                           Cancelar
                           <i class="fas fa-times"></i>
                           @endif
                        </a>
                     </div>                 
                     <div class="col-sm-3 col-md-3 col-lg-3 col-xl-3" >
                        <button type="submit" class="btn btn-success w-100 salvar">
                           Salvar 
                           <i class="fas fa-save"></i>
                        </button>
                     </div>
                  </div>
               </form>
            </div>   
         </div>
      </div><!-- /.container-fluid -->
   </div><!-- /.content -->
</div>
@include('layout.footer')
