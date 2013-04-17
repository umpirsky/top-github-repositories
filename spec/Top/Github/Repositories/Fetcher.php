<?php

namespace spec\Top\Github\Repositories;

use PHPSpec2\ObjectBehavior;

class Fetcher extends ObjectBehavior
{
    /**
     * @param Github\Client   $github
     * @param Github\Api\Repo $repo
     */
    function let($github, $repo)
    {
        $github->api('repo')->willReturn($repo);

        $this->beConstructedWith(
            array(
                'Sylius'  => 'Sylius',
                'Symfony' => 'Symfony',
            ),
            $github
        );
    }

    function it_orders_repositories_by_watchers_count($repo)
    {
        $repo->show('Sylius', 'Sylius')->shouldBeCalled()->willReturn(array('watchers_count' => 9999999));
        $repo->show('Symfony', 'Symfony')->shouldBeCalled()->willReturn(array('watchers_count' => 66666666));

        $this->fetch()->shouldReturn(array(
            array('watchers_count' => 66666666),
            array('watchers_count' => 9999999),
        ));
    }
}
