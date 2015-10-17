<!DOCTYPE html>
<html>
<head>
    <title><?php e(config('app.name')) ?></title>
    <?php $this->inject('layout/style') ?>
</head>
<body>
    <?php $this->inject('layout/navbar') ?>
    <div class="container">
        <?php $this->inject('layout/alert') ?>
