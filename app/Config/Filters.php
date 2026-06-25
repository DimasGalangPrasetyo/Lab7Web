<?php

namespace Config;

use CodeIgniter\Config\Filters as BaseFilters;
use CodeIgniter\Filters\CSRF;
use CodeIgniter\Filters\DebugToolbar;
use CodeIgniter\Filters\Honeypot;
use CodeIgniter\Filters\InvalidChars;
use CodeIgniter\Filters\SecureHeaders;
use CodeIgniter\Filters\ForceHTTPS;
use CodeIgniter\Filters\Cors;
use CodeIgniter\Filters\PageCache;
use CodeIgniter\Filters\PerformanceMetrics;
use App\Filters\Auth;
use App\Filters\ApiAuthFilter;

class Filters extends BaseFilters
{
    /**
     * Aliases filter bawaan CI4 + filter auth custom.
     * forcehttps wajib ada pada CI4 versi baru karena dipanggil oleh required filters.
     */
    public array $aliases = [
        'csrf'          => CSRF::class,
        'toolbar'       => DebugToolbar::class,
        'honeypot'      => Honeypot::class,
        'invalidchars'  => InvalidChars::class,
        'secureheaders' => SecureHeaders::class,
        'forcehttps'    => ForceHTTPS::class,
        'cors'          => Cors::class,
        'pagecache'     => PageCache::class,
        'performance'   => PerformanceMetrics::class,
        'auth'          => Auth::class,
        'apiauth'       => ApiAuthFilter::class,
    ];

    public array $globals = [
        'before' => [],
        'after'  => [
            'toolbar' => ['except' => ['post*']],
        ],
    ];

    public array $methods = [];
    public array $filters = [];
}
