<?php $this->inject('layout/header') ?>

<div class="container">
    <h1 class="page-header">Concepts</h1>
    <div class="row">
        <div class="col-md-8">
            <?php $this->inject('page/concepts/cycle') ?>
            <?php $this->inject('page/concepts/routing') ?>
            <?php $this->inject('page/concepts/config') ?>
        </div>
    </div>
</div>

<?php $this->inject('layout/footer') ?>
