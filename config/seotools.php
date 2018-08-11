<?php

return [
    'meta'      => [
        /*
         * The default configurations to be used by the meta generator.
         */
        'defaults'       => [
            'title'        => "دانشگاه ملایر", // set false to total remove
            'description'  => 'امور دانشجویی', // set false to total remove
            'separator'    => ' - ',
            'keywords'     => [
                'آرش',
                'حاتمی',
                'آرش حاتمی',
                'اندروید',
                'طراحی وب',
                'برنامه نویسی',
                'Arash',
                'Hatami',
                'Arash Hatami',
                'Software Engineer',
                'Software Developer',
                'Web Developer',
                'Backend Developer'
            ],
            'canonical'    => false, // Set null for using Url::current(), set false to total remove
        ],

        /*
         * Webmaster tags are always added.
         */
        'webmaster_tags' => [
            'google'    => null,
            'bing'      => null,
            'alexa'     => null,
            'pinterest' => null,
            'yandex'    => null,
        ],
    ],
    'opengraph' => [
        /*
         * The default configurations to be used by the opengraph generator.
         */
        'defaults' => [
            'title'       => 'آرش حاتمی', // set false to total remove
            'description' => 'برنامه نویس وب ، اندروید', // set false to total remove
            'url'         => false, // Set null for using Url::current(), set false to total remove
            'type'        => false,
            'site_name'   => false,
            'images'      => [],
        ],
    ],
    'twitter' => [
        /*
         * The default values to be used by the twitter cards generator.
         */
        'defaults' => [
          //'card'        => 'summary',
          //'site'        => '@LuizVinicius73',
        ],
    ],
];
