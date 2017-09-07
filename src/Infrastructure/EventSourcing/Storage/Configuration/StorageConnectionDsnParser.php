<?php

/**
 * Command Query Responsibility Segregation, Event Sourcing implementation
 *
 * @author  Maksim Masiukevich <desperado@minsk-info.ru>
 * @url     https://github.com/mmasiukevich
 * @license MIT
 * @license https://opensource.org/licenses/MIT
 */

declare(strict_types = 1);

namespace Desperado\Framework\Infrastructure\EventSourcing\Storage\Configuration;

use Desperado\Framework\Domain\ParameterBag;

/**
 * Connection DSN parser
 */
class StorageConnectionDsnParser
{
    /**
     * Parse DSN string
     *
     * @param string $connectionDSN
     *
     * @return ParameterBag
     */
    public static function parse(string $connectionDSN): ParameterBag
    {
        $queryParts = [];
        $parsedUrl = new ParameterBag(\parse_url($connectionDSN));

        \parse_str($parsedUrl->getAsString('query'), $queryParts);

        $parametersBag = new ParameterBag($queryParts);

        $parametersBag->set('host', $parsedUrl->getAsString('path'));
        $parametersBag->set('driver', $parsedUrl->getAsString('scheme', 'inMemory'));

        return $parametersBag;
    }

    /**
     * Close constructor
     *
     * @codeCoverageIgnore
     */
    private function __construct()
    {

    }
}
