 {{-- Modal  for modifying comments--}}
 <div class="modal fade" id="createCommentModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
     <div class="modal-dialog">
         <div class="modal-content">
             <div class="modal-header">
                 <h1 class="modal-title fs-5" id="exampleModalLabel">Laisser un commentaire</h1>
                 <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
             </div>
             <form action="{{ route('comments.store') }}" method="POST">
                 <div class="modal-body">
                     @method('post')
                     @csrf
                     <input type="hidden" name="article_id" value="{{ $article->id }}">
                     <textarea class="p-2 w-100 border-0" name="comment" placeholder="Ajouter un commentaire" cols="30" rows="3"></textarea><br>
                 </div>
                 
                 <div class="modal-footer">
                     <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
                     <button class="btn btn-success" type="submit">Laisser un commentaire</button>
                    </div>
                </form>
         </div>
     </div>
 </div>
