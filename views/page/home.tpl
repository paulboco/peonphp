<?php $this->inject('layout/header') ?>

<h1 class="page-header">
    Hello, <?php echo Peon\Auth::user()->username ?>
</h1>

<div class="row">
    <div class="col-md-8">
        <p>Welcome to the user area!</p>
    </div>
</div>

<?php $this->inject('layout/footer') ?>