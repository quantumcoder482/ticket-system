<?php


Class Ip2Location{


    public static function getDetails($ip=''){

        $data = array();
        $data['country'] = '';
        $data['country_iso'] = '';
        $data['city'] = '';
        $data['postal_code'] = '';
        $data['lat'] = '';
        $data['lon'] = '';

        $data['timezone'] = '';
        $data['region'] = '';


        if($ip==''){
            $ip = get_client_ip();
        }

        if(file_exists('storage/ipdb/IP2LOCATION-LITE-DB5.BIN')){

            try {

//                $reader = new Reader('storage/mmdb/GeoLite2-City.mmdb');
//
//                $record = $reader->city($ip);
//
//                $data['country'] = $record->country->name;
//                $data['country_iso'] = $record->country->isoCode;
//                $data['city'] = $record->city->name;
//                $data['postal_code'] = $record->postal->code;
//                $data['lat'] = $record->location->latitude;
//                $data['lon'] = $record->location->longitude;

                $db = new \IP2Location\Database('storage/ipdb/IP2LOCATION-LITE-DB11.BIN', \IP2Location\Database::FILE_IO);

                $records = $db->lookup($ip, \IP2Location\Database::ALL);


                $data['country'] = $records['countryName'];
                $data['country_iso'] = $records['countryCode'];
                $data['city'] = $records['cityName'];
                $data['zip'] = $records['zipCode'];
                $data['lat'] = $records['latitude'];
                $data['lon'] = $records['longitude'];
                $data['timezone'] = $records['timeZone'];
                $data['region'] = $records['regionName'];

            } catch (Exception $e) {

            }


        }

        return $data;


    }



}