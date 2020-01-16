<?php
namespace bunq\phava\example\bank\util;

use bunq\phava\example\bank\object\Id;

/**
 * @author Nick van de Groes <nick@bunq.com>
 * @since 20200115 Initial creation.
 */
abstract class Util
{
    /**
     * @return Id
     */
    public static function generateIdRandom(): Id
    {
        return new Id(mt_rand(0, 100000));
    }
}
