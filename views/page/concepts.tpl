<?php view('layout/header') ?>

<h1 class="page-header">Concepts</h1>

<div class="row">
    <div class="col-md-7">
        <?php view('page/concepts/cycle') ?>

        <?php view('page/concepts/routing') ?>

        <?php view('page/concepts/config') ?>
    </div>
</div>

<?php $conceptsJs = <<<JS
<script type="text/javascript">
$(document).ready(function () {
    $(function () {
        $('[data-toggle="tooltip"]').tooltip();
    });
});
</script>
JS;
?>

<?php view('layout/footer', array('javascript' => $conceptsJs)) ?>
