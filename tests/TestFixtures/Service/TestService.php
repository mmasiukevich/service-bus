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

namespace Desperado\Framework\Tests\TestFixtures\Service;

use Desperado\Framework\Infrastructure\CQRS\Context\LocalContext;
use Desperado\Framework\Tests\TestFixtures\Commands\SomeCommand;
use Desperado\Framework\Tests\TestFixtures\Events\SomeEvent;

/**
 *
 */
class TestService
{
    public static function somePublicStatic(): void
    {

    }

    /**
     *
     *
     * @param SomeEvent    $event
     * @param LocalContext $context
     *
     * @return void
     */
    public function whenSomeEvent(SomeEvent $event, LocalContext $context): void
    {
        self::somePublicStatic();
    }

    /**
     *
     *
     * @param SomeCommand  $command
     * @param LocalContext $context
     *
     * @return void
     */
    public function someCommand(SomeCommand $command, LocalContext $context): void
    {
        $this->someProtectedMethod();
    }

    /**
     * @return void
     */
    protected function someProtectedMethod(): void
    {
        $this->somePrivateMethod();
    }

    /**
     * @return void
     */
    private function somePrivateMethod(): void
    {

    }
}