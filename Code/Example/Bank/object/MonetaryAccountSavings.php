<?php
namespace bunq\phava\example\bank\object;

/**
 * @author Nick van de Groes <nick@bunq.com>
 * @since 20200115 Initial creation.
 */
class MonetaryAccountSavings extends MonetaryAccount
{
    /**
     * @var Number
     */
    protected $interestRate;

    /**
     * @param Id $id
     * @param Iban $iban
     * @param Name $name
     * @param PhavaNumber $interestRate
     */
    public function __construct(Id $id, Iban $iban, Name $name, PhavaNumber $interestRate)
    {
        parent::__construct($id, $iban, $name);

        $this->interestRate = $interestRate;
    }

    /**
     * @return PhavaNumber
     */
    public function getInterestRate(): PhavaNumber
    {
        return $this->interestRate;
    }
}
