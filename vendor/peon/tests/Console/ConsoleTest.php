<?php

namespace Peon\Console;

use PeonTestCase;

class ConsoleTest extends PeonTestCase
{
    public function test_console_can_colorize_a_string()
    {
        $console = new Console(3, array('clid', 'test-command', 'success'));

        echo $console->colorizeString('foo', 'green', 'yellow');

        $this->expectOutputString(
            pack('H*', '1b5b303b33326d1b5b34336d666f6f1b5b306d')
        );
    }

    public function test_console_can_dispatch_a_command()
    {
        $console = new Console(3, array('clid', 'test-command', 'success'));

        $console->dispatch();

        $this->expectOutputString(
            pack('H*', '1b5b303b33326d73756363657373206d6573736167650a1b5b306d')
        );
    }

    public function test_console_shows_fatal_message_when_command_not_found()
    {
        $console = new Console(3, array('clid', 'not-found'));

        $console->dispatch();

        // 'Command 'foo' not found'
        $this->expectOutputString(
            pack('H*', '1b5b313b33316d436f6d6d616e6420276e6f742d666f756e6427206e6f7420666f756e640a1b5b306d')
        );
    }

    public function test_console_can_show_success_message()
    {
        $console = new Console(3, array('clid', 'test-command', 'success'));

        $console->dispatch();

        // outputs: "success message" in green
        $this->expectOutputString(
            pack('H*', '1b5b303b33326d73756363657373206d6573736167650a1b5b306d')
        );
    }

    public function test_console_can_show_warning_message()
    {
        $console = new Console(3, array('clid', 'test-command', 'warning'));

        $console->dispatch();

        // outputs: "warning message" in yellow
        $this->expectOutputString(
            pack('H*', '1b5b313b33336d7761726e696e67206d6573736167650a1b5b306d')
        );
    }
}
