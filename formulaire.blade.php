<form action="{{route('nomdelaroute')}}" method="post">
    <!-- Protection CSRF -->
    @csrf
    <!-- Methode HTTP pour la route -->
    @method('put')
    @method('patch')
    @method('delete')
    <!-- Fonction old('nomdelinput') récupère la valeur du formulaire après validation -->
    <input type="text" name="title" value="{{old('title', "valeur par défaut")}}">

    @error('title')
    Message d'erreur pour l'input title OU {{$message}}
    @enderror

    <button type="submit">Submit</button>
</form>

