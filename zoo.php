<?php include 'config/autoload.php'; ?>
<?php include 'config/db.php'; ?>
<?php
$zooManager = new ZooManager($db);
$enclosManager = new EnclosManager($db);

$zoo = $zooManager->getById($_GET['zoo_id']);
$enclosManager->findByZooId($zoo);

?>
<?php include 'partials/header.php'; ?>
<section class="container">
    <h1 class="text-center my-4">Bienvenu dans <?=$zoo->getName()?></h1>
    
</section>
<section class="container">
    <h1 class="text-center my-4">Créer un Enclos</h1>
    <form action="./process/enclos/process_add_enclos.php" method="post">
        <input class="form-control" name="name" type="text" placeholder="Nom de mon enclos">
        <select name="type" id="type">
            <option value="aquarium">Aquarium</option>
            <option value="savane">Savane</option>
            <option value="voliere">Volière</option>
        </select>
        <input type="hidden" name="zoo_id" value="<?= $zoo->getId() ?>">
        <button class="btn btn-danger" >Créer un enclos</button>
    </form>
</section>


<section class="container">
    <h1 class="text-center my-4">Liste des Enclos</h1>
    <div class="d-flex flex-wrap">
        <?php foreach ($zoo->getEnclos() as $enclos) { ?>
            <div class="card m-2" style="width: 18rem;">
                <img src="https://png.pngtree.com/png-clipart/20201114/ourmid/pngtree-small-animals-in-the-zoo-png-image_2420311.jpg" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title"><?= $enclos->getName() ?></h5>
                    <p class="card-text"> Nombre maximun d'enclos : <?= $enclos->getNbrMaxAnimals() ?></p>
                    <p class="card-text"> <?= $enclos->getType() ?></p>
                    <a href="./zoo.php?zoo_id=<?= $enclos->getId() ?>" class="btn btn-primary">Entrer dans l'Enclos ! </a>
                </div>
            </div>
        <?php } ?>
    </div>
</section>

<?php include 'partials/footer.php'; ?>
