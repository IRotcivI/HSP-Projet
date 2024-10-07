<h1>Inscription</h1>
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
<form action="/HSP-App/app/Http/Controllers/registerController.php" method="POST">
<div>
    <input type="text" placeholder="Nom" id="nom" name="nom" value="{{old('nom')}}" autofocus>
    <br></br>
</div>
<div>
    <input type="text" placeholder="Prenom" id="prenom" name="prenom" value="{{old('prenom')}}">
    <br></br>
</div>
<div>
    <input type="text" placeholder="Email"  id="email" name="email" value="{{old('email')}}">
    <br></br>
</div>
<div>
    <input type="password" placeholder="Mot de passe" id="password" name="password" value="{{old('password')}}">
    <br></br>
</div>
    <div>
        <input type="password" placeholder="Confirmation" id="password_conf" name="password_conf" value="{{old('password_conf')}}">
        <br></br>
    </div>

<duv>
    <button>Enregistrer</button>
</duv>
</form>
