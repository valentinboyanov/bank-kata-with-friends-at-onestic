<?php
namespace Kata\Tests;
use Kata\Cashier;

class CashierUnitTest extends \PHPUnit\Framework\TestCase
{
    public function test_can_make_a_deposit()
    {
        $cashier = new Cashier();

        $cashier->makeDeposit(1000);

        $this->assertEquals(1000, $cashier->getBalance());
    }

    public function test_can_make_two_deposits()
    {
        $cashier = new Cashier();

        $cashier->makeDeposit(1000);
        $cashier->makeDeposit(1000);

        $this->assertEquals(2000, $cashier->getBalance());
    }

    public function test_can_make_deposit_with_current_date()
    {

    }
}