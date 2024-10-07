<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport">
    <head>
        <meta charset="utf-8">
        <title>Ma page</title>
        <link href="/HSP-App/resources/css/loginn.css" rel="stylesheet">
    </head>

    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

    <h1>Connexion</h1>
    <div class="row text-center py-3 mt-3">
        @csrf
        <label for="email">Email</label>
        <div class="col-4 mx-auto">
            <input type="email" placeholder="Email" class="form-control" id="email" name="email" value="{{old('email')}}">
            @error ("email")
            {{ $message  }}
            @enderror
        </div>
    </div>
    <div class="row text-center py-3 mt-3">
        <label for="password">Mot de passe</label>
        <div class="col-4 mx-auto">
            <input type="password" placeholder="Mot de Passe" class="form-control" id="password" name="password" value="{{old('password')}}">
            @error ("password")
            {{ $message  }}
            @enderror
        </div>
    </div>

    <div class="row text-center py-3 mt-3">
            <button type="button" class="btn btn-success w-auto me-1 mb-0">Se connecter</button>
        </div>
    </div>
    </div>
</body>
</html>
