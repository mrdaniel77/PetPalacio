@include('layout.header')
@include('layout.navbar')
@include('layout.sidebar')

<div class="content-wrapper">
   <div class="content-header">
      <div class="container-fluid">
         <div class="row mb-2">
            <div class="col-12 col-sm-12 col-md-6 col-lg-6">
               <h1 class="m-0">Colaboradores</h1>
            </div>
            <div class="col-12 col-sm-12 col-md-6 col-lg-6">
               <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item "><a href="/" class="harpia-text-color">Dashboard</a></li>
                  <li class="breadcrumb-item active">Colaboradores</li>
               </ol>
            </div>
         </div>
      </div>
   </div>
   <div class="content corpo">
      <div class="container-fluid">
         <div class="card">
            <div class="card-header">
               <div class="row align-items-center">
                  <div class="col-12 col-sm-12 col-md-6 col-lg-6">
                     <div class="row">                        
                        <a href="/colaborador/novo" class="m-1 btn btn-success">
                            Novo Colaborador 
                            <i class="fas fa-plus"></i>
                        </a>                                                
                     </div>
                  </div>
                  <div class="col-12 col-sm-12 col-md-6 col-lg-6 card-tools">
                     <form>
                        <div class="input-group input-group w-100 float-right">
                           <input type="text" name="pesquisa" class="form-control" placeholder="Pesquisar" >
                           <div class="input-group-append">
                              <button type="submit" class="btn btn-default">
                                 <i class="fas fa-search"></i>
                              </button>
                           </div>
                        </div>
                     </form>
                  </div>
               </div>
            </div>
            <div class="card-body table-responsive p-0">
               <table class="table table-hover text-nowrap table-bordered ">
                  <thead>
                     <tr>
                        <th class="col-4">Nome</th>
                        <th class="col-2">CPF</th>
                        <th class="col-2">E-mail</th>
                        <th class="col-5">Perfil</th>
                        <th class="col-1">Ações</th>
                     </tr>
                  </thead>
                  @foreach ($colaborador as $item)                      
                     <tbody>                     
                           <tr>
                              <td class="col-4"> {{$item->nome}} </td>
                              <td class="col-2"> {{$item->cpf}} </td>
                              <td class="col-2"> {{$item->email}} </td>                                                      
                              <td class="col-5"> {{$item->perfil}} </td>
                              <td class="col-2">                                 
                                 <a class="btn btn-xs mx-1 pt-1 btn-outline-success" onclick="visualizarColaborador('{{ $item->nome }}', '{{ $item->cpf }}',  '{{ $item->email }}', '{{ $item->perfil }}',)">                           
                                    <i class="fas fa-eye"></i>
                                 </a>                                 
                                 <a href="colaborador/editar/{{ $item->id }}" class="btn btn-xs mx-1 pt-1 btn-outline-warning" title="Edição">                              
                                    <i class="fas fa-pen"></i>
                                 </a>
                                 <a href="colaborador/deletar/{{ $item->id }}" class="btn btn-xs mx-1 pt-1 btn-outline-danger" title="Deletar">                              
                                    <i class="fas fa-trash"></i>
                                 </a>                                                
                              </td>
                           </tr>                    
                     </tbody>
                  @endforeach
               </table>       
            </div>
         </div>        
      </div>
   </div>
</div>

@include('colaboradores.visualizar')
@include('layout.footer')

<script>
   function visualizarColaborador( nome, cpf, email, perfil ) {
      // Atualiza o conteúdo do modal com os detalhes fornecidos
      $('#nome').text(nome);
      $('#cpf').text('CPF : ' + cpf);
      $('#email').text('E-mail : ' + email);
      $('#perfil').text('Perfil : ' + perfil);
      // Abre o modal
      $('#MyModal').modal('show');
   }
   function closeModal(){
      $('#MyModal').modal('hide');
   }
</script>