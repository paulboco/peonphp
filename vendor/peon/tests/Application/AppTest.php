<?php

namespace Peon\Application;

use PeonTestCase;

class AppTest extends PeonTestCase
{
    protected $app;

    public function setUp()
    {
        $this->app = new App;
        $this->rootPath = $this->app->getRootPath();
    }

    public function tearDown()
    {
        $this->app->setRootPath($this->rootPath);
    }

    public function test_app_can_return_instance()
    {
        $this->assertInstanceOf('Peon\Application\App', App::getInstance());
    }

    public function test_app_can_set_root_path()
    {
        $this->app->setRootPath('foo/bar');

        $rootPath = $this->app->getRootPath();
        $this->assertEquals($rootPath, 'foo/bar');
    }

    public function test_app_can_get_root_path()
    {
        $this->app->setRootPath('foo/bar');

        $rootPath = $this->app->getRootPath();

        $this->assertEquals($rootPath, 'foo/bar');
    }

    public function test_app_can_detect_it_is_in_maintenance_mode()
    {
        touch(__DIR__ . '/../../../../storage/app/maintenance');

        $maintenance = $this->app->inMaintenance();

        $this->assertTrue($maintenance);
    }

    public function test_app_can_detect_is_not_in_maintenance_mode()
    {
        unlink(__DIR__ . '/../../../../storage/app/maintenance');

        $maintenance = $this->app->inMaintenance();

        $this->assertFalse($maintenance);
    }
}
