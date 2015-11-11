<?php $this->inject('layout/header') ?>

<div class="container">
    <h1>Peon API</h1>
    <?php if (realpath(path('/public/api/index.html'))): ?>
        <iframe src="/api" style="border: 0; width: 100%; height: 10000px;">Your browser doesn't support iFrames.</iframe>
    <?php else: ?>
        <h4>API Not Found</h4>
        <p>Use the command <code>php apigen.phar generate</code> to generate the API.</p>
    <?php endif ?>
</div>

<?php $this->inject('layout/footer') ?>
