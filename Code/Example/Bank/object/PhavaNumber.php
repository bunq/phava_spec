<?php
namespace bunq\phava\example\bank\object;

/**
 * @author Nick van de Groes <nick@bunq.com>
 * @since 20200115 Initial creation.
 */
class PhavaNumber
{
    /**
     * @var int
     */
    protected $value;

    /**
     * @param int $value
     */
    public function __construct(int $value)
    {
        $this->value = $value;
    }

    /**
     * @param PhavaNumber $number
     *
     * @return PhavaNumber
     */
    public function add(PhavaNumber $number): PhavaNumber
    {
        return new PhavaNumber($this->value + $number->value);
    }

    /**
     * @param PhavaNumber $number
     *
     * @return PhavaNumber
     */
    public function subtract(PhavaNumber $number): PhavaNumber
    {
        return new PhavaNumber($this->value - $number->value);
    }

    /**
     * @return int
     */
    public function getNumberInt(): int
    {
        return $this->value;
    }
}
