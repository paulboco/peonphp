<?php

$levels = array('danger', 'warning', 'info', 'success');
$session = Peon\App::getInstance()->make('session');

foreach ($levels as $level) {
    if ($message = $session->flash($level)) {
        echo "<div class=\"alert alert-{$level}\" role=\"alert\">";
        echo $message;
        echo '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>';
        echo '</div>';
    }
}