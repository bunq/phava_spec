<?php
namespace bunq\phava\example\bank\object;

/**
 * @author Nick van de Groes <nick@bunq.com>
 * @since 20200115 Initial creation.
 */
class Payment
{
    /**
     * Error constants.
     */
    const ERROR_MONETARY_ACCOUNT_EQUAL = 'Can\'t make a payment between a single monetary account.';

    /**
     * @var MonetaryAccount
     */
    protected $monetaryAccount;

    /**
     * @var MonetaryAccount
     */
    protected $monetaryAccountCounterparty;

    /**
     * @var PhavaNumber
     */
    protected $amount;

    /**
     * @param MonetaryAccount $monetaryAccount
     * @param MonetaryAccount $monetaryAccountCounterparty
     * @param PhavaNumber $amount
     */
    public function __construct(
        MonetaryAccount $monetaryAccount,
        MonetaryAccount $monetaryAccountCounterparty,
        PhavaNumber $amount
    ) {
        static::assertMonetaryAccountNotEqual($monetaryAccount, $monetaryAccountCounterparty);

        $this->monetaryAccount = $monetaryAccount;
        $this->monetaryAccountCounterparty = $monetaryAccountCounterparty;
        $this->amount = $amount;
    }

    /**
     * @return PhavaNumber
     */
    public function getAmount(): PhavaNumber
    {
        return $this->amount;
    }

    /**
     * @return MonetaryAccount
     */
    public function getMonetaryAccount(): MonetaryAccount
    {
        return $this->monetaryAccount;
    }

    /**
     * @return MonetaryAccount
     */
    public function getMonetaryAccountCounterparty(): MonetaryAccount
    {
        return $this->monetaryAccountCounterparty;
    }

    /**
     * @param MonetaryAccount $monetaryAccount
     * @param MonetaryAccount $monetaryAccountCounterparty
     *
     * @return bool
     * @throws PhavaException
     */
    private static function assertMonetaryAccountNotEqual(
        MonetaryAccount $monetaryAccount,
        MonetaryAccount $monetaryAccountCounterparty
    ): bool {
        if ($monetaryAccount->equals($monetaryAccountCounterparty)) {
            throw new PhavaException(self::ERROR_MONETARY_ACCOUNT_EQUAL);
        } else {
            return true;
        }
    }
}
