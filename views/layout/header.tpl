<!DOCTYPE html>
<html>
<head>
    <title><?php e(config('app.name')) ?></title>
    <?php echo $this->view->make('layout/style') ?>
</head>
<body>
    <?php $this->view->make('layout/navbar') ?>
    <div class="container">
