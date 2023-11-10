 <head>
     <link rel="stylesheet" href="assets/css/modal.css">
     <!-- <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet"> -->
     <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
     <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
     <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

 </head>
 <!-- Modal -->
 <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
     <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg">
         <div class="modal-content">

             <div class="modal-header">
                 <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
             </div>

             <div class="modal-body">

                 <div class="container">

                     <h3>DITES-NOUS CE QUE VOUS RECHERCHEZ</h3>

                     <form action="{{ route('client') }}" method="POST" enctype="multipart/form-data">
                         @csrf
                         <div class="row g-3">
                             <div class="col">
                                 <input type="text" class="form-control" name="nom" placeholder="Nom"
                                     aria-required="true" id="nom">
                             </div>
                             <div class="col">
                                 <input type="text" class="form-control" name="prenom" placeholder="Prénoms"
                                     aria-required="true" id="prenom">
                             </div>
                         </div>
                         <div class="row g-3">
                             <div class="col">
                                 <input type="email" class="form-control" name="email" placeholder="Email"
                                     aria-required="true" id="email">
                             </div>
                             <div class="col">
                                 <input type="text" class="form-control" name="contact" placeholder="Contact"
                                     aria-required="true" id="contact">
                             </div>
                         </div>
                         <div class="row g-3">
                             <select class="form-select" aria-label="Default select example"
                                 aria-placeholder="Sélectionner un service" name="service_id" id="service_id">
                                 @foreach ($services as $item)
                                     <option value="{{ $item->intitule_ser }}">{{ $item->intitule_ser }}
                                     </option>
                                 @endforeach

                             </select>
                         </div>
                         <div class="row">
                             <textarea class="form-control" name="besoin" id="besoin" cols="30" rows="10"></textarea>
                         </div>
                         <div class="row mb-3">
                             {!! NoCaptcha::renderJs() !!}
                             {!! NoCaptcha::display() !!}
                         </div>
                         <div class="row">
                             <input type="submit" value="Envoyer" aria-required="true" class="btn btn-primary">
                         </div>

                     </form>
                 </div>
             </div>

         </div>
     </div>
 </div>
