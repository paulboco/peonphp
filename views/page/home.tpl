<?php view('layout/header') ?>

<h1 class="page-header">
    <?php e(config('app.name')) ?>
    <br>
    <small><?php e(config('app.description')) ?></small>
</h1>

<div class="row">
    <div class="col-md-6">
        <h2><?php e($dynamic_heading) ?></h2>
        <p>The dynamic heading above is defined in the
            <em>home</em> method of the
            <em>PageController</em> in file:
            <code>peon/app/Controllers/PageController.php</code>
        </p>
        <h2>Static Heading</h2>
        <p>The static heading above is defined in the
            <em>view</em> in file:
            <code>peon/views/page/home.tpl</code>
        </p>
    </div>
    <div class="col-md-6">
    asdf
    </div>
</div>

<?php view('layout/footer') ?>
