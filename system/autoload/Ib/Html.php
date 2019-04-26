<?php
Class Ib_Html{

    public static function toText($html){

        $rules = array ('@<script[^>]*?>.*?</script>@si',
            '@<[\/\!]*?[^<>]*?>@si',
            '@([\r\n])[\s]+@',
            '@&(quot|#34);@i',
            '@&(amp|#38);@i',
            '@&(lt|#60);@i',
            '@&(gt|#62);@i',
            '@&(nbsp|#160);@i',
            '@&(iexcl|#161);@i',
            '@&(cent|#162);@i',
            '@&(pound|#163);@i',
            '@&(copy|#169);@i',
            '@&(reg|#174);@i',
            '@&#(d+);@e'
        );
        $replace = array ('',
            '',
            '',
            '',
            '&',
            '<',
            '>',
            ' ',
            chr(161),
            chr(162),
            chr(163),
            chr(169),
            chr(174),
            'chr()'
        );
        return preg_replace($rules, $replace, $html);

    }

    public static function fromMarkdown($md){

        $Parsedown = new Parsedown();

        return $Parsedown->text($md);

    }



}