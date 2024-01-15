{{-- MODAL --}}
<div class="modal fade" id="MyModal"  tabindex="-1" role="dialog" aria-labelledby="MyModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
       <div class="modal-content">                                       
          <div class="modal-body d-flex align-items-stretch flex-column">         
             <div class="card bg-light d-flex flex-fill">                                               
                <div class="card-body pt-0">
                   <div class="row justify-content-center">                                                   
                      <h2 class="lead"><b id="nome"></b></h2>                                             
                   </div><br>
                   <div class="row">
                      <div class="col-7">                                                           
                         <ul class="ml-4 mb-0 fa-ul text-muted">
                            <li class="small"><span class="fa-li"><i class="fas fa-lg fa-dog"></i></span> <p id="raca"></p></li>
                            <li class="small"><span class="fa-li"><i class="fa-solid fa-balance-scale-left"></i></span> <p id="peso"></p></li>
                            <li class="small"><span class="fa-li"><i class="fas fa-lg fa-user"></i></span> <p id="cliente" ></p></li>
                         </ul>
                      </div>
                      <div class="col-5 text-center">
                         <img src="#" alt="user-avatar" class="img-circle img-fluid">
                      </div>
                   </div><br>                                                   
                   <div class="row justify-content-between">                                                   
                      <a href="/cliente/exportar-pdf/{{ $item->id }}">
                         <button type="button" class="btn btn-primary" data-dismiss="modal">Exportar</button>
                      </a>
                      <button type="button" id="close" onclick="closeModal()" class="btn btn-danger" data-dismiss="modal">Fechar</button>                                                      
                   </div>
                </div>                                            
             </div>
             </div>                                           
          </div>                                       
    </div>
 </div>
 {{-- END MODAL --}}   
