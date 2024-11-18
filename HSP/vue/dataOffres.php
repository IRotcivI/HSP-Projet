+<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Liste des Offres</title>
    <script
            src="https://code.jquery.com/jquery-3.7.1.min.js"
            integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo="
            crossorigin="anonymous"></script>
    <!-- DataTable -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css">
    <script type="text/javascript" src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
<h1>Liste des Offres</h1>
<table id="myTable" class="display">
    <thead>
    <tr>
        <th>Titre</th>
        <th>Description</th>
        <th>Tache</th>
        <th>Date</th>
        <th>Salaire</th>
        <th>Type</th>
    </tr>
    </thead>
    <tbody>
    <?php
    try {
        $bdd = new PDO('mysql:host=localhost:3306;dbname=hsp;charset=utf8', 'root', '');

    $requete = $bdd->prepare("SELECT * FROM offre");
    $requete->execute();
    $aff = $requete->fetchAll(PDO::FETCH_ASSOC);

    foreach ($aff as $offre) {
    echo '<tr>';
        echo '<td>' . $offre['titre'] . '</td>';
        echo '<td>' . $offre['description'] . '</td>';
        echo '<td>' . $offre['tache'] . '</td>';
        echo '<td>' . $offre['date'] . '</td>';
        echo '<td>' . $offre['salaire'] . '</td>';
        echo '<td>' . $offre['type'] . '</td>';
        echo '</tr>';
    }
    } catch (PDOException $e) {
    echo 'Erreur : ' . $e->getMessage();
    }
    ?>
    </tbody>
</table>
<script>
    $(document).ready(function () {
        $('#myTable').DataTable();
    });
</script>
</body>
</html>
