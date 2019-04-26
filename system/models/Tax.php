<?php
use Illuminate\Database\Eloquent\Model;

class Tax extends Model
{
    protected $table = 'sys_tax';


    public static function taxReset($tax_system='')
    {
        switch ($tax_system){

            case 'India':

                $taxes = [
                    [
                        'name' => '3%',
                        'rate' => 3.00,
                        'is_default' => 1
                    ],
                    [
                        'name' => '5%',
                        'rate' => 5.00,
                        'is_default' => 0
                    ],
                    [
                        'name' => '12%',
                        'rate' => 12.00,
                        'is_default' => 0
                    ],
                    [
                        'name' => '18%',
                        'rate' => 18.00,
                        'is_default' => 0
                    ],
                    [
                        'name' => '28%',
                        'rate' => 28.00,
                        'is_default' => 0
                    ]
                ];

                DB::table('sys_tax')->truncate();

                foreach ($taxes as $t){
                    $tax = new Tax;
                    $tax->name = $t['name'];
                    $tax->rate = $t['rate'];
                    $tax->is_default = $t['is_default'];
                    $tax->save();
                }


                update_option('show_business_number','1');
                update_option('label_business_number','GSTIN');


                break;


            case 'ca_quebec':

                ORM::execute('ALTER TABLE `sys_tax` CHANGE `rate` `rate` DECIMAL(10,3) NULL DEFAULT NULL');
                ORM::execute('ALTER TABLE `sys_invoiceitems` CHANGE `tax_rate` `tax_rate` DECIMAL(16,3) NULL DEFAULT NULL');

                $taxes = [
                    [
                        'name' => 'Exempt (0%)',
                        'rate' => 0.00,
                        'is_default' => 0
                    ],
                    [
                        'name' => 'Zero rated (0%)',
                        'rate' => 0.00,
                        'is_default' => 0
                    ],
                    [
                        'name' => 'Out of scope (0%)',
                        'rate' => 0.00,
                        'is_default' => 0
                    ],
                    [
                        'name' => 'GST (5%)',
                        'rate' => 5.00,
                        'is_default' => 0
                    ],
                    [
                        'name' => 'GST/QST QC - 9.975 (14.975%)',
                        'rate' => 14.975,
                        'is_default' => 1
                    ],
                    [
                        'name' => 'QST QC - 9.975 (9.975%)',
                        'rate' => 9.975,
                        'is_default' => 0
                    ]
                ];

                DB::table('sys_tax')->truncate();

                foreach ($taxes as $t){
                    $tax = new Tax;
                    $tax->name = $t['name'];
                    $tax->rate = $t['rate'];
                    $tax->is_default = $t['is_default'];
                    $tax->save();
                }


                update_option('show_business_number','1');
                update_option('label_business_number','Enterprise Number');


                break;




            default:

                DB::table('sys_tax')->truncate();

                ORM::execute('ALTER TABLE `sys_tax` CHANGE `rate` `rate` DECIMAL(10,2) NULL DEFAULT NULL');
                ORM::execute('ALTER TABLE `sys_invoiceitems` CHANGE `tax_rate` `tax_rate` DECIMAL(16,3) NULL DEFAULT NULL');

                $tax = new Tax;
                $tax->name = 'None';
                $tax->rate = 0.00;
                $tax->is_default = 1;
                $tax->save();


                update_option('show_business_number','0');
                update_option('label_business_number','Business Number');

        }
    }

    public static function indianStates()
    {
        $states = [
            [
                'name' => 'Andaman and Nicobar Island',
                'code' => 'AN',
                'tin' => '35'
            ],
            [
                'name' => 'Andhra Pradesh',
                'code' => 'AD',
                'tin' => '37'
            ],
            [
                'name' => 'Arunachal Pradesh',
                'code' => 'AR',
                'tin' => '12'
            ],
            [
                'name' => 'Assam',
                'code' => 'AS',
                'tin' => '18'
            ],
            [
                'name' => 'Bihar',
                'code' => 'BR',
                'tin' => '10'
            ],
            [
                'name' => 'Chandigarh',
                'code' => 'CH',
                'tin' => '04'
            ],
            [
                'name' => 'Chattisgarh',
                'code' => 'CG',
                'tin' => '22',

            ],
            [
                'name' => 'Dadra and Nagar Haveli',
                'code' => 'DN',
                'tin' => '26'
            ],
            [
                'name' => 'Daman and Diu',
                'code' => 'DD',
                'tin' => '25'
            ],
            [
                'name' => 'Delhi',
                'code' => 'DL',
                'tin' => '07'
            ],
            [
                'name' => 'Goa',
                'code' => 'GA',
                'tin' => '30'
            ],
            [
                'name' => 'Gujarat',
                'code' => 'GJ',
                'tin' => '24'
            ],
            [
                'name' => 'Haryana',
                'code' => 'HR',
                'tin' => '06'
            ],
            [
                'name' => 'Himachal Pradesh',
                'code' => 'HP',
                'tin' => '02'
            ],
            [
                'name' => 'Jammu and Kashmir',
                'code' => 'JK',
                'tin' => '01'
            ],
            [
                'name' => 'Jharkhand',
                'code' => 'JH',
                'tin' => '20'
            ],
            [
                'name' => 'Karnataka',
                'code' => 'KA',
                'tin' => '29'
            ],
            [
                'name' => 'Kerala',
                'code' => 'KL',
                'tin' => '32'
            ],
            [
                'name' => 'Lakshadweep Islands',
                'code' => 'LD',
                'tin' => '31'
            ],
            [
                'name' => 'Madhya Pradesh',
                'code' => 'MP',
                'tin' => '23'
            ],
            [
                'name' => 'Maharashtra',
                'code' => 'MH',
                'tin' => '27'
            ],
            [
                'name' => 'Manipur',
                'code' => '14',
                'tin' => 'MN'
            ],
            [
                'name' => 'Meghalaya',
                'code' => 'ML',
                'tin' => '17'
            ],
            [
                'name' => 'Mizoram',
                'code' => 'MZ',
                'tin' => '15'
            ],
            [
                'name' => 'Nagaland',
                'code' => 'NL',
                'tin' => '13'
            ],
            [
                'name' => 'Odisha',
                'code' => 'OD',
                'tin' => '21'
            ],
            [
                'name' => 'Pondicherry',
                'code' => 'PY',
                'tin' => '34'
            ],
            [
                'name' => 'Punjab',
                'code' => 'PB',
                'tin' => '03'
            ],
            [
                'name' => 'Rajasthan',
                'code' => 'RJ',
                'tin' => '08'
            ],
            [
                'name' => 'Sikkim',
                'code' => 'SK',
                'tin' => '11'
            ],
            [
                'name' => 'Tamil Nadu',
                'code' => '33',
                'tin' => 'TN'
            ],
            [
                'name' => 'Telangana',
                'code' => 'TS',
                'tin' => '36'
            ],
            [
                'name' => 'Tripura',
                'code' => 'TR',
                'tin' => '16'
            ],
            [
                'name' => 'Uttar Pradesh',
                'code' => 'UP',
                'tin' => '09'
            ],
            [
                'name' => 'Uttarakhand',
                'code' => 'UK',
                'tin' => '05'
            ],
            [
                'name' => 'West Bengal',
                'code' => 'WB',
                'tin' => '19'
            ]

        ];

        return $states;
    }

}