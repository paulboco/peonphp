<?php view('layout/header') ?>

<h1 class="page-header">Requirements</h1>

<div class="row">
    <div class="col-md-7">
        <ul>
            <li>Vagrant</li>
            <li>Virtual Box</li>
            <li>PHP 5.3.10</li>
            <li>URL rewrite</li>
        </ul>
    </div>
</div>

<?php $requirementsJs = <<<JS
<script type="text/javascript">
$(document).ready(function () {
    $(function () {
        $('[data-toggle="tooltip"]').tooltip();
    });
});
</script>
JS;
?>

<?php view('layout/footer', array('javascript' => $requirementsJs)) ?>