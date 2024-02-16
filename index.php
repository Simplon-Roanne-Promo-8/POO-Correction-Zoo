<?php include 'config/autoload.php'; ?>
<?php include 'config/db.php'; ?>
<?php
$zooManager = new ZooManager($db);
$zoos = $zooManager->getAll();
// echo '<pre>';
// var_dump($zoos);
// echo '</pre>';
?>



<?php include 'partials/header.php'; ?>

<section class="container">
    <h1 class="text-center my-4">Créer un ZOO</h1>
    <form action="./process/zoo/process_add_zoo.php" method="post">
        <input class="form-control" name="name" type="text" placeholder="Nom de mon zoo">
        <button class="btn btn-danger" >Créer un zoo</button>
    </form>
</section>
<section class="container my-5">
    <h1 class="text-center my-4">Liste des ZOOS</h1>
    <div class="d-flex flex-wrap">
        <?php foreach ($zoos as $zoo) { ?>
            <div class="card m-2" style="width: 18rem;">
                <img src="https://png.pngtree.com/png-clipart/20201114/ourmid/pngtree-small-animals-in-the-zoo-png-image_2420311.jpg" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title"><?= $zoo->getName() ?></h5>
                    <p class="card-text"> Nombre maximun d'enclos : <?= $zoo->getNbrMaxEnclos() ?></p>
                    <a href="./zoo.php?zoo_id=<?= $zoo->getId() ?>" class="btn btn-primary">Entrer dans le Zoo ! </a>
                </div>
            </div>
        <?php } ?>
    </div>
</section>

<?php include 'partials/footer.php'; ?>
    


