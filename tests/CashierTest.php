<?php

namespace Kata\Tests;

use Kata\Clock;
use Kata\Printer;
use Kata\Repository;
use Kata\Cashier;
use PHPUnit\Framework\TestCase;

class CashierTest extends TestCase
{
    public function test_can_prints_movements_after_2_deposits_and_1_withdrawal()
    {
        //Mock Printer.
        $printer = $this->getMockBuilder(Printer::class)
            ->setMethods(['print'])
            ->getMock();

        $printer
            ->expects($this->exactly(4))
            ->method('print')
            ->withConsecutive(
                [$this->equalTo("date || credit || debit || balance")],
                [$this->equalTo("14/01/2012 || || 500.00 || 2500.00")],
                [$this->equalTo("13/01/2012 || 2000.00 || || 3000.00")],
                [$this->equalTo("10/01/2012 || 1000.00 || || 1000.00")]
            );

        //Stub Clock.
        $clock = $this->createMock(Clock::class);
        $clock
            ->method('now')
            ->will($this->onConsecutiveCalls(
                '14/01/2012',
                '13/01/2012',
                '10/01/2012'
            ));

        $cashier = new Cashier($clock, $printer, new Repository());

        $cashier->makeDeposit(1000);
        $cashier->makeDeposit(2000);
        $cashier->makeWithdrawal(500);

        $cashier->printMovements();
    }


}