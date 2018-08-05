<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as Middleware;

class VerifyCsrfToken extends Middleware
{
    /**
     * The URIs that should be excluded from CSRF verification.
     *
     * @var array
     */
    protected $except = [
	    '/531370522:AAHYvRhHW7Y2HRIOQszk5MfsZTbJNsy29Dw/webhook'
    ];
}
