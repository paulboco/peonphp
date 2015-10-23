<?php $this->inject('layout/header') ?>

<div class="container">
    <h1 class="page-header">
        Welcome to <?php e(config('app.name')) ?>
        <br>
        <small><?php e(config('app.description')) ?></small>
    </h1>
</div>

<?php $this->inject('layout/footer') ?>