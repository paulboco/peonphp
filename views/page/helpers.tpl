<?php view('layout/header') ?>

<a id="top"></a>
<h1 class="page-header">Helper Functions</h1>

<?php $helpers = glob(path('/views/page/helpers/*.tpl')) ?>

<div class="row">
    <div class="col-md-7">
        <ul class="nav-compact">
            <?php foreach ($helpers as $template): ?>
                <?php $basename = basename($template, '.tpl') ?>
                <li><a href="#<?php echo $basename ?>"><?php echo $basename ?></a></li>
            <?php endforeach ?>
        </ul>
        <?php foreach ($helpers as $template): ?>
            <a id="<?php echo basename($template, '.tpl') ?>"></a>
            <?php include($template) ?>
        <?php endforeach ?>

    </div>
</div>
<a href="javascript:window.scrollTo(0, 0);" id="back-to-top">
    <span class="glyphicon glyphicon-circle-arrow-up"></span>
</a>

<?php $javascript = <<<JS
<script type="text/javascript">
$(document).ready(function () {
    $(window).scroll(function() {
        if ($(this).scrollTop() > 100) {
            $('a#back-to-top>span').fadeIn();
        } else {
            $('a#back-to-top>span').fadeOut();
        }
    });
});
</script>
JS;
?>

<?php view('layout/footer', array('javascript' => $javascript)) ?>
