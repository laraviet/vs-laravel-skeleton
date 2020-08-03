<?php

namespace Modules\Payment\Http\Controllers;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Modules\Core\Http\Controllers\Controller;
use Modules\Order\Repositories\Contracts\OrderRepositoryInterface;
use Modules\Payment\Entities\Payment;
use Modules\Payment\Http\Requests\CreatePaymentRequest;
use Modules\Payment\Http\Requests\UpdatePaymentRequest;
use Modules\Payment\Repositories\Contracts\PaymentRepositoryInterface;
use Modules\Payment\Services\Contracts\PaymentServiceInterface;

class PaymentController extends Controller
{
    /**
     * @var PaymentRepositoryInterface
     */
    private $paymentRepository;
    /**
     * @var PaymentServiceInterface
     */
    private $paymentService;
    /**
     * @var OrderRepositoryInterface
     */
    private $orderRepository;

    /**
     * PaymentController constructor.
     * @param PaymentRepositoryInterface $paymentRepository
     * @param PaymentServiceInterface $paymentService
     * @param OrderRepositoryInterface $orderRepository
     */
    public function __construct(PaymentRepositoryInterface $paymentRepository,
                                PaymentServiceInterface $paymentService,
                                OrderRepositoryInterface $orderRepository)
    {
        $this->paymentRepository = $paymentRepository;
        $this->paymentService = $paymentService;
        $this->orderRepository = $orderRepository;
        $this->defaultEagerLoad = ['order'];
    }

    /**
     * Display a listing of the resource.
     * @param Request $request
     * @return Application|Factory|View
     */
    public function index(Request $request)
    {
        $payments = $this->genPagination($request, $this->paymentRepository);

        return view('payment::payments.index', compact('payments'));
    }

    /**
     * Show the form for creating a new resource.
     * @param Request $request
     * @return Application|Factory|View
     */
    public function create(Request $request)
    {
        $payment = new \stdClass();
        if ($request->has('order')) {
            $payment->order_id = $request->get('order');
        }

        if ($request->has('amount')) {
            $payment->price = $request->get('amount');
        }

        $status = Payment::statuses();
        $orders = $this->orderRepository->toArray('id', 'order_number', 'incomplete');

        return view('payment::payments.create', compact('payment', 'status', 'orders'));
    }

    /**
     * Store a newly created resource in storage.
     * @param CreatePaymentRequest $request
     * @return RedirectResponse
     */
    public function store(CreatePaymentRequest $request)
    {
        $this->paymentService->create($request->all());

        return redirect()->route('payments.index')
            ->with(config('core.session_success'), __('payment::labels.payment') . ' ' . __('core::labels.create_success'));
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Application|Factory|View
     */
    public function edit($id)
    {
        $payment = $this->paymentRepository->findById($id);
        $status = Payment::statuses();
        $orders = $this->orderRepository->toArray('id', 'order_number', 'incomplete');

        return view('payment::payments.edit', compact('payment', 'status', 'orders'));
    }

    /**
     * Update the specified resource in storage.
     * @param UpdatePaymentRequest $request
     * @param int $id
     * @return RedirectResponse
     */
    public function update(UpdatePaymentRequest $request, $id)
    {
        $this->paymentService->updateById($id, $request->all());

        return redirect()->route('payments.index')
            ->with(config('core.session_success'), __('payment::labels.payment') . ' ' . __('core::labels.update_success'));
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return RedirectResponse
     */
    public function destroy($id)
    {
        $this->paymentService->deleteById($id);

        return redirect()->route('payments.index')
            ->with(config('core.session_success'), __('payment::labels.payment') . ' ' . __('core::labels.delete_success'));
    }
}
