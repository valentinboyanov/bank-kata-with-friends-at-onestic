<?php

namespace Kata;

class Cashier
{
    /**
     * @var Clock
     */
    private $clock;
    /**
     * @var Printer
     */
    private $printer;
    /**
     * @var Repository
     */
    private $repository;

    private $balance = 0;

    private $lastDepositDate;

    public function __construct(Clock $clock = null, Printer $printer = null, Repository $repository = null)
    {
        $this->clock      = $clock;
        $this->printer    = $printer;
        $this->repository = $repository;
    }

    public function makeDeposit($quantity)
    {
        $this->balance += $quantity;
        $this->lastDepositDate = $this->clock->now();
    }

    public function makeWithdrawal($qty)
    {
    }

    public function printMovements()
    {
    }

    public function getBalance()
    {
        return $this->balance;
    }

    public function getLastDepositDate()
    {
        return $this->lastDepositDate;
    }

}