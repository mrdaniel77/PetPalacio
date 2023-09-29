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
               <h1 class="m-0">{{ isset($pet) ? 'Editar' : 'Novo' }} Pet </h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
               <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="/pet" class="harpia-text-color">Pet</a></li>
                  <li class="breadcrumb-item active">{{ isset($pet) ? 'Editar' : 'Novo' }}</li>
               </ol>
            </div><!-- /.col -->
         </div><!-- /.row -->
      </div><!-- /.container-fluid -->
   </div>
    
    <!-- /.content-header -->

   <div class="content">
      <div class="container-fluid">
         {{-- @if(isset($pet))
            <div class="col-12">
               <div class="card card-primary card-outline">
                  <div class="card-body box-profile">
                     @if(!empty($pet->foto))
                     <div class="text-center">
                        <img class="profile-user-img img-fluid img-circle" src="{{ $pet->foto }}" alt="" style="max-height: 100px;">
                        <h5 class="text-secondary'">{{$pet->nome}}</h5>
                     </div>
                     @endif
                  </div>
               </div>
            </div>
         @endif --}}
         <div class="card">
            @isset($pet)
            <div class="card-header">
               <a href="/pet/novo" class="btn btn-success">  
                  Novo Pet
                  <i class="fas fa-plus"></i>
               </a>
               <!-- /.content-headlientes> -->
            </div>
            @endisset
            <div class="col card-body">
               <form action="/pet/salvar" method="post" enctype="multipart/form-data">
                  @csrf
                  <input type="hidden" name="id" value="@if(isset($pet)){{$pet->id}}@else{{ old('id') }}@endif">
                  <div class="row">
                     <div class="col-3">
                        <div class="form-group">
                           <label class="form-label" for="nome">Nome do pet:</label>
                           <input type="text" name="nome" id="nome" class="form-control" value="@if(isset($pet)) {{$pet->nome}} @else{{ old('nome') }} @endif">
                        </div>
                     </div>
                     <div class="col-3">
                        <div class="form-group">
                           <label class="form-label" for="raca">Raça do pet:</label>
                           <input type="text" name="raca" id="raca" class="form-control" value="@if(isset($pet)) {{$pet->raca}} @else{{ old('raca') }} @endif">
                        </div>
                     </div>
                     <div class="col-3">
                        <div class="form-group">
                           <label class="form-label" for="peso">Peso (kg):</label>
                           <input type="text" name="peso" id="peso" class="form-control" value="@if(isset($pet)) {{$pet->peso}} @else{{ old('peso') }} @endif">
                        </div>
                     </div>
                     <div class="col-3">
                        <div class="form-group">
                           <label class="form-label" for="dono">Dono do pet:</label>
                           <select name="cliente_id" id="cliente_id" class="form-control">
                              <option value="">Selecione</option>
                              @foreach ($dono as $d)
                                 <option value="{{$d->id}}" @if(isset($pet) && $pet->cliente->id == $d->id) selected @endif>{{$d->nome}}</option>
                             @endforeach
                           </select>
                        </div>
                     </div>
                     <div class="col-12">
                        <div class="form-group">
                           <label class="form-label" for="observacao">Observações:</label>
                           <textarea class="form-control" name="observacao" id="observacao" rows="3" >@if(isset($pet)){{$pet->observacao}}@else{{ old('observacao') }}@endif</textarea>
                        </div>
                     </div>
                  </div>
                  <hr>
                  <div class="row">
                     <div class="col" align="start">
                        <a href="/pet" class="btn btn-danger w-25 hover-shadow">
                           @if(isset($pet))
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
@include('layout.footer');
