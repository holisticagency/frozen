<?php

declare(strict_types=1);

/*
 * This file is part of holisticagency/frozen.
 *
 * (c) JamesRezo <james@rezo.net>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace HolisticAgency\Frozen;

class FrozenSystem implements SystemInterface
{
    /** @param array<string, string> $remotes */
    public function __construct(
        protected string $sapi,
        protected string $version,
        protected array $extensions,
        protected string $hostname,
        protected string $ipV4,
        protected string $httpHost,
        protected array $remotes
    ) {
    }

    public function sapi(): string
    {
        return $this->sapi;
    }

    public function version(): string
    {
        return $this->version;
    }

    public function extensions(): array
    {
        return $this->extensions;
    }

    public function hostname(): string
    {
        return $this->hostname;
    }

    public function ipV4(): string
    {
        return $this->ipV4;
    }

    public function httpHost(): string
    {
        return $this->httpHost;
    }

    public function resolve(string $remote): string
    {
        return array_key_exists($remote, $this->remotes) ? $this->remotes[$remote] : '';
    }
}
