<?php

namespace Modules\Blog\Entities\Tenants;

use Hyn\Tenancy\Traits\UsesTenantConnection;

class BlogCategory extends \Modules\Blog\Entities\BlogCategory
{
    use UsesTenantConnection;
}
