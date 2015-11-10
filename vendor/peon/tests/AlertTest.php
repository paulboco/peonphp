<?php

namespace Peon;

use PeonTestCase;

class AlertTest extends PeonTestCase
{
    public function setUp()
    {
        $this->stubSession = $this->getSessionMock();
        $this->alert = new Alert($this->stubSession);
    }

    public function test_alert_can_flash_message()
    {
        $this->alert->flash('success', 'message');

        $this->assertEquals('message', $this->stubSession->getFlash('success'));
    }

    public function test_that_alert_has_messages()
    {
        $this->alert->flash('success', 'message');

        $this->assertEquals(true, $this->alert->has());
    }

    public function test_that_alert_does_not_have_messages()
    {
        $this->alert->flash('success', false);

        $this->assertEquals(false, $this->alert->has());
    }

    private function getSessionMock()
    {
        $stubSession = $this->getMock('Peon\Session\Session');
        $stubSession->expects($this->any())->method('setFlash');
        $stubSession->expects($this->any())->method('getFlash')->will($this->returnValue('message'));

        return $stubSession;
    }
}
