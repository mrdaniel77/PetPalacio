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
               <h1 class="m-0">{{ isset($user) ? 'Editar' : 'Novo' }} Usuário </h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
               <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="/usuario" class="harpia-text-color">Usuário</a></li>
                  <li class="breadcrumb-item active">{{ isset($user) ? 'Editar' : 'Novo' }}</li>
               </ol>
            </div><!-- /.col -->
         </div><!-- /.row -->
      </div><!-- /.container-fluid -->
   </div>
    
    <!-- /.content-header -->

   <div class="content">
      <div class="container-fluid">
         <div class="card">
            @isset($usuario)
            <div class="card-header">
               <a href="/usuario/novo" class="btn harpia-harpia-color harpia-text-light">
                  Novo Usuário
                  <i class="fas fa-plus"></i>
               </a>
               <!-- /.content-usuario> -->
            </div>
            @endisset
            <div class="col card-body">
               <form action="/usuario/salvar" method="post" enctype="multipart/form-data">
                  @csrf
                  <input type="hidden" name="id" value="@if(isset($user)){{$user->id}}@else{{ old('id') }}@endif">
                  <div class="row justify-content-md-center">
                     <div class="col-sm-3 col-md-3 col-lg-3 col-xl-3">
                        <label class="form-label" for="nome">Nome:</label>
                        <input type="text" name="name" id="name" class="form-control" value="@if(isset($user)) {{$user->name}} @else{{ old('nome') }} @endif">
                     </div>
                  </div>
                  <div class="row justify-content-md-center">   
                     <div class="col-sm-3 col-md-3 col-lg-3 col-xl-3">
                        <label class="form-label" for="email">E-mail:</label>
                        <input type="email" name="email" id="email" class="form-control" value="@if(isset($user)) {{$user->email}} @else{{ old('email') }} @endif" required>
                     </div>                 
                  </div>
                  <div class="row justify-content-md-center">                
                     <div class="col-sm-3 col-md-3 col-lg-3 col-xl-3">
                        <label class="form-label" for="senha">Senha:</label>
                        <input type="password" name="password" id="senha" class="form-control"  required>
                     </div>                     
                  </div>
                  <hr>
                  <div class="row justify-content-between">
                     <div class="col-sm-3 col-md-3 col-lg-3 col-xl-3">
                        <a href="/usuario" class="btn btn-danger w-100 hover-shadow">
                           @if(isset($user))
                           Sair
                           @else
                           Cancelar
                           <i class="fas fa-times"></i>
                           @endif
                        </a>
                     </div>                     
                     <div class="col-sm-3 col-md-3 col-lg-3 col-xl-3">
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
