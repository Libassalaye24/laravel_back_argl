<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
  </head>
  <body>

    <div style="text-align: center;margin-top: 20px">
       <img style="width: 150px" alt="" src="http://199.247.7.51/dmd_back/assets/images/logo/logo.png">
    </div>

    <h2>Cher(e) {{ $user->prenom." ".$user->nom }}</h2>
    <p>
        {{ $texte }}
    </p>
    <div style="font-style: italic">ECOLE SUPERIEURE 221</div>

  </body>
</html>
