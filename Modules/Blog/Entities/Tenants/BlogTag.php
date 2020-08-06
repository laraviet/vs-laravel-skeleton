<?php

namespace Modules\Blog\Entities\Tenants;

use Hyn\Tenancy\Traits\UsesTenantConnection;

class BlogTag extends \Modules\Blog\Entities\BlogTag
{
    use UsesTenantConnection;
}
