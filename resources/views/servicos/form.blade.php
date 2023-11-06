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
               <h1 class="m-0">{{ isset($servico) ? 'Editar' : 'Novo' }} Serviço </h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
               <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="/servico" class="harpia-text-color">Serviço</a></li>
                  <li class="breadcrumb-item active">{{ isset($servico) ? 'Editar' : 'Novo' }}</li>
               </ol>
            </div><!-- /.col -->
         </div><!-- /.row -->
      </div><!-- /.container-fluid -->
   </div>
    <!-- /.content-header -->
   <div class="content">
      <div class="container-fluid">         
         <div class="card">
            @isset($servico)
            <div class="card-header">
               <a href="/servico/novo" class="btn btn-success">
                  Novo Serviço
                  <i class="fas fa-plus"></i>
               </a>
               <!-- /.content-headlientes> -->
            </div>
            @endisset
            <div class="col card-body">
               <form action="/servico/salvar" method="post" enctype="multipart/form-data">
                  @csrf
                  <input type="hidden" name="id" value="@if(isset($servico)){{$servico->id}}@else{{ old('id') }}@endif">
                  <div class="row">
                     <div class="col-sm-4 col-md-4 col-lg-4 col-xl-4">
                        <label class="form-label" for="nome">Nome:</label>
                        <input type="text" name="nome" id="nome" class="form-control" value="@if(isset($servico)) {{$servico->nome}} @else{{ old('nome') }} @endif" required>
                     </div>
                     <div class="col-sm-2 col-md-2 col-lg-2 col-xl-2">
                        <label class="form-label" for="preco">Preço:</label>
                        <input type="text" name="preco" id="preco" class="form-control" value="@if(isset($servico)) {{$servico->preco}} @else{{ old('preco') }} @endif" required>
                     </div>                                  
                     <div class="col-12">
                        <label class="form-label" for="descricao">Descrição do serviço:</label>
                        <textarea class="form-control" name="descricao" id="descricao" rows="3" required>@if(isset($servico)){{$servico->descricao}}@else{{ old('descricao') }}@endif</textarea>
                     </div>
                  </div>
                  <div class="row">
                     <div class="col-12">
                        <label class="form-label" for="observacao">Observações:</label>
                        <textarea class="form-control" name="observacao" id="observacao" rows="3">@if(isset($servico)){{$servico->observacao}}@else{{ old('observacao') }}@endif</textarea>
                     </div>
                  </div>
                  <hr>
                  <div class="row">
                     <div class="col-sm-3 col-md-3 col-lg-3 col-xl-3" align="start">
                        <a href="/servico" class="btn btn-danger w-100 hover-shadow">
                           @if(isset($servico))
                           Sair
                           @else
                           Cancelar
                           <i class="fas fa-times"></i>
                           @endif
                        </a>
                     </div>                     
                     <div class="col-sm-3 col-md-3 col-lg-3 col-xl-3" align="right">
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
