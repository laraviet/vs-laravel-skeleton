<?php

namespace Modules\Blog\Entities\Tenants;

use Hyn\Tenancy\Traits\UsesTenantConnection;

class BlogPostTranslation extends \Modules\Blog\Entities\BlogPostTranslation
{
    use UsesTenantConnection;
}
