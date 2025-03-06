
<h1>Modifier le Cours</h1>

<form action="{{ route('cours.update', $cours->id) }}" method="POST">
    @csrf
    @method('PUT')

    <label for="nom">Nom du Cours :</label>
    <input type="text" name="nom" id="nom" value="{{ old('nom', $cours->nom) }}" required>
    <br>

    <label for="volume_horaire">Volume Horaire :</label>
    <input type="number" name="volume_horaire" id="volume_horaire" value="{{ old('volume_horaire', $cours->volume_horaire) }}" required>
    <br>

    <label for="id_prof">Professeur :</label>
    <select name="id_prof" required>
        <option value="M.Ly" >Abdoulaye Ly</option>
        <option value="M.Lo" >Abdoulaye Lo</option>

    </select>
    <br>

    <button type="submit">Modifier</button>
</form>

@if ($errors->any())
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
@endif

