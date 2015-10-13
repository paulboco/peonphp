<?php $this->view->make('layout/header') ?>

<h1 class="page-header">Concepts</h1>

<div class="row">
    <div class="col-md-8">
        <?php $this->view->make('page/concepts/cycle') ?>

        <?php $this->view->make('page/concepts/routing') ?>

        <?php $this->view->make('page/concepts/config') ?>
    </div>
</div>

<?php $this->view->make('layout/footer') ?>
