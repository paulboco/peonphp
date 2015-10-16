<!DOCTYPE html>
<html>
<head>
    <title><?php e(config('app.name')) ?></title>
    <?php echo $this->view->make('layout/style') ?>
</head>
<body>
    <?php $this->view->make('layout/navbar') ?>
    <div class="container">
        <?php if ($danger = flash('danger')): ?>
            <div class="alert alert-danger" role="alert">
                <?php echo $danger ?>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
            </div>
        <?php endif ?>
        <?php if ($success = flash('success')): ?>
            <div class="alert alert-success" role="alert">
                <?php echo $success ?>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
            </div>
        <?php endif ?>
