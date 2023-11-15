@include('layout.header')
@include('layout.navbar')
@include('layout.sidebar')

<div class="content-wrapper">
   <div class="content-header">
      <div class="container-fluid">
         <div class="row mb-2">
            <div class="col-12 col-sm-12 col-md-6 col-lg-6">
               <h1 class="m-0">Clientes</h1>
            </div>
            <div class="col-12 col-sm-12 col-md-6 col-lg-6">
               <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item "><a href="/" class="harpia-text-color">Dashboard</a></li>
                  <li class="breadcrumb-item active">Clientes</li>
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
                        <a href="/cliente/novo" class="m-1 btn btn-success">
                            Novo Cliente 
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
                        <th class="col-3">Telefone</th>
                        <th class="col-2">E-mail</th>
                        <th class="col-1">Ações</th>
                     </tr>
                  </thead>
                  @foreach ($cliente as $item)                      
                     <tbody>                     
                           <tr>
                              <td class="col-4"> {{$item->nome}} </td>
                              <td class="col-2"> {{$item->cpf}} </td>
                              <td class="col-3"> {{$item->telefone}} </td>
                              <td class="col-2"> {{$item->email}} </td>                                                      
                              <td class="col-1">                                 
                                 <a class="btn btn-xs mx-1 pt-1 btn-outline-success" onclick="visualizarCliente('{{ $item->nome }}', '{{ $item->cpf }}', '{{ $item->telefone }}', '{{ $item->email }}')">                           
                                    <i class="fas fa-eye"></i>
                                 </a>
                                 {{-- MODAL --}}
                                 <div class="modal fade" id="MyModal"  tabindex="-1" role="dialog" aria-labelledby="MyModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                       <div class="modal-header">
                                          <h5 class="modal-title" id="MyModalLabelName"></h5>
                                          
                                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                          <span aria-hidden="true">&times;</span>
                                          </button>
                                       </div>
                                       <div class="modal-body">   
                                          <p id="cpf" ></p><br>
                                          <p id="telefone" ></p><br>
                                          <p id="email"></p>
                                       </div>
                                       <div class="modal-footer">
                                          <button type="button" id="close" onclick="closeModal()" class="btn btn-primary" data-dismiss="modal">Fechar</button>
                                       </div>
                                    </div>
                                    </div>
                                 </div>
                                 {{-- END MODAL --}}    
                                 <a href="/cliente/editar/{{ $item->id }}" class="btn btn-xs mx-1 pt-1 btn-outline-warning" title="Edição">                              
                                    <i class="fas fa-pen"></i>
                                 </a>
                                 <a href="/cliente/deletar/{{ $item->id }}" class="btn btn-xs mx-1 pt-1 btn-outline-danger" title="Deletar">                              
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
@include('layout.footer')

<script>
   function visualizarCliente( nome, cpf, telefone, email ) {
      // Atualiza o conteúdo do modal com os detalhes fornecidos
      $('#MyModalLabelName').text(nome);
      $('#cpf').text('CPF : ' + cpf);
      $('#telefone').text('Telefone : ' + telefone);
      $('#email').text('E-mail : ' + email);
      // Abre o modal
      $('#MyModal').modal('show');
   }
   function closeModal(){
      $('#MyModal').modal('hide');
   }
</script>