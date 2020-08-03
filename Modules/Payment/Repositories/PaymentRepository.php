<?php


namespace Modules\Payment\Repositories;


use Illuminate\Database\Eloquent\Model;
use Modules\Core\Repositories\BaseRepository;
use Modules\Payment\Entities\Payment;
use Modules\Payment\Repositories\Contracts\PaymentRepositoryInterface;


class PaymentRepository extends BaseRepository implements PaymentRepositoryInterface
{
    /**
     * FeedbackRepository constructor.
     * @param Payment $payment
     */
    public function __construct(Payment $payment)
    {
        $this->model = $payment;
    }

    /**
     * @param Model $model
     * @param $status
     * @return mixed
     */
    public function sumPricePayment(Model $model, $status)
    {
        return $model->payments->where('status', $status)->sum('price');
    }
}
