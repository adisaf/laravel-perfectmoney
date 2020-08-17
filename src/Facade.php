<?php

namespace Adisaf\PerfectMoney;

/**
 * @see \Adisaf\PerfectMoney\PerfectMoney
 */
class Facade extends \Illuminate\Support\Facades\Facade
{
    /**
     * {@inheritDoc}
     */
    protected static function getFacadeAccessor()
    {
        return PerfectMoney::class;
    }
}
