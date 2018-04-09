<?php

namespace App\Http\Controllers\Account\Adverts;

use App\Http\Controllers\Controller;
use App\Http\Middleware\FilledProfile;

/**
 * Class AdvertController
 * @package App\Http\Controllers\Account\Adverts
 */
class AdvertController extends Controller
{
    public function __construct()
    {
        $this->middleware(FilledProfile::class);
    }

    public function index()
    {
        return view('account.adverts.index');
    }
}