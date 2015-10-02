<?php view('/views/layout/header.tpl') ?>

<h1 class="page-header"><?php echo $title ?></h1>

<div class="row">
    <div class="col-md-6">
        <h2><?php echo $leftColumnTitle ?></h2>
        <h3>Dynamic Title</h3>
        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>       
    </div>
    <div class="col-md-6">
        <h2>Right Column Title</h2>
        <h3>Static Title</h3>
        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>       
    </div>
</div>


<?php view('/views/layout/footer.tpl') ?>
