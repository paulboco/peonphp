<?php view('layout/header') ?>

<h1 class="page-header">
    <?php e(config('app.name')) ?>
    <br>
    <small><?php e(config('app.description')) ?></small>
</h1>

<div class="row">
    <div class="col-md-7">
        <h2><?php e($dynamic_heading) ?></h2>
        <p>The dynamic heading above is defined in the
            <code>home()</code> method on the
            <code>PageController</code> in file:
            <code>&lt;project>/app/Controllers/PageController.php</code>
        </p>
        <h2>Static Heading</h2>
        <p>The static heading above is defined in the
            <em class="hint" data-toggle="tooltip" data-placement="top" title="Jargon Alert!">view</em>
            in file: <code>&lt;project>/views/page/home.tpl</code>
        </p>
    </div>
</div>

<?php view('layout/footer') ?>