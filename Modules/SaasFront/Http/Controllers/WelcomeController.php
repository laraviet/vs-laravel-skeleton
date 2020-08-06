<?php


namespace Modules\SaasFront\Http\Controllers;

use Illuminate\Http\Request;
use Modules\Core\Http\Controllers\Controller;
use Modules\SaasFront\Providers\RouteServiceProvider;

class WelcomeController extends Controller
{
    public function index(Request $request)
    {
        if (config('app.base_saas_url') !== config('app.url')) {
            return redirect(RouteServiceProvider::HOME);
        }

        return view('saasfront::welcome');
    }
}
