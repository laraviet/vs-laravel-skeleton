<?php


namespace Modules\Payment\Services\Contracts;


use Illuminate\Database\Eloquent\Model;

interface PaymentServiceInterface
{
    public function updateStatus($id, $status);

    public function create(array $attributes);

    public function updateById($id, array $attributes);

    public function syncRelation(Model $booking, $attributes);
}
