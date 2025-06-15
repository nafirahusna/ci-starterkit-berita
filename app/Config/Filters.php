<?php namespace Config;

use CodeIgniter\Config\BaseConfig;

class Filters extends BaseConfig
{
    public $aliases = [
        'csrf'       => \CodeIgniter\Filters\CSRF::class,
        'toolbar'    => \CodeIgniter\Filters\DebugToolbar::class,
        'honeypot'   => \CodeIgniter\Filters\Honeypot::class,
        'auth'       => \App\Filters\AuthFilter::class,      // untuk cek login
        'roleAdmin'  => \App\Filters\RoleFilter::class.':admin',
        'roleEditor' => \App\Filters\RoleFilter::class.':editor',
        'roleUser'   => \App\Filters\RoleFilter::class.':wartawan',
    ];

    public $globals = [
        'before' => [
            // 'honeypot',
            // 'csrf',
        ],
        'after'  => [
            'toolbar',
            // 'honeypot',
        ],
    ];

    public $methods = [];
    public $filters = [
        // bisa juga guard route tertentu di sini
    ];
}
