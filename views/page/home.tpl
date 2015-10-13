<?php $this->view->make('layout/header') ?>

<h1 class="page-header">
    <?php e(config('app.name')) ?>
    <br>
    <small><?php e(config('app.description')) ?></small>
</h1>

<div class="row">
    <div class="col-md-8">
    </div>
</div>

<?php $this->view->make('layout/footer') ?>