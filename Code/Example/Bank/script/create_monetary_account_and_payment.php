<?php
require_once 'autoload.php';

use bunq\phava\example\bank\object\Iban;
use bunq\phava\example\bank\object\MonetaryAccountBank;
use bunq\phava\example\bank\object\MonetaryAccountSavings;
use bunq\phava\example\bank\object\Name;
use bunq\phava\example\bank\object\Payment;
use bunq\phava\example\bank\object\PhavaNumber;
use bunq\phava\example\bank\util\PaymentUtil;
use bunq\phava\example\bank\util\Util;

/**
 * Monetary account bank constants.
 */
const MONETARY_ACCOUNT_BANK_IBAN = 'NL12BUNQ34567890';
const MONETARY_ACCOUNT_BANK_NAME = 'A. Niknam';

/**
 * Interest constants.
 */
const INTEREST_RATE_BUNQ = 27.0;

/**
 * Amount constants.
 */
const AMOUNT_PAYMENT = 25;

$monetaryAccountBank = new MonetaryAccountBank(
    Util::generateIdRandom(),
    new Iban(MONETARY_ACCOUNT_BANK_IBAN),
    new Name(MONETARY_ACCOUNT_BANK_NAME)
);

$monetaryAccountSavings = new MonetaryAccountSavings(
    Util::generateIdRandom(),
    new Iban(MONETARY_ACCOUNT_BANK_IBAN),
    new Name(MONETARY_ACCOUNT_BANK_NAME),
    new PhavaNumber(INTEREST_RATE_BUNQ)
);

$paymentToSavingsAccount = new Payment($monetaryAccountBank, $monetaryAccountSavings, new PhavaNumber(AMOUNT_PAYMENT));
$paymentToSavingsAccount = PaymentUtil::executePayment($paymentToSavingsAccount);
