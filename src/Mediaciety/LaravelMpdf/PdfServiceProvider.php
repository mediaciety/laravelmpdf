<?php
/**
 * Created by PhpStorm.
 * User: haged
 * Date: 15.02.2017
 * Time: 13:37
 */

namespace Mediaciety\LaravelMpdf;

use Illuminate\Support\ServiceProvider;

class PdfServiceProvider extends ServiceProvider
{
    protected $defer = true;

    /**
     *
     */
    public function register(){

        $cfgFile = __DIR__.'/../../config/pdf.php';
        $cfgTag = 'pdf';

        $this->mergeConfigFrom($cfgFile, $cfgTag);

        $this->publishes([
            $cfgFile => config_path('pdf.php')
        ], $cfgTag);

        $this->app->bind('mpdf.wrapper', 'Mediaciety\LaravelMpdf\PdfWrapper');
    }

    /**
     * @return array
     */
    public function provides(){

        return [
            'mpdf.wrapper'
        ];
    }
}
