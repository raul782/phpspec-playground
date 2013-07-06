<?php

namespace spec\D4m\PhpSpecPlayGround\Service;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class ServiceWithEntitySpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('D4m\PhpSpecPlayGround\Service\ServiceWithEntity');
    }

    /**
     * @param D4m\PhpSpecPlayGround\Entity\EntityA $entityA
     */
    function it_should_return_response_when_executing_service($entityA)
    {
        $entityA->getMemberA()->shouldBeCalled()->willReturn("memberA");
        $this->setEntity($entityA);
        $response = "memberA";

        $this->execute()->shouldReturn($response);
    }
}
