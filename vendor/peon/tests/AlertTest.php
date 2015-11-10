<?php

namespace Peon;

use PeonTestCase;

class AlertTest extends PeonTestCase
{
    public function test_alert_can_set_a_flash_message()
    {
        $stub = $this->getSessionMock(true, 'success message');
        $this->alert = new Alert($stub);

        $this->alert->flash('success', 'success message');

        $this->assertEquals('success message', $stub->getFlash('success'));
    }

    public function test_alert_can_get_all_flash_messages()
    {
        $stub = $this->getSessionMock(true, array('success' => 'success message'));
        $this->alert = new Alert($stub);

        $messages = $this->alert->all();

        $this->assertEquals(array('success' => 'success message'), $messages);
    }

    public function test_that_alert_has_messages()
    {
        $stub = $this->getSessionMock(true);
        $this->alert = new Alert($stub);

        $this->assertEquals(true, $this->alert->has());
    }

    public function test_that_alert_does_not_have_messages()
    {
        $stub = $this->getSessionMock(false);
        $this->alert = new Alert($stub);

        $this->assertEquals(false, $this->alert->has());
    }

    private function getSessionMock($hasMessages, $returnValue = null)
    {
        $stub = $this->getMockBuilder('Peon\Session\Session')
                     ->getMock();

        $stub->method('has')
             ->willReturn($hasMessages);

        $stub->method('getFlash')
             ->willReturn($returnValue);

        $stub->method('all')
             ->willReturn($returnValue);

        return $stub;
    }
}
