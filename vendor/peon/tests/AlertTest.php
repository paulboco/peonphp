<?php

namespace Peon;

use PeonTestCase;

class AlertTest extends PeonTestCase
{
    public function setUp()
    {
        $this->mockSession = $this->getSessionMock();

        $this->alert = new Alert($this->mockSession);
    }

    public function test_alert_has()
    {
        $this->alert->flash('success', 'message');
    }

    private function getSessionMock()
    {
        $object = $this->getMock(
            'Peon\Session\Session',
            array('setFlash','getFlash')
        );

        // $object
        //   ->expects($this->once())
        //   ->method('getFlash')
        //   ->will($this->returnValue(array()));

        $object
          ->expects($this->once())
          ->method('setFlash')
          ->with($this->equalTo('alerts.success'));

        return $object;
    }

}
