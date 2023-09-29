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
                  @foreach ($pet as $item)                      
                     <tbody>                     
                           <tr>
                              <td class="col-3"> {{$item->nome}} </td>
                              <td class="col-3"> {{$item->raca}} </td>
                              <td class="col-1"> {{$item->peso}} </td>
                              <td class="col-4"> {{$item->cliente->nome}} </td>                                                      
                              <td class="col-1">                                 
                                 <a href="/pet/visualizar/" class="btn btn-xs mx-1 pt-1 btn-outline-success" title="Visualização">                              
                                    <i class="fas fa-eye"></i>
                                 </a>
                                 <a href="/pet/editar/{{$item->id}}" class="btn btn-xs mx-1 pt-1 btn-outline-warning" title="Edição">                              
                                    <i class="fas fa-pen"></i>
                                 </a>
                                 <a href="/pet/deletar/{{$item->id}}" class="btn btn-xs mx-1 pt-1 btn-outline-danger" title="Deletar">                              
                                    <i class="fas fa-trash"></i>
                                 </a>                                                
                              </td>
                           </tr>                    
                     </tbody>
                  @endforeach
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
