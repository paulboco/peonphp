<?php
// dd($argv[1]);

switch ($argv[1]) {

    case 'success':
        $this->success('success message');
        break;

    case 'warning':
        $this->warning('warning message');
        break;

    case 'not-found':
        $this->fatal('not-found message');
        break;

    default:
        echo 'default';
        break;
}
