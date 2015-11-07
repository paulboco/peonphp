<?php if (Peon\App::getInstance()->alert->has()): ?>
    <div class="container">
        <div class="row">
            <div class="col-md-offset-2 col-md-8">
                <?php foreach (Peon\App::getInstance()->alert->all() as $level => $text): ?>
                    <div class="alert alert-<?php echo $level ?>" role="alert">
                        <?php echo $text ?>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    </div>
                <?php endforeach ?>
            </div>
        </div>
    </div>
<?php endif ?>
