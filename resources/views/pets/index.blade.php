@include('layout.header')
@include('layout.navbar')
@include('layout.sidebar')

<div class="content-wrapper">
   <div class="content-header">
      <div class="container-fluid">
         <div class="row mb-2">
            <div class="col-12 col-sm-12 col-md-6 col-lg-6">
               <h1 class="m-0">Pets</h1>
            </div>
            <div class="col-12 col-sm-12 col-md-6 col-lg-6">
               <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item "><a href="/" class="harpia-text-color">Dashboard</a></li>
                  <li class="breadcrumb-item active">Pets</li>
               </ol>
            </div>
         </div>
      </div>
   </div>

   {{-- LISTAGEM --}}
   <div class="content corpo">
      <div class="container-fluid">
         <div class="card">
            <div class="card-header">
               <div class="row align-items-center">
                  <div class="col-12 col-sm-12 col-md-6 col-lg-6">
                     <div class="row">                        
                        <a href="/pet/novo" class="m-1 btn btn-success">
                            Novo Pet 
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
                        <th class="col-3">Nome do pet</th>
                        <th class="col-3">Raça</th>
                        <th class="col-1">Peso (Kg)</th>
                        <th class="col-4">Nome do cliente</th>
                        <th class="col-1">Ações</th>
                     </tr>
                  </thead>
                  <tbody> 
                     @foreach ($pet as $item)                      
                        <tr>
                           <td class="col-3"> {{$item->nome}} </td>
                           <td class="col-3"> {{$item->raca}} </td>
                           <td class="col-1"> {{$item->peso}} </td>
                           <td class="col-4"> {{$item->cliente->nome}} </td>                                                      
                           <td class="col-1">                                 
                              <a class="btn btn-xs mx-1 pt-1 btn-outline-success" onclick="abrirDetalhes('{{ $item->nome }}', '{{ $item->raca }}', {{ $item->peso }}, '{{ $item->cliente->nome }}')">                           
                                 <i class="fas fa-eye"></i>
                              </a>
                              <!-- Modal -->
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
                                       <p id="raca" ></p><br>
                                       <p id="peso" ></p><br>
                                       <p id="cliente"></p>
                                    </div>
                                    <div class="modal-footer">
                                       <button type="button" id="close" onclick="closeModal()" class="btn btn-primary" data-dismiss="modal">Fechar</button>
                                    </div>
                                 </div>
                                 </div>
                              </div>
                              {{-- END MODAL --}}                      
                              <a href="/pet/editar/{{$item->id}}" class="btn btn-xs mx-1 pt-1 btn-outline-warning" title="Edição">                              
                                 <i class="fas fa-pen"></i>
                              </a>
                              <a href="/pet/deletar/{{$item->id}}" class="btn btn-xs mx-1 pt-1 btn-outline-danger" title="Deletar">                              
                                 <i class="fas fa-trash"></i>
                              </a>                                                
                           </td>
                        </tr>                                               
                     @endforeach
                  </tbody>
               </table>
               @if(count($pet) < 1)
               <div class="alert alert-info m-3 text-center">
                  Nenhum registro encontrado!
               </div>
            @endif    
            </div>
         </div>        
      </div>
   </div>
</div>

@include('layout.footer')

<script>
   function abrirDetalhes( nome, raca, peso, nomeCliente ) {
      // Atualiza o conteúdo do modal com os detalhes fornecidos
      $('#MyModalLabelName').text(nome);
      $('#raca').text('Raça: ' + raca);
      $('#peso').text('Peso: ' + peso);
      $('#cliente').text('Nome do cliente: ' + nomeCliente);
      // Abre o modal
      $('#MyModal').modal('show');
   }
   function closeModal(){
      $('#MyModal').modal('hide');
   }
</script>
