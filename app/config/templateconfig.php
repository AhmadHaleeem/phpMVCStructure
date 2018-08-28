<?php
return [
    'template' => [
        'header'            => TEMPLATE_PATH . 'header.php',
        'nav'               => TEMPLATE_PATH . 'nav.php',
        'wrapper_start'     => TEMPLATE_PATH . 'wrapperstart.php',
        ':view'             => ':action_view',
        'wrapper_end'       => TEMPLATE_PATH . 'wrapperend.php'
    ],
    'header_resources' => [
        'css' => [
            'bootstrap'         => CSS . 'rtl/bootstrap.min.css',
            'bootstrapR'        => CSS . 'rtl/bootstrap.rtl.css',
            'metisMenu'         => CSS . 'plugins/metisMenu/metisMenu.min.css',
            'timeline'          => CSS . 'plugins/timeline.css',
            'sb-admin-2'        => CSS . 'rtl/sb-admin-2.css',
            'morris'            => CSS . 'plugins/morris.css',
            'font-awesome'      => CSS . 'font-awesome/font-awesome.min.css',
        ]
    ],
    'footer_resources' => [
        'jquery'                => JS . 'jquery-1.11.0.js',
        'bootstrap'             => JS . 'bootstrap.min.js',
        'metisMenu'             => JS . 'metisMenu/metisMenu.min.js',
        'raphael'               => JS . 'raphael/raphael.min.js',
        'morris'                => JS . 'morris/morris.min.js',
        'sb-admin-2'            => JS . 'sb-admin-2.js',
    ]
];