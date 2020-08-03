<?php

namespace Modules\Order\Repositories\Contracts;

use Modules\Core\Repositories\Contracts\BaseRepositoryInterface;

interface OrderRepositoryInterface extends BaseRepositoryInterface
{
    public function updatePaid($id, $amount);
}
