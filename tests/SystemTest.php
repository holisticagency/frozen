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

use HolisticAgency\Frozen\System;
use PHPUnit\Framework\TestCase;

/**
 * @covers HolisticAgency\Frozen\System
 */
class SystemTest extends TestCase
{
    public function testFreeSpace()
    {
        // Given
        $system = new System();

        // When
        $actual = $system->freeSpace(__DIR__);

        // Then
        $this->assertEquals(disk_free_space(__DIR__), $actual);
    }

    public function testDocumentRoot()
    {
        // Given
        $system = new System();

        // When
        $actual = $system->documentRoot();

        // Then
        $this->assertEquals('/var/www/html', $actual);
    }

    public function testPid()
    {
        // Given
        $system = new System();

        // When
        $actual = $system->pid();

        // Then
        $this->assertEquals(getmypid(), $actual);
    }
}
