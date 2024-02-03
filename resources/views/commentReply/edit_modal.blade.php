 {{-- Modal  for modifying comments--}}
 <div class="modal fade" id="editCommentReolyModal{{ $reply->id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
 aria-hidden="true">
 <div class="modal-dialog">
     <div class="modal-content">
         <div class="modal-header">
             <h1 class="modal-title fs-5" id="exampleModalLabel">Modifier ma réponse</h1>
             <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
         </div>
         <form action="{{ route('comment-replies.update', $reply->id) }}" method="POST">
             <div class="modal-body">
                 @csrf
                 @method('put')
                 <input type="hidden" name="comment_id" value="{{ $reply->id }}">
                 <textarea class="w-100 border-0" name="content" placeholder="Modifier ma réponse">{{$reply->content}}</textarea><br>
             </div>
             <div class="modal-footer">
                 <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
                 <button class="btn btn-success" type="submit">Modifier ma réponse</button>
             </div>
         </form>
     </div>
 </div>
</div>