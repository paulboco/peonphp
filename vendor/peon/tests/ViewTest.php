<?php

namespace Peon;

use PeonTestCase;
use Peon\Application\Container as ContainerBase;

class ViewTest extends PeonTestCase
{
    protected $view;
    protected $viewsPath;

    public function setUp()
    {
        include __DIR__ . '/../src/helpers.php';
        $this->loadContainer();
        $this->createTestFiles();

        $this->view = new View;
    }

    public function tearDown()
    {
        $this->removeTestFiles();
    }

    public function test_can_make_a_view()
    {
        $result = $this->view->make('temp/header');

        $this->assertEquals('header', $result);
    }

    public function test_can_make_an_injected_view()
    {
        $result = $this->view->make('temp/test', array('foo' => 'bar'));

        $this->assertEquals('headerview contentsbar', $result);
    }

    public function test_can_share_view_data()
    {
        $this->view->share(array('foo' => 'baz'));
        $result = $this->view->make('temp/test');

        $this->assertEquals('headerview contentsbaz', $result);
    }

    /**
     * Create Test Files
     *
     * @return void
     */
    private function createTestFiles()
    {
        $this->viewsPath = realpath('./../../views');

        mkdir($this->viewsPath . '/temp');

        file_put_contents(
            $this->viewsPath . '/temp/test.tpl',
            "<?php \$this->inject('temp/header') ?>\nview contents<?echo \$foo ?>"
        );

        file_put_contents(
            $this->viewsPath . '/temp/header.tpl',
            'header'
        );
    }

    /**
     * Remove Test Files
     *
     * @return void
     */
    private function removeTestFiles()
    {
        foreach (glob($this->viewsPath . '/temp/*') as $file) {
            unlink($file);
        }

        rmdir($this->viewsPath . '/temp');
    }
}

class Container extends ContainerBase
{}
