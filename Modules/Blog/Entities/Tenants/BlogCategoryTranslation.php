<?php

namespace Modules\Blog\Entities\Tenants;

use Hyn\Tenancy\Traits\UsesTenantConnection;

class BlogCategoryTranslation extends \Modules\Blog\Entities\BlogCategoryTranslation
{
    use UsesTenantConnection;
}
