<?php
namespace bunq\phava\example\bank\util;

use bunq\phava\example\bank\object\Id;
use bunq\phava\example\bank\object\MonetaryAccount;
use bunq\phava\example\bank\object\MonetaryAccountBank;
use bunq\phava\example\bank\object\MonetaryAccountSavings;
use bunq\phava\example\bank\object\Payment;
use bunq\phava\example\bank\object\PhavaException;

/**
 * @author Nick van de Groes <nick@bunq.com>
 * @since 20200115 Initial creation.
 */
abstract class PaymentUtil
{
    /**
     * Error constants.
     */
    const ERROR_MONETARY_ACCOUNT_NOT_SUPPORTED = 'Monetary account of type "%s" is not supported for payments.';

    /**
     * @param Payment $payment
     *
     * @return Payment
     */
    public static function executePayment(Payment $payment): Payment
    {
        static::assertMonetaryAccountValidForPayment($payment->getMonetaryAccount());
        static::assertMonetaryAccountValidForPayment($payment->getMonetaryAccountCounterparty());

        $balanceBeforePayment = $payment->getMonetaryAccount()->getBalance();
        $balanceCounterpartyBeforePayment = $payment->getMonetaryAccountCounterparty()->getBalance();

        $payment->getMonetaryAccount()->setBalance($balanceBeforePayment->subtract($payment->getAmount()));
        $payment->getMonetaryAccountCounterparty()
            ->setBalance($balanceCounterpartyBeforePayment->add($payment->getAmount()));

        return $payment;
    }

    /**
     * @param MonetaryAccount $monetaryAccount
     *
     * @return bool
     * @throws PhavaException
     */
    private static function assertMonetaryAccountValidForPayment(MonetaryAccount $monetaryAccount): bool
    {
        if ($monetaryAccount instanceof MonetaryAccountBank) {
            return true;
        } elseif ($monetaryAccount instanceof MonetaryAccountSavings) {
            return true;
        } else {
            throw new PhavaException(
                vsprintf(self::ERROR_MONETARY_ACCOUNT_NOT_SUPPORTED, [get_class($monetaryAccount)])
            );
        }
    }
}
