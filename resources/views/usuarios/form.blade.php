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
               <h1 class="m-0">{{ isset($usuario) ? 'Editar' : 'Novo' }} Usuário </h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
               <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="/usuario" class="harpia-text-color">Usuário</a></li>
                  <li class="breadcrumb-item active">{{ isset($usuario) ? 'Editar' : 'Novo' }}</li>
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
                  <input type="hidden" name="id" value="@if(isset($usuario)){{$usuario->id}}@else{{ old('id') }}@endif">
                  <div class="row">
                     <div class="col-3">
                        <div class="form-group">
                           <label class="form-label" for="nome">Nome:</label>
                           <input type="text" name="name" id="name" class="form-control" value="@if(isset($usuario)) {{$usuario->name}} @else{{ old('nome') }} @endif">
                        </div>
                     </div>
                  </div>
                  <div class="row">   
                     <div class="col-3">
                        <div class="form-group">
                           <label class="form-label" for="email">E-mail:</label>
                           <input type="email" name="email" id="email" class="form-control" value="@if(isset($usuario)) {{$usuario->email}} @else{{ old('email') }} @endif" required>
                        </div>
                     </div>                 
                  </div>
                  <div class="row">                
                     <div class="col-3">
                        <div class="form-group">
                           <label class="form-label" for="senha">Senha:</label>
                           <input type="password" name="password" id="senha" class="form-control" required>
                        </div>
                     </div>                     
                  </div>
                  <hr>
                  <div class="row">
                     <div class="col" align="start">
                        <a href="/usuario" class="btn btn-danger w-25 hover-shadow">
                           @if(isset($usuario))
                           Sair
                           @else
                           Cancelar
                           <i class="fas fa-times"></i>
                           @endif
                        </a>
                     </div>                     
                     <div class="col" align="right">
                        <button type="submit" class="btn btn-success w-25 salvar">
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
