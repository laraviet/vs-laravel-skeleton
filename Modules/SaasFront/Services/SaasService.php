<?php

namespace Modules\SaasFront\Services;

use Hyn\Tenancy\Contracts\Repositories\HostnameRepository;
use Hyn\Tenancy\Contracts\Repositories\WebsiteRepository;
use Hyn\Tenancy\Environment;
use Hyn\Tenancy\Models\Hostname;
use Hyn\Tenancy\Models\Website;
use Illuminate\Support\Facades\Hash;
use Modules\Core\Entities\User;

class SaasService
{
    public function create($name, $fqdn, $email, $password = "123456")
    {
        if ($this->tenantExists($fqdn)) {
            return [false, "A tenant with domain '{$fqdn}' already exists."];
        }

        $hostname = $this->registerTenant($fqdn);
        app(Environment::class)->hostname($hostname);

        // we'll create a random secure password for our to-be admin
        $this->addAdmin($name, $email, $password);

        return $password;
    }

    private function tenantExists($fqdn)
    {
        return Hostname::where('fqdn', $fqdn)->exists();
    }

    private function registerTenant($fqdn)
    {
        // associate the customer with a website
        $website = new Website;
        app(WebsiteRepository::class)->create($website);

        // associate the website with a hostname
        $hostname = new Hostname;
        $hostname->fqdn = $fqdn;
        app(HostnameRepository::class)->attach($hostname, $website);

        return $hostname;
    }

    private function addAdmin($name, $email, $password)
    {
        $admin = app(User::class)->create(['name' => $name, 'email' => $email, 'password' => Hash::make($password)]);
        $admin->guard_name = 'web';
        $admin->assignRole('admin');

        return $admin;
    }
}
