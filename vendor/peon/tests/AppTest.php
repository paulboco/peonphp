<?php

namespace Peon;

use PHPUnit_Framework_TestCase;

class AppTest extends PHPUnit_Framework_TestCase
{
    public function setUp()
    {
        $this->rootPath = App::getRootPath();
    }

    public function tearDown()
    {
        App::setRootPath($this->rootPath);
    }

    public function test_app_can_return_instance()
    {
        $app = App::getInstance();

        $this->assertInstanceOf('Peon\App', $app);
    }

    public function test_app_can_set_root_path()
    {
        $app = new App;

        $app->setRootPath('foo/bar');

        $rootPath = $app->getRootPath();
        $this->assertEquals($rootPath, 'foo/bar');
    }

    public function test_app_can_get_root_path()
    {
        $app = new App;
        $app->setRootPath('foo/bar');

        $rootPath = $app->getRootPath();

        $this->assertEquals($rootPath, 'foo/bar');
    }

    public function test_app_can_detect_is_in_maintenance_mode()
    {
        touch($this->rootPath . '/storage/app/maintenance');

        $app = new App;
        $maintenance = $app->inMaintenance();

        $this->assertTrue($maintenance);
    }

    public function test_app_can_detect_is_not_in_maintenance_mode()
    {
        unlink($this->rootPath . '/storage/app/maintenance');

        $app = new App;
        $maintenance = $app->inMaintenance();

        $this->assertFalse($maintenance);
    }
}
