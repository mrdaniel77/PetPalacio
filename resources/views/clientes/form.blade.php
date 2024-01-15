
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
               <h1 class="m-0">{{ isset($cliente) ? 'Editar' : 'Novo' }} Cliente </h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
               <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="/cliente" class="harpia-text-color">Cliente</a></li>
                  <li class="breadcrumb-item active">{{ isset($cliente) ? 'Editar' : 'Novo' }}</li>
               </ol>
            </div><!-- /.col -->
         </div><!-- /.row -->
      </div><!-- /.container-fluid -->
   </div>
   @if($errors->any())
      <div class="alert alert-danger" role="alert">                    
         @foreach($errors->all() as $error)
            {{ $error }}<br/>
         @endforeach
      </div>
   @endif
    <!-- /.content-header -->

   <div class="content">
      <div class="container-fluid">         
         <div class="card">
            @isset($cliente)
            <div class="card-header">
               <a href="/cliente/novo" class="btn btn-primary">
                  Novo Cliente
                  <i class="fas fa-plus"></i>
               </a>
               <!-- /.content-headlientes> -->
            </div>
            @endisset
            <div class="col card-body">
               @if(isset($cliente) && !empty($cliente->foto))
                  <!-- Exibição da imagem do cliente -->
                  <div class="col-12">
                     <div class="card card-primary card-outline">
                        <div class="card-body box-profile">                           
                           <div class="text-center">
                              <img class="profile-user-img img-fluid img-circle" id="preview" src="{{ asset('storage/' . $cliente->foto) }}" alt="Foto do cliente" style="max-width: 200px; display: {{ !empty($cliente->foto) ? 'block' : 'none' }};">                                
                              <h5 class="text-secondary">{{ $cliente->nome }}</h5>
                           </div>                           
                        </div>
                     </div>
                  </div>
               @else
                  <div class="col-12">
                     <div class="card card-primary card-outline">
                        <div class="card-body box-profile">                           
                              <div class="text-center">
                                 <img class="profile-user-img img-fluid img-circle" id="preview" src="{{ isset($cliente) ? asset('storage/' . $cliente->foto) : '' }}" alt="Foto do cliente" style="max-width: 200px; display: {{ !empty($cliente->foto) ? 'block' : 'none' }};">                                
                              </div>                           
                        </div>
                     </div>
                  </div>          
               @endif
               <form action="/cliente/salvar" method="post" enctype="multipart/form-data">
                  @csrf
                  <input type="hidden" name="id" value="@if(isset($cliente)){{$cliente->id}}@else{{old('id')}}@endif">
                  <div class="row">
                     <div class="col-2">
                        <!-- Input para escolher a imagem -->
                        <label for="foto_temp">Escolha uma imagem:</label>
                        <input type="file" name="foto_temp" id="foto_temp" onchange="exibirPreview(this);">
                     </div>                     
                  </div>
                  <div class="row">
                     <div class="col-sm-3 col-md-3 col-lg-3 col-xl-3">
                        <label class="form-label" for="nome">Nome:</label>
                        <input type="text" name="nome" id="nome" class="form-control" value="@if(isset($cliente)){{$cliente->nome}}@else{{old('nome')}}@endif" required>
                     </div>
                     <div class="col-sm-3 col-md-3 col-lg-3 col-xl-3">
                        <label class="form-label" for="cpf">CPF:</label>
                        <input type="text" name="cpf" id="cpf" class="form-control" value="@if(isset($cliente)) {{$cliente->cpf}}@else{{old('cpf')}}@endif" required>
                     </div>                     
                     <div class="col-sm-3 col-md-3 col-lg-3 col-xl-3">
                        <label class="form-label" for="telefone">Telefone:</label>
                        <input type="text" name="telefone" id="telefone" class="form-control" value="@if(isset($cliente)){{$cliente->telefone}} @else{{old('telefone')}}@endif" required>
                     </div>
                     <div class="col-sm-3 col-md-3 col-lg-3 col-xl-3">
                        <label class="form-label" for="email">E-mail:</label>
                        <input type="email" name="email" id="email" class="form-control" value="@if(isset($cliente)){{$cliente->email}}@else{{old('email')}}@endif" required>
                     </div>                 
                  </div>
                  <div class="row">
                     <div class="col-12">
                        <label class="form-label" for="observacao">Observações:</label>
                        <textarea class="form-control" name="observacao" id="observacao" rows="3">@if(isset($cliente)){{$cliente->observacao}}@else{{old('observacao')}}@endif</textarea>
                     </div>
                  </div>
                  <a href="" class="btn btn-app">play</a>
                  <hr>
                  <div class="row justify-content-between">
                     <div class="col-sm-3 col-md-3 col-lg-3 col-xl-3">
                        <a href="/cliente" class="btn btn-danger w-100 hover-shadow">
                           @if(isset($cliente))
                           Sair
                           @else
                           Cancelar
                           <i class="fas fa-times"></i>
                           @endif
                        </a>
                     </div>                     
                     <div class="col-sm-3 col-md-3 col-lg-3 col-xl-3">
                        <button type="submit" class="btn btn-success w-100 salvar disabled">
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

<!-- Script para exibir a prévia da imagem -->
<script>
   function exibirPreview(input) {
       var preview = document.getElementById('preview');
       
       if (input.files && input.files[0]) {
           var leitor = new FileReader();

           leitor.onload = function (e) {
               preview.src = e.target.result;
               preview.style.display = 'block';
           };

           leitor.readAsDataURL(input.files[0]);
       } else {
           preview.style.display = 'none';
       }
   }
</script>