    <footer class="container">
		&copy; <?php e(date('Y')) ?> <?php e(config('app.name')) ?>
    </footer>

    <?php if (isset($javascript)): ?>
        <?php $this->inject('layout/scripts', array('javascript' => $javascript)) ?>
    <?php else: ?>
        <?php $this->inject('layout/scripts') ?>
    <?php endif ?>

</body>
</html>