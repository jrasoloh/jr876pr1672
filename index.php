<?php
    require 'header.php';
    include 'bdd.php';
?>

<?php
$mysqlClient = connexion();

$sqlQuery = 'SELECT * FROM oeuvres';
$recipesStatement = $mysqlClient->prepare($sqlQuery);
$recipesStatement->execute();
$oeuvres = $recipesStatement->fetchAll();
?>

<div id="liste-oeuvres">
    <?php foreach($oeuvres as $oeuvre): ?>
        <article class="oeuvre">
            <a href="oeuvre.php?id=<?= $oeuvre['id'] ?>">
                <img src="<?= $oeuvre['image'] ?>" alt="<?= $oeuvre['titre'] ?>">
                <h2><?= $oeuvre['titre'] ?></h2>
                <p class="description"><?= $oeuvre['artiste'] ?></p>
            </a>
        </article>
    <?php endforeach; ?>
</div>
<?php require 'footer.php'; ?>
