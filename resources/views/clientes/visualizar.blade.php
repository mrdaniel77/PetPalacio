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
                           <li class="small"><span class="fa-li"><i class="fas fa-lg fa-address-card"></i></span> <p id="cpf"></p></li>
                           <li class="small"><span class="fa-li"><i class="fas fa-lg fa-envelope"></i></span> <p id="email"></p></li>
                           <li class="small"><span class="fa-li"><i class="fas fa-lg fa-phone"></i></span> <p id="telefone"></p></li>
                        </ul>
                     </div>
                     <div class="col-5 text-center">
                        <img id="foto" alt="user-avatar" class="img-circle img-fluid" style="max-width: 100px;">
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

 <!-- MODAL DELETE-->
<div class="modal fade" id="delete-modal" tabindex="-1" role="dialog" aria-labelledby="modalLabel">
   <div class="modal-dialog" role="document">
     <div class="modal-content">
       <div class="modal-header">
         <button type="button" class="close" data-dismiss="modal" aria-label="Fechar"><span aria-hidden="true">&times;</span></button>
         <h4 class="modal-title" id="modalLabel">Excluir Item</h4>
       </div>
       <div class="modal-body">
         Deseja realmente excluir este item?
       </div>
       <div class="modal-footer">
         <a id="confirm" class="btn btn-primary" href="#">Sim</a>
         <a id="cancel" class="btn btn-default" data-dismiss="modal">N&atilde;o</a>
       </div>
     </div>
   </div>
 </div> <!-- /.MODAL DELETE -->