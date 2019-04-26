<?php
Class Ib_Pdf{

    public $pdf;

    public $font;

    public $html;

    public $file_name;


    public function __construct($page_type='A4')
    {
        $this->html = '';
        $this->file_name = date('Y-m-d') . _raid(4) . '.pdf';

        global $config;

        define('_MPDF_PATH','system/lib/mpdf/');

        require('system/lib/mpdf/mpdf.php');

        $pdf_c = '';
        $this->font = 'dejavusanscondensed';
        if($config['pdf_font'] == 'default'){
            $pdf_c = 'c';
            $this->font = 'Helvetica';
        }

        $mpdf=new mPDF($pdf_c,'A4','','',20,15,15,25,10,10);
        $mpdf->SetTitle($config['CompanyName']);
        $mpdf->SetAuthor($config['CompanyName']);
        $mpdf->SetDisplayMode('fullpage');

        if($config['pdf_font'] == 'AdobeCJK'){
            $mpdf->useAdobeCJK = true;
            $mpdf->autoScriptToLang = true;
            $mpdf->autoLangToFont = true;
        }


        $this->pdf = $mpdf;



    }

    public function from($html){
        $this->pdf->WriteHTML($html);
        return $this;
    }


    public function setWaterMark($text){

        $this->pdf->SetWatermarkText($text);
        $this->pdf->showWatermarkText = true;
        $this->pdf->watermark_font = $this->font;
        $this->pdf->watermarkTextAlpha = 0.1;

        return $this;

    }

    public function setFileName($file_name){

        $this->file_name = $file_name. '.pdf';

        return $this;

    }



    public function download(){
        $this->pdf->Output($this->file_name, 'D'); # D
    }

    public function display(){
        $this->pdf->Output($this->file_name, 'I'); # D
    }

    public function store($path){
        $this->pdf->Output($path.$this->file_name, 'F');
    }



}