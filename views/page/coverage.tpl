<?php $this->inject('layout/header') ?>

<div class="container">
    <h1>PHPUnit Code Coverage</h1>
    <?php if (realpath(path('/public/coverage/index.html'))): ?>
        <iframe src="/coverage" style="border: 0; width: 100%; height: 10000px">Your browser doesn't support iFrames.</iframe>
    <?php else: ?>
        <h4>Report Not Found</h4>
        <p>
            Use the command
            <code>phpunit --coverage-html='<?php echo Peon\Application\App::getInstance()->getRootPath() ?>/public/coverage'</code>
            to generate the code coverage report.
        </p>
    <?php endif ?>
</div>

<?php $this->inject('layout/footer') ?>
