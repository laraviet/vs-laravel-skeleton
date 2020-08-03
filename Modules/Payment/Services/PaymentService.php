<?php


namespace Modules\Payment\Services;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Modules\Core\Exceptions\RepositoryException;
use Modules\Order\Repositories\Contracts\OrderRepositoryInterface;
use Modules\Payment\Entities\Payment;
use Modules\Payment\Repositories\Contracts\PaymentRepositoryInterface;
use Modules\Payment\Services\Contracts\PaymentServiceInterface;

class PaymentService implements PaymentServiceInterface
{
    /**
     * @var PaymentRepositoryInterface
     */
    private $paymentRepository;
    /**
     * @var OrderRepositoryInterface
     */
    private $orderRepository;

    /**
     * PaymentService constructor.
     * @param OrderRepositoryInterface $orderRepository
     * @param PaymentRepositoryInterface $paymentRepository
     */
    public function __construct(OrderRepositoryInterface $orderRepository,
                                PaymentRepositoryInterface $paymentRepository)
    {
        $this->paymentRepository = $paymentRepository;
        $this->orderRepository = $orderRepository;
    }

    /**
     * @param $id
     * @param $status
     */
    public function updateStatus($id, $status)
    {
        // TODO: Implement updateStatus() method.
    }

    /**
     * @param array $attributes
     * @return Model
     * @throws RepositoryException
     */
    public function create(array $attributes)
    {
        DB::beginTransaction();

        try {
            $payment = $this->paymentRepository->create($attributes);
            $payment->invoice_number = $payment->genInvoiceNumber();
            $payment->save();
            if ($payment->status == Payment::STATUS_PAID) {
                $this->syncRelation($payment, $attributes);
            }

            DB::commit();

            return $payment;
        } catch (\Exception $e) {
            DB::rollback();
            logger([$e->getFile(), $e->getLine(), $e->getMessage()]);
            throw RepositoryException::createFailed();
        }
    }

    public function updateById($id, array $attributes)
    {
        DB::beginTransaction();
        try {
            $oldPayment = $this->paymentRepository->findById($id);
            $payment = $this->paymentRepository->updateById($id, $attributes);

            if ($oldPayment->status == Payment::STATUS_PENDING && $payment->status == Payment::STATUS_PAID) {
                $this->syncRelation($payment, ['price' => $payment->price]);
            }

            if ($oldPayment->status == Payment::STATUS_PAID && $payment->status == Payment::STATUS_PENDING) {
                $this->syncRelation($payment, ['price' => - ($oldPayment->price)]);
            }

            if ($oldPayment->status == Payment::STATUS_PAID && $payment->status == Payment::STATUS_PAID) {
                $this->syncRelation($payment, ['price' => $payment->price - $oldPayment->price]);
            }

            DB::commit();

            return $payment;
        } catch (\Exception $e) {
            DB::rollback();
            logger([$e->getFile(), $e->getLine(), $e->getMessage()]);
            throw RepositoryException::updateFailed();
        }
    }

    public function deleteById($id)
    {
        DB::beginTransaction();

        try {
            $payment = $this->paymentRepository->findById($id);
            $this->paymentRepository->delete($payment);
            if ($payment->status == Payment::STATUS_PAID) {
                $this->syncRelation($payment, ['price' => - ($payment->price)]);
            }
            DB::commit();

            return $payment;
        } catch (\Exception $e) {
            DB::rollback();
            logger([$e->getFile(), $e->getLine(), $e->getMessage()]);
            throw RepositoryException::deleteFailed();
        }
    }

    public function syncRelation(Model $payment, $attributes)
    {
        $this->orderRepository->updatePaid($payment->order_id, $attributes['price']);
    }
}
