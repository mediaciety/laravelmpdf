<?php
/**
 * Created by PhpStorm.
 * User: haged
 * Date: 15.02.2017
 * Time: 10:28
 */

namespace Mediaciety\LaravelMpdf;

use Config;
use mPDF;

class Pdf
{
    protected $config = [];

    public function __construct($html, $config = [])
    {
        $this->config = $config;

        $this->mpdf = new mPDF(
            $this->getConfig('mode'),
            $this->getConfig('format'),
            $this->getConfig('default_font_size'),
            $this->getConfig('default_font'),
            $this->getConfig('margin_left'),
            $this->getConfig('margin_right'),
            $this->getConfig('margin_top'),
            $this->getConfig('margin_bottom'),
            $this->getConfig('margin_header'),
            $this->getConfig('margin_footer'),
            $this->getConfig('orientation')
        );

        $this->mpdf->SetTitle($this->getConfig('title'));
        $this->mpdf->SetAuthor($this->getConfig('author'));
        $this->mpdf->SetWatermarkText($this->getConfig('watermark'));
        $this->mpdf->SetDisplayMode($this->getConfig('display_mode'));
        $this->mpdf->showWatermarkText  = $this->getConfig('show_watermark');
        $this->mpdf->watermark_font     = $this->getConfig('watermark_font');
        $this->mpdf->watermarkTextAlpha = $this->getConfig('watermark_text_alpha');
        $this->mpdf->showImageErrors = true;
        $this->mpdf->WriteHTML($html);

    }

    protected function getConfig($key) {
        if (isset($this->config[$key])) {
            return $this->config[$key];
        } else {

            return Config::get('pdf.' . $key);
        }
    }

    public function output(){
        return $this->mpdf->Output('', 'S');
    }

    public function download($filename = 'mypdf.pdf'){
        return $this->mpdf->Output($filename, 'D');
    }

    public function stream($filename = "mypdf.pdf"){
        return $this->mpdf->Output($filename, 'I');
    }

    public function save($filename = "mypdf.pdf"){
        return $this->mpdf->Output($filename, 'S');
    }
}
