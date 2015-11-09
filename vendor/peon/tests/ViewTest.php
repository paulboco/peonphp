<?php

namespace Peon;

use Peon\Application\Container;
use PHPUnit_Framework_TestCase;

class ViewTest extends PHPUnit_Framework_TestCase
{
    protected $viewsPath;

    public function setUp()
    {
        include __DIR__ . '/../src/helpers.php';
        $this->createContainer();
        $this->createTestFiles();
    }

    public function tearDown()
    {
        $this->removeTestFiles();
    }

    public function test_can_make_a_view()
    {
        $view = new View;

        $result = $view->make('temp/header');

        $this->assertEquals('header', $result);
    }

    public function test_can_make_an_injected_view()
    {
        $view = new View;

        $result = $view->make('temp/test', array('foo' => 'bar'));

        $this->assertEquals('headerview contentsbar', $result);
    }

    public function test_can_share_view_data()
    {
        $view = new View;

        $view->share(array('foo' => 'baz'));
        $result = $view->make('temp/test');

        $this->assertEquals('headerview contentsbaz', $result);
    }

    private function createView($file, $contents)
    {
        file_put_contents($this->viewsPath . $file, $contents);
    }

    private function createContainer()
    {
        $this->bindings = require __DIR__ . '/../../../config/bindings.php';
        $container = new Foo;
        $container->registerBindings($this->bindings);
    }

    private function createTestFiles()
    {
        $this->viewsPath = realpath('./../../views');

        mkdir($this->viewsPath . '/temp');
        $this->createView('/temp/test.tpl', "<?php \$this->inject('temp/header') ?>\nview contents<?echo \$foo ?>");
        $this->createView('/temp/header.tpl', 'header');
    }

    private function removeTestFiles()
    {
        foreach (glob($this->viewsPath . '/temp/*') as $file) {
            unlink($file);
        }

        rmdir($this->viewsPath . '/temp');
    }
}

class Foo extends Container
{}
