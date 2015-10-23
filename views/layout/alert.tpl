<?php

$levels = array('danger', 'warning', 'info', 'success');
$session = Peon\App::getInstance()->make('session');
$messages = '';

foreach ($levels as $level) {
    if ($message = $session->getFlash($level)) {
        $messages .= "<div class=\"alert alert-{$level}\" role=\"alert\">" . PHP_EOL .
                     '    ' . $message . PHP_EOL .
                     '    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>' . PHP_EOL .
                     '</div>';
    }
}
?>

<?php if ($messages): ?>
    <div class="row">
        <div class="col-md-offset-2 col-md-8">
            <?php echo $messages ?>
        </div>
    </div>
<?php endif ?>
