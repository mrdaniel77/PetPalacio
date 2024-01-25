
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
               <h1 class="m-0">{{ isset($agendamento) ? 'Editar' : 'Novo' }} Agendamento </h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
               <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="/agendamento" class="harpia-text-color">Agendamento</a></li>
                  <li class="breadcrumb-item active">{{ isset($agendamento) ? 'Editar' : 'Novo' }}</li>
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
            @isset($agendamento)
            <div class="card-header">
               <a href="/Agendamento/novo" class="btn btn-primary">
                  Novo Agendamento
                  <i class="fas fa-plus"></i>
               </a>
               <!-- /.content-headlientes> -->
            </div>
            @endisset
            <div class="col card-body">              
               <form action="/agendamento/salvar" method="post" enctype="multipart/form-data">
                  @csrf
                  <input type="hidden" name="id" value="@if(isset($agendamento->id)){{$agendamento->id}}@else{{old('id')}}@endif">                  
                  <div class="row justify-content-center md-2">
                     <div class="col-sm-2 col-md-2 col-lg-2 col-xl-2">
                        <label class="form-label" for="cliente_id">Nome do cliente :</label>
                        <select name="cliente_id" class="form-control" required>
                           <option value="">Selecione</option>
                           @foreach ($clientes as $item)
                               <option value="{{$item->id}}">{{$item->nome}}</option>
                           @endforeach
                        </select>
                     </div>
                     <div class="col-sm-2 col-md-2 col-lg-2 col-xl-2">
                        <label class="form-label" for="pet_id">Nome do pet :</label>
                        <select name="pet_id" class="form-control" required>
                           <option value="">Selecione</option>
                           @foreach ($pets as $item)
                               <option value="{{$item->id}}">{{$item->nome}}</option>
                           @endforeach
                        </select>
                     </div>
                     <div class="col-sm-2 col-md-2 col-lg-2 col-xl-2">
                        <label for="servico_id">Serviço</label>
                        <select name="servico_id" class="form-control" required>
                           <option value="">Selecione</option>
                           <option value="2">Banho</option>
                           <option value="1">Tosa</option>
                           <option value="3">Banho & Tosa</option>
                        </select>
                     </div>                         
                  </div>
               
                  <br>
                  <div class="row justify-content-center mb-2">
                     <div class="col-2">
                        <label for="data_agendamento" class="form-label">Data </label>
                        <input type="date" name="data_agendamento" class="form-control">
                     </div>                  
                     <div class="col-2">
                        <label for="horario_agendamento" class="form-label">Horário</label>
                        <select name="horario_agendamento" class="form-control">
                           <option value="">Selecione</option>
                           @foreach ($horarios as $horario)
                              <option value="{{$horario}}" @if($horario == '08:00 ás 09:00') disabled style="color: red;" @endif>{{$horario}}</option>
                           @endforeach
                        </select>
                     </div>
                  </div>                  
                  <div class="row justify-content-center">
                     <div class="col-6">
                        <label class="form-label" for="observacao_agendamento">Observações:</label>
                        <textarea class="form-control" name="observacao_agendamento" rows="3">@if(isset($agendamento->observacao_agendamento)){{$agendamento->observacao_agendamento}}@else{{old('observacao_agendamento')}}@endif</textarea>
                     </div>
                  </div>                  
                  <hr>
                  <div class="row justify-content-between">
                     <div class="col-sm-3 col-md-3 col-lg-3 col-xl-3">
                        <a href="/agendamento" class="btn btn-danger w-100 hover-shadow">
                           @if(isset($agendamento))
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