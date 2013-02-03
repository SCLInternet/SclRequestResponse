<?php

namespace RequestResponse\Communicator;

class PersistentCommunicatorTest extends \PHPUnit_Framework_TestCase
{
    const RESPONSE_ENDING = '!</response>!';
    private $communicator;
    private $socket;

    protected function setUp()
    {
        $this->socket = $this->getMock('BasicSocket\SocketInterface');

        $this->communicator = new PersistentCommunicator($this->socket, self::RESPONSE_ENDING);
    }

    public function testConnect()
    {
    }
}
