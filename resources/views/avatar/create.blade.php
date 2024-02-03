<form action="{{ route('avatar') }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('put')
    <input type="file" name="avatar">
    <button type="submit">Mettre à jour l'avatar</button>
</form>
