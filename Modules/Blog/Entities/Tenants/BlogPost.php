<?php

namespace Modules\Blog\Entities\Tenants;

use Hyn\Tenancy\Traits\UsesTenantConnection;

class BlogPost extends \Modules\Blog\Entities\BlogPost
{
    use UsesTenantConnection;
}
