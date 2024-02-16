<?php

if (isset($_GET['error']) && !empty($_GET['error'])) { ?>
    <div class="custom-toast alert alert-danger m-0" role="alert">
        <?= $_GET['error'] ?>
    </div>
<?php }

if (isset($_GET['success']) && !empty($_GET['success'])) { ?>
    <div class="custom-toast alert alert-success m-0" role="alert">
        <?= $_GET['success'] ?>
    </div>

<?php }

if (isset($_GET['warning']) && !empty($_GET['warning'])) { ?>
    <div class="custom-toast alert alert-warning m-0" role="alert">
        <?= $_GET['warning'] ?>
    </div>
<?php }