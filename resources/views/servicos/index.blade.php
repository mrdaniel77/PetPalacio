@include('layout.header')
@include('layout.navbar')
@include('layout.sidebar')

<div class="content-wrapper">
   <div class="content-header">
      <div class="container-fluid">
         <div class="row mb-2">
            <div class="col-12 col-sm-12 col-md-6 col-lg-6">
               <h1 class="m-0">Serviços</h1>
            </div>
            <div class="col-12 col-sm-12 col-md-6 col-lg-6">
               <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item "><a href="/" class="harpia-text-color">Dashboard</a></li>
                  <li class="breadcrumb-item active">Serviços</li>
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
                        <a href="/servico/novo" class="m-1 btn btn-success">
                            Novo Serviço 
                            <i class="fas fa-plus"></i>
                        </a>                                                
                     </div>
                  </div>
                  <div class="col-12 col-sm-12 col-md-6 col-lg-6 card-tools">
                     <form>
                        <div class="input-group input-group w-100 float-right">
                           <input type="text" name="pesquisa" class="form-control" placeholder="Pesquisar">
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
                  <thead align="center">
                     <tr>
                        <th class="col-4">Nome</th>
                        <th class="col-2">Preço</th>
                        <th class="col-4">Descrição</th>
                        <th class="col-2">Ações</th>
                     </tr>
                  </thead>
                  @foreach ($servico as $item)                      
                     <tbody>                     
                           <tr>
                              <td class="col-4"> {{$item->nome}} </td>
                              <td class="col-2"> {{$item->preco}} </td>
                              <td class="col-4"> {{$item->descricao}} </td>
                              <td class="col-2">                                 
                                 <a class="btn btn-xs mx-1 pt-1 btn-outline-success" onclick="visualizarServico('{{ $item->nome }}', '{{ $item->preco }}', '{{ $item->descricao }}')">                           
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
                                          <p id="preco" ></p><br>
                                          <p id="descricao" ></p><br>
                                       </div>
                                       <div class="modal-footer">
                                          <button type="button" id="close" onclick="closeModal()" class="btn btn-primary" data-dismiss="modal">Fechar</button>
                                       </div>
                                    </div>
                                    </div>
                                 </div>
                                 {{-- END MODAL --}}    
                                 <a href="/servico/editar/{{ $item->id }}" class="btn btn-xs mx-1 pt-1 btn-outline-warning" title="Edição">                              
                                    <i class="fas fa-pen"></i>
                                 </a>
                                 <a href="/servico/deletar/{{ $item->id }}" class="btn btn-xs mx-1 pt-1 btn-outline-danger" title="Deletar">                              
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
   function visualizarServico( nome, preco, descricao ) {
      // Atualiza o conteúdo do modal com os detalhes fornecidos
      $('#MyModalLabelName').text(nome);
      $('#preco').text('Preço : ' + preco);
      $('#descricao').text('Descrição : ' + descricao);
      // Abre o modal
      $('#MyModal').modal('show');
   }
   function closeModal(){
      $('#MyModal').modal('hide');
   }
</script>
