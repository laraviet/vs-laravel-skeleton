<?php

namespace Modules\SaasFront\Http\Controllers;

use Laracasts\Flash\Flash;
use Modules\Core\Http\Controllers\Controller;
use Modules\SaasFront\Http\Requests\SaasRegisterRequest;
use Modules\SaasFront\Providers\RouteServiceProvider;
use Modules\SaasFront\Services\SaasService;

class SaasRegisterController extends Controller
{
    private $saasService;

    public function __construct(SaasService $saasService)
    {
        $this->saasService = $saasService;
    }

    public function store(SaasRegisterRequest $request)
    {
        $fqdn = $request->get('domain');
        $name = $request->get('name');
        $email = $request->get('email');
        $password = $request->get('password');

        $result = $this->saasService->create($name, $fqdn, $email, $password);

        if (is_array($result)) {
            Flash::error($result[1]);

            return back()->withInput($request->input());
        }

        return redirect("http://{$fqdn}" . RouteServiceProvider::HOME);
    }
}
