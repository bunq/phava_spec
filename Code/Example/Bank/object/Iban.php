<?php
namespace bunq\phava\example\bank\object;

/**
 * @author Nick van de Groes <nick@bunq.com>
 * @since 20200115 Initial creation.
 */
class Iban
{
    /**
     * Error constants.
     */
    const ERROR_IBAN_INVALID = 'The provided IBAN is not valid.';

    /**
     * @var string
     */
    protected $ibanString;

    /**
     * @param string $ibanString
     */
    public function __construct(string $ibanString)
    {
        static::assertIbanValid($ibanString);

        $this->ibanString = $ibanString;
    }

    /**
     * @return string
     */
    public function getIbanString(): string
    {
        return $this->ibanString;
    }

    /**
     * @param string $ibanString
     *
     * @return bool
     * @throws PhavaException
     */
    private static function assertIbanValid(string $ibanString): bool
    {
        // NOTE: This is just an example, you should of course add actual IBAN validation here.
        if (strlen($ibanString) > 0) {
            return true;
        } else {
            throw new PhavaException(self::ERROR_IBAN_INVALID);
        }
    }
}
