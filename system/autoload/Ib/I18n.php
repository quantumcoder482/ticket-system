<?php
// *************************************************************************
// *                                                                       *
// * iBilling -  Accounting, Billing Software                              *
// * Copyright (c) Sadia Sharmin. All Rights Reserved                      *
// *                                                                       *
// *************************************************************************
// *                                                                       *
// * Email: sadiasharmin3139@gmail.com                                                *
// * Website: http://www.sadiasharmin.com                                  *
// *                                                                       *
// *************************************************************************
// *                                                                       *
// * This software is furnished under a license and may be used and copied *
// * only  in  accordance  with  the  terms  of such  license and with the *
// * inclusion of the above copyright notice.                              *
// * If you Purchased from Codecanyon, Please read the full License from   *
// * here- http://codecanyon.net/licenses/standard                         *
// *                                                                       *
// *************************************************************************

Class Ib_I18n{

    public static function get_code($lan){

        if($lan == 'arabic'){
            return 'ar';
        }
        elseif($lan == 'azerbaijani'){
            return 'az';
        }

        elseif($lan == 'bengali'){
            return 'bn';
        }

        elseif($lan == 'catalan'){
            return 'ca';
        }
        elseif($lan == 'croatian'){
            return 'en';
        }

        elseif($lan == 'czech'){
            return 'cs';
        }
        elseif($lan == 'danish'){
            return 'da';
        }

//        elseif($lan == 'dutch'){
//            return 'da';
//        }

        // From v 4.2. Reported by- Marcel13

        elseif($lan == 'dutch'){
            return 'nl';
        }


        elseif($lan == 'en-us'){
            return 'en';
        }

        elseif($lan == 'farsi'){
            return 'fa';
        }

        elseif($lan == 'french'){
            return 'fr';
        }

        elseif($lan == 'german'){
            return 'de';
        }

        elseif($lan == 'hungarian'){
            return 'hu';
        }
        elseif($lan == 'italian'){
            return 'it';
        }

        elseif($lan == 'norwegian'){
            return 'no';
        }

        elseif($lan == 'portuguese-br'){
            return 'pt-br';
        }

        elseif($lan == 'portuguese-pt'){
            return 'pt';
        }

        elseif($lan == 'russian'){
            return 'ru';
        }

        elseif($lan == 'spanish'){
            return 'es';
        }

        elseif($lan == 'swedish'){
            return 'sw';
        }

        elseif($lan == 'turkish'){
            return 'tr';
        }

        elseif($lan == 'ukranian'){
            return 'ua';
        }

        elseif($lan == 'thai'){
            return 'th';
        }

        else{
            return $lan;
        }

    }


    public static function get_ef($lan){

        if($lan == 'arabic'){
            return 'ar';
        }
        elseif($lan == 'azerbaijani'){
            return 'az';
        }

        elseif($lan == 'bengali'){
            return 'bn';
        }

        elseif($lan == 'catalan'){
            return 'ca';
        }
        elseif($lan == 'croatian'){
            return 'en';
        }

        elseif($lan == 'czech'){
            return 'cs';
        }
        elseif($lan == 'danish'){
            return 'da';
        }

//        elseif($lan == 'dutch'){
//            return 'da';
//        }

        // From v 4.2. Reported by- Marcel13

        elseif($lan == 'dutch'){
            return 'nl';
        }


        elseif($lan == 'en-us'){
            return 'en';
        }

        elseif($lan == 'farsi'){
            return 'fa';
        }

        elseif($lan == 'french'){
            return 'fr';
        }

        elseif($lan == 'german'){
            return 'de';
        }

        elseif($lan == 'hungarian'){
            return 'hu';
        }
        elseif($lan == 'italian'){
            return 'it';
        }

        elseif($lan == 'norwegian'){
            return 'no';
        }

        elseif($lan == 'portuguese-br'){
            return 'pt_BR';
        }

        elseif($lan == 'portuguese-pt'){
            return 'pt';
        }

        elseif($lan == 'russian'){
            return 'ru';
        }

        elseif($lan == 'spanish'){
            return 'es';
        }

        elseif($lan == 'swedish'){
            return 'sw';
        }

        elseif($lan == 'turkish'){
            return 'tr';
        }

        elseif($lan == 'ukranian'){
            return 'ua';
        }

        elseif($lan == 'thai'){
            return 'th';
        }

        else{
            return $lan;
        }

    }



    public static function momentLocale($lan){

        switch ($lan){


            case 'en':

                return 'en';

                break;

            case 'ar':

                return 'ar-sa';

                break;

            case 'bengali':

                return 'bn';

                break;

            case 'azerbaijani':

                return 'az';

                break;

            case 'catalan':

                return 'ca';

                break;

            case 'croatian':

                return 'hr';

                break;

            case 'czech':

                return 'cs';

                break;

            case 'danish':

                return 'da';

                break;

            case 'dutch':

                return 'nl';

                break;


            case 'farsi':

                return 'en';

                break;

            case 'french':

                return 'fr';

                break;

            case 'german':

                return 'de';

                break;

            case 'hungarian':

                return 'hu';

                break;

            case 'italian':

                return 'it';

                break;

            case 'indonesian':

                return 'id';

                break;

            case 'norwegian':

                return 'nb';

                break;

            case 'portuguese-br':

                return 'pt-br';

                break;

            case 'portuguese-pt':

                return 'pt';

                break;

            case 'russian':

                return 'ru';

                break;

            case 'spanish':

                return 'es';

                break;

            case 'swedish':

                return 'sv';

                break;

            case 'thai':

                return 'th';

                break;

            case 'turkish':

                return 'tr';

                break;

            case 'ukranian':

                return 'uk';

                break;

            case 'serbian':

                return 'sr';

                break;

//            case '':
//
//                return '';
//
//                break;

            case 'chinese':


                return 'zh-cn';

                break;



            default:

               // return $lan;
                return 'en';

        }

    }


}