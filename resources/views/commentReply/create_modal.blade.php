 {{-- Modal  for modifying comments--}}
 <div class="modal fade" id="createCommentReplyModal" tabindex="-1" aria-labelledby="exampleModalLabel"
 aria-hidden="true">
 <div class="modal-dialog">
     <div class="modal-content">
         <div class="modal-header">
             <h1 class="modal-title fs-5" id="exampleModalLabel">Répondre</h1>
             <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
         </div>
         <form action="{{ route('comment-replies.store') }}" method="POST">
            <div class="modal-body">
                @csrf
                <input type="hidden" name="comment_id" value="{{ $comment->id }}">
                <textarea class="w-100 border-0" name="content" placeholder="Ajouter une réponse"></textarea><br> </div>
             <div class="modal-footer">
                 <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                 <button class="btn btn-success" type="submit">Répondre</button>
             </div>
         </form>
     </div>
 </div>
</div>

   