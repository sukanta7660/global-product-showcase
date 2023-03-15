<?php

namespace App\Traits;


trait MoneyCalculator
{
    private int $scale = 2;

    /**
     * Adds numbers
     *
     * @param int|float|string ...$nums Numerics to add
     * @return string
     */
    public function add(int|float|string ...$nums) :string
    {
        return collect($nums)->reduce(fn($total, $num) => bcadd($total, $num, $this->scale), 0);
    }

    /**
     * Subtracts numbers
     *
     * @param int|float|string ...$nums Numerics to subtract
     * @return string
     */
    public function sub(int|float|string ...$nums) :string
    {
        return collect($nums)->reduce(fn($total, $num) => ($total > 0) ? bcsub($total, $num, $this->scale) : $this->add($num), 0);
    }

    /**
     * Multiplies numbers
     *
     * @param int|float|string ...$nums Numerics to multiply
     * @return string
     */
    public function mul(int|float|string ...$nums) :string
    {
        return collect($nums)->reduce(fn($total, $num) => bcmul($total, $num, $this->scale), 1);
    }

    /**
     * Divide numbers
     *
     * @param int|float|string ...$nums Numerics to divide
     * @return string
     */
    public function div(int|float|string ...$nums) :string
    {
        return collect($nums)->reduce(function ($total, $num) {

            if ($total === false) {
                return $num;
            }

            return bcdiv($total, $num, $this->scale);

        }, false);
    }

    /**
     * Get how much percentage is a $value of $baseValue
     *
     * @param int|float|string $baseValue
     * @param int|float|string $value
     * @return string   calculated percentage
     */
    public function getPercent(int|float|string $baseValue, int|float|string $value) :string
    {
        $d = bcmul($value, 100, 4);
        return bcdiv($d, $baseValue, 4);
    }

    /**
     * Get how much value is $percent of $baseValue
     *
     * @param int|float|string $baseValue
     * @param int|float|string $percent
     * @return string   calculated value
     */
    public function getPercentValue(int|float|string $baseValue, int|float|string $percent) :string
    {
        $d = bcdiv($baseValue, 100, 4);
        return bcmul($d, $percent, 4);
    }

    /**
     * Set decimal precision for the calculation
     *
     * @param int $decimal
     */
    public function setDecimalPrecision(int $decimal = 2) :void
    {
        $this->scale = $decimal;
    }

    public function formatMoney($amount) :string
    {
        return $this->div($amount, 100);
    }

    public function moneySetter($amount) :string
    {
        return $this->mul($amount, 100);
    }
}
