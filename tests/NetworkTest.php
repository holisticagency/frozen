<?php

/*
 * This file is part of holisticagency/frozen.
 *
 * (c) JamesRezo <james@rezo.net>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace HolisticAgency\Frozen\Tests;

use HolisticAgency\Frozen\Network;
use PHPUnit\Framework\TestCase;

/**
 * @covers HolisticAgency\Frozen\Network
 */
class NetworkTest extends TestCase
{
    public function testHostname()
    {
        // Given
        $system = new Network();

        // When
        $actual = $system->hostname();

        // Then
        $this->assertEquals(gethostname(), $actual);
    }

    public function testIpV4()
    {
        // Given
        $system = new Network();

        // When
        $actual = $system->ipV4();

        // Then
        $this->assertEquals(gethostbyname(gethostname()), $actual);
    }

    public function testHttpHost()
    {
        // Given
        $system = new Network();

        // When
        $actual = $system->httpHost();

        // Then
        $this->assertEquals('frozen.tld', $actual);
    }

    public function testRemotes()
    {
        // Given
        $system = new Network();

        // When
        $actual = $system->remotes();

        // Then
        $this->assertEquals([], $actual);
    }

    public function dataResolve()
    {
        return [
            'unresolved' => [
                '',
                'www.'.md5(mt_rand()).'.'.substr(md5(mt_rand()), 0, 3),
            ],
            'resolved' => [
                gethostbyname(gethostname()),
                gethostname(),
            ],
        ];
    }

    /**
     * @dataProvider dataResolve
     */
    public function testResolve($expected, $remote)
    {
        // Given
        $system = new Network();

        // When
        $actual = $system->resolve($remote);

        // Then
        $this->assertEquals($expected, $actual);
    }
}
