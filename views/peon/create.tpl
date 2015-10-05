<?php view('layout/header') ?>

<h1>Peon Edit</h1>

<div class="row">
    <div class="col-md-6">
        <form action="/peon/store" method="POST">
            <?php view('peon/inputs', array(
                'row' => null,
                'ratings' => $ratings,
                'errors' => $errors,
            )) ?>
        </form>
    </div>
</div>

<?php view('layout/footer') ?>
