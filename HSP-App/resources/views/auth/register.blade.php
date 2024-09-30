<h2>Inscription</h2>
@if ($errors->any())
    <div>
    <div>
    </div>Erreur!</div>
    <ul>
        @foreach($errors->all() as $errors)
            <li>{{$errors}}</li>
        @endforeach
    </ul>
    </div>
@endif
<form action="/register" method="POST">
<div>
    <label for="nom">Nom</label>
    <input type="text" id="nom" name="nom" value="{{old('nom')}}" autofocus>
</div>
<div>
    <label for="prenom">Prenom</label>
    <input type="text" id="prenom" name="prenom" value="{{old('prenom')}}">
</div>
<div>
    <label for="email">Email</label>
    <input type="text" id="email" name="email" value="{{old('email')}}">
</div>
<div>
    <label for="password">Mot de passe</label>
    <input type="password" id="password" name="password" value="{{old('password')}}">
</div>
    <div>
        <label for="password_conf">Confirmation du Mot de passe</label>
        <input type="password" id="password_conf" name="password_conf" value="{{old('password_conf')}}">
    </div>

<duv>
    <button>Register</button>
</duv>
</form>
