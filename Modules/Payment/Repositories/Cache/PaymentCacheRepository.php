<?php

namespace Modules\Payment\Repositories\Cache;

use Illuminate\Cache\CacheManager;
use Illuminate\Database\Eloquent\Model;
use Modules\Core\Repositories\Cache\BaseCacheRepository;
use Modules\Payment\Entities\Payment;
use Modules\Payment\Repositories\Contracts\PaymentRepositoryInterface;
use Modules\Payment\Repositories\PaymentRepository;

class PaymentCacheRepository extends BaseCacheRepository implements PaymentRepositoryInterface
{
    /**
     * ProductCategoryCacheRepository constructor.
     * @param Payment $payment
     * @param CacheManager $cache
     * @param PaymentRepository $paymentRepository
     */
    public function __construct(Payment $payment, CacheManager $cache, PaymentRepository $paymentRepository)
    {
        $this->model = $payment;
        $this->cache = $cache;
        parent::__construct($paymentRepository);
    }

    public function sumPricePayment(Model $model, $status)
    {
        return $this->repository->sumPricePayment($model, $status);
    }
}
