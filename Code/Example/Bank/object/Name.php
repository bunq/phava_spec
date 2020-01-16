<?php
namespace bunq\phava\example\bank\object;

/**
 * @author Nick van de Groes <nick@bunq.com>
 * @since 20200115 Initial creation.
 */
class Name
{
    /**
     * Error constants.
     */
    const ERROR_NAME_INVALID = 'The provided name is not valid.';

    /**
     * @var string
     */
    protected $nameString;

    /**
     * @param string $nameString
     */
    public function __construct(string $nameString)
    {
        static::assertNameValid($nameString);

        $this->nameString = $nameString;
    }

    /**
     * @return string
     */
    public function getNameString(): string
    {
        return $this->nameString;
    }

    /**
     * @param string $nameString
     *
     * @return bool
     * @throws PhavaException
     */
    private static function assertNameValid(string $nameString): bool
    {
        // NOTE: This is just an example, you should of course add actual name validation here.
        if (strlen($nameString) > 0) {
            return true;
        } else {
            throw new PhavaException(self::ERROR_NAME_INVALID);
        }
    }
}
