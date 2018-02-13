<?php
namespace Kata\Tests;
use Kata\Cashier;
use Kata\Clock;

class CashierUnitTest extends \PHPUnit\Framework\TestCase
{
    const ANY_AMOUNT       = 1000;
    const ANY_OTHER_AMOUNT = 1000;

    /** @var Cashier */
    private $cashier;

    /** @var Clock */
    private $clockMock;

    public function setUp()
    {
        parent::setUp();

        $this->clockMock = $this->createMock(Clock::class);
        $this->clockMock
            ->method('now')
            ->willReturn('2018-02-13');

        $this->cashier = new Cashier($this->clockMock);
    }

    public function tearDown()
    {
        parent::tearDown();
    }

    public function test_can_make_a_deposit()
    {
        $this->cashier->makeDeposit(self::ANY_AMOUNT);

        $this->assertEquals(self::ANY_AMOUNT, $this->cashier->getBalance());
    }

    public function test_can_make_two_deposits()
    {
        $expectedBalance = self::ANY_AMOUNT + self::ANY_OTHER_AMOUNT;

        $this->cashier->makeDeposit(self::ANY_AMOUNT);
        $this->cashier->makeDeposit(self::ANY_OTHER_AMOUNT);

        $this->assertEquals($expectedBalance, $this->cashier->getBalance());
    }

    public function test_can_get_last_deposit_date()
    {
        $this->cashier->makeDeposit(self::ANY_AMOUNT);

        $this->assertEquals($this->clockMock->now(), $this->cashier->getLastDepositDate());
    }
}