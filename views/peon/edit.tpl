<?php view('layout/header') ?>

<h1>Peon Edit</h1>

<div class="row">
    <div class="col-md-6">
        <form action="/peon/update/<?php echo $row['id'] ?>" method="POST">
            <?php view('peon/inputs', array(
                'row' => $row,
                'ratings' => $ratings,
                'errors' => $errors,
            )) ?>
        </form>
    </div>
</div>

<?php view('layout/footer') ?>
