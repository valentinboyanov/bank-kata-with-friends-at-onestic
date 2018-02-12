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

    public function __construct(Clock $clock, Printer $printer, Repository $repository)
    {
        $this->clock = $clock;
        $this->printer = $printer;
        $this->repository = $repository;
    }

    public function makeDeposit($qty)
    {
    }

    public function makeWithdrawal($qty)
    {
    }

    public function printMovements()
    {
    }
}