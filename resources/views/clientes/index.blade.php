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
         @foreach(['success', 'danger'] as $key)
            @if(session()->has($key))
               <div class=" row justify-content-end">
                  <div class="alert alert-{{ $key }} alert-dismissible show fade estilo-alert w-15">
                     {{ session($key) }}
                     <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                     </button> 
                  </div>
               </div>
            @endif
         @endforeach
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
                                 <a class="btn btn-xs mx-1 pt-1 btn-outline-success" onclick="visualizarCliente('{{ $item->nome }}', '{{ $item->cpf }}', '{{ $item->telefone }}', '{{ $item->email }}', '{{ $item->foto }}')">                           
                                    <i class="fas fa-eye"></i>
                                 </a>                                  
                                 <a href="/cliente/editar/{{ $item->id }}" class="btn btn-xs mx-1 pt-1 btn-outline-warning" title="Edição">                              
                                    <i class="fas fa-pen"></i>
                                 </a>
                                 <a href="#" class="btn btn-xs mx-1 pt-1 btn-outline-danger" onclick="deletarCliente('/cliente/deletar/{{ $item->id }}')" title="Deletar">                              
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
@include('clientes.visualizar')
@include('layout.footer')

<script>
   function visualizarCliente( nome, cpf, telefone, email, foto ) {
      // Atualiza o conteúdo do modal com os detalhes fornecidos
      $('#nome').text(nome);
      $('#cpf').text('CPF : ' + cpf);
      $('#telefone').text('Telefone : ' + telefone);
      $('#email').text('E-mail : ' + email);
      $('#foto').attr('src', 'storage/' + foto);
      console.log(foto);
      // Abre o modal
      $('#MyModal').modal('show');
   }
   function closeModal(){
      $('#MyModal').modal('hide');
   }

   function deletarCliente(url) {
    Swal.fire({
      title: 'Tem Certeza?',
      text: "Esta ação não pode ser desfeita!",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Sim, Deletar!'
    }).then((result) => {
      if (result.isConfirmed) {
        window.location.href = url
          // Swal.fire(
          //     'Deletado!',
          //     'O registro foi deletado!',
          //     'success'
          // )
      }
    })
  }
   
</script>