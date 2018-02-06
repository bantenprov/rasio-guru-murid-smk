<?php namespace Bantenprov\RasioGMSMK\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * The RasioGMSMK facade.
 *
 * @package Bantenprov\RasioGMSMK
 * @author  bantenprov <developer.bantenprov@gmail.com>
 */
class RasioGMSMK extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'rasio-guru-murid-smk';
    }
}
