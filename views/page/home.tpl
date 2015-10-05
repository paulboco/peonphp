<?php view('layout/header') ?>

<h1 class="page-header">
    <?php e(Config::APP_NAME) ?>
    <br>
    <small><?php e(Config::APP_DESC) ?></small>
</h1>

<div class="row">
    <div class="col-md-12">
        <div class="alert alert-info" role="alert">
            Check out the code for this view at: <code>peon/views/page/home.tpl</code>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-6">
        <h2><?php e($dynamic_heading) ?></h2>
        <p class="well">This dynamic heading is defined in the
            <em>home</em> method of the
            <em>PageController</em> in file:
            <br>
            <code>peon/app/Controllers/PageController.php</code>
        </p>
        <h3>Lorem Ipsum</h3>
        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
    </div>
    <div class="col-md-6">
        <h2>Static Heading</h2>
        <h3>Lorem Ipsum</h3>
        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
    </div>
</div>

<?php view('layout/footer') ?>
