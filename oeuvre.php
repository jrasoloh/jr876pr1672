<?php
    require 'header.php';
    include 'bdd.php';

    // Si l'URL ne contient pas d'id, on redirige sur la page d'accueil
    if(empty($_GET['id'])) {
        header('Location: index.php');
    }

    $oeuvre = null;
    $index = $_GET['id'];
    $mysqlClient = connexion();


    $sqlQuery = "SELECT * FROM oeuvres WHERE id = ". "$index";
    $request = $mysqlClient->prepare($sqlQuery);
    $request->execute();
    $oeuvre = $request->fetch();

    // Si aucune oeuvre trouvée, on redirige vers la page d'accueil
    if(is_null($oeuvre)) {
        header('Location: index.php');
    }
?>

<article id="detail-oeuvre">
    <div id="img-oeuvre">
        <img src="<?= $oeuvre['image'] ?>" alt="<?= $oeuvre['titre'] ?>">
    </div>
    <div id="contenu-oeuvre">
        <h1><?= $oeuvre['titre'] ?></h1>
        <p class="description"><?= $oeuvre['artiste'] ?></p>
        <p class="description-complete">
             <?= $oeuvre['description'] ?>
        </p>
    </div>
</article>

<?php require 'footer.php'; ?>
