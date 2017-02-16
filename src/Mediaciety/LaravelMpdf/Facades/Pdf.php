<?php
/**
 * Created by PhpStorm.
 * User: haged
 * Date: 15.02.2017
 * Time: 13:34
 */

namespace Mediaciety\LaravelMpdf\Facades;

Use Illuminate\Support\Facades\Facade;

class Pdf extends Facade
{
    protected static function getFacadeAccessor()
    {
        return "mpdf.wrapper";
    }
}
