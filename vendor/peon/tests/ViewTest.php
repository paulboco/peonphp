<?php

namespace Peon;

use PHPUnit_Framework_TestCase;

class ViewTest extends PHPUnit_Framework_TestCase
{
    protected $viewsPath;

    public function setUp()
    {
        include __DIR__ . '/../src/helpers.php';
        $this->viewsPath = realpath('./../../views');

        mkdir($this->viewsPath . '/temp');
        foreach (glob($this->viewsPath . '/temp/*') as $file) {
            // unlink($file);
            var_dump($file);
        }
    }

    public function tearDown()
    {
    }

    public function test_can_make_a_view()
    {
        $this->createView('view contents');
        $view = new View;

        $result = $view->make('test-view');

        $this->assertEquals('view contents', $result);
    }

    public function test_can_make_an_injected_view()
    {
        $this->createView('view contents');
        $view = new View;

        $result = $view->make('test-view');

        $this->assertEquals('view contents', $result);
    }

    private function createView($contents)
    {
        file_put_contents($this->viewsPath . '/test-view.tpl', $contents);
    }
}
