<?php

namespace Adisa\PerfectMoney;


/**
 * @see \Adisa\PerfectMoney\PerfectMoney
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
