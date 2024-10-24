<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>film</title>
    <script
        src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo="
        crossorigin="anonymous"></script>
    <!--DataTable-->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css">
    <script type="text/javascript" src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
</head>
<body>
<table id="myTable" class="display">
    <thead>
    <tr>
        <th>nom</th>
        <th>prenom</th>
        <th>etablissement</th>
    </tr>
    </thead>
    <tbody>
    <?php

    $bdd = new PDO('mysql:host=localhost:3306;dbname=annuaire;charset=utf8', 'root', '');

    $requete = $bdd -> prepare("SELECT * FROM annuaire");
    $requete -> execute();
    $aff = $requete -> fetchAll();
    foreach ($aff as $uti){
        echo '<tr>';
        echo '<td>'.$uti['nom'].'</td>';
        echo '<td>'.$uti['prenom'].'</td>';
        echo '<td>'.$uti['etablissement'].'</td>';
        echo '</tr>';
    }
    ?>
    </tbody>
</table>
<script>
    $(document).ready( function () {
        $('#myTable').DataTable();
    } );
</script >
</body>
</html>