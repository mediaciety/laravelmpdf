<?php

namespace Mediaciety\LaravelMpdf;

use View;
use File;

class PdfWrapper
{
    /**
     * @param $html
     * @param array $config
     * @return Pdf
     */
    public function loadHTML($html, $config = []){
        return new Pdf($html, $config);
    }

    /**
     * @param $view
     * @param array $data
     * @param array $mergeData
     * @param array $config
     * @return Pdf
     */
    public function loadView($view, $data = [], $mergeData = [], $config = []){
        return new Pdf(View::make($view, $data, $mergeData)->render(), $config);
    }
}
