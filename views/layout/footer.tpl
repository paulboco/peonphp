    <footer class="container">
		&copy; <?php e(date('Y')) ?> <?php e(config('app.name')) ?>
        (<?php echo Peon\Application\App::environment() ?>,
        <?php echo number_format(memory_get_usage(true)) ?> bytes,
        <?php echo count(get_included_files()) ?> files,
        %%EXECUTION_TIME%%ms)
    </footer>

    <?php if (isset($javascript)): ?>
        <?php $this->inject('layout/scripts', array('javascript' => $javascript)) ?>
    <?php else: ?>
        <?php $this->inject('layout/scripts') ?>
    <?php endif ?>

</body>
</html>
