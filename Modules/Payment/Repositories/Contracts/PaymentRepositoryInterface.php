<?php


namespace Modules\Payment\Repositories\Contracts;


use Illuminate\Database\Eloquent\Model;
use Modules\Core\Repositories\Contracts\BaseRepositoryInterface;

interface PaymentRepositoryInterface extends BaseRepositoryInterface
{
    public function sumPricePayment(Model $model, $status);
}