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
        <h3>Static Heading</h3>
        <p>The static heading above is defined in the
            <em>view</em> in file:
            <code>peon/views/page/home.tpl</code>
        </p>
    </div>
    <div class="col-md-6">
        <h2>Static Heading</h2>
        <h3>Lorem Ipsum</h3>
        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
    </div>
</div>

<?php view('layout/footer') ?>
