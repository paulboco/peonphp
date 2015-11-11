<?php

$replacements = array(

    '/public/api/resources/style.css' => array(
        'search' => 'font: 13px/1.5',
        'replace' => 'font: 15px/1.45',
    ),

    '/public/coverage/css/style.css' => array(
        'search' => "body {\n padding-top: 10px;",
        'replace' => "body {\n padding-top: 10px;\n font-size: 15px;",
    ),
);

foreach ($replacements as $filename => $replacement) {
    $contents = file_get_contents(realpath('.') . $filename);
    $contents = str_replace($replacement['search'], $replacement['replace'], $contents);
    file_put_contents(realpath('.') . $filename, $contents);
}

$this->success('Fonts for API and PHPUnit Code Coverage have been normalized');
