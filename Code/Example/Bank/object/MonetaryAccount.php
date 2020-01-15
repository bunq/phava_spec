<?php
namespace bunq\phava\example\bank\object;

/**
 * @author Nick van de Groes <nick@bunq.com>
 * @since 20200115 Initial creation.
 */
abstract class MonetaryAccount
{
    /**
     * @var Id
     */
    protected $id;

    /**
     * @var Iban
     */
    protected $iban;

    /**
     * @var Name
     */
    protected $name;

    /**
     * @var PhavaNumber
     */
    protected $balance;

    /**
     * @param Id $id
     * @param Iban $iban
     * @param Name $name
     */
    public function __construct(Id $id, Iban $iban, Name $name)
    {
        $this->id = $id;
        $this->iban = $iban;
        $this->name = $name;

        $this->balance = new PhavaNumber(0);
    }

    /**
     * @return Id
     */
    public function getId(): Id
    {
        return $this->id;
    }

    /**
     * @return PhavaNumber
     */
    public function getBalance(): PhavaNumber
    {
        return $this->balance;
    }

    /**
     * @param PhavaNumber $balance
     */
    public function setBalance(PhavaNumber $balance): void
    {
        $this->balance = $balance;
    }

    /**
     * @param MonetaryAccount|null $other
     *
     * @return bool
     */
    public function equals(MonetaryAccount $other = null): bool
    {
        if (is_null($other)) {
            return false;
        } else {
            return $this->getId() === $other->getId();
        }
    }
}
