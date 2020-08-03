<?php

namespace Modules\Order\Http\Controllers;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\View\View;
use Modules\Core\Exceptions\RepositoryException;
use Modules\Core\Http\Controllers\Controller;
use Modules\Core\Repositories\Contracts\UserRepositoryInterface;
use Modules\Order\Entities\Order;
use Modules\Order\Http\Requests\CreateOrderRequest;
use Modules\Order\Http\Requests\UpdateOrderRequest;
use Modules\Order\Repositories\Contracts\OrderRepositoryInterface;
use Modules\Product\Repositories\Contracts\ProductRepositoryInterface;

class OrderController extends Controller
{
    /**
     * @var OrderRepositoryInterface
     */
    private $orderRepository;
    /**
     * @var UserRepositoryInterface
     */
    private $userRepository;
    /**
     * @var ProductRepositoryInterface
     */
    private $productRepository;

    /**
     * OrderController constructor.
     * @param OrderRepositoryInterface $orderRepository
     * @param UserRepositoryInterface $userRepository
     * @param ProductRepositoryInterface $productRepository
     */
    public function __construct(
        OrderRepositoryInterface $orderRepository,
        UserRepositoryInterface $userRepository,
        ProductRepositoryInterface $productRepository
    )
    {
        $this->orderRepository = $orderRepository;
        $this->defaultEagerLoad = ['orderItems.product', 'orderBy'];
        $this->userRepository = $userRepository;
        $this->productRepository = $productRepository;
    }

    /**
     * Display a listing of the resource.
     * @param Request $request
     * @return Application|Factory|View
     */
    public function index(Request $request)
    {
        $orders = $this->genPagination($request, $this->orderRepository);

        return view('order::orders.index', compact('orders'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Application|Factory|View
     */
    public function create()
    {
        $users = $this->userRepository->toArray('id', 'name');
        $products = $this->productRepository->toArray('id', 'name', 'active');

        return view('order::orders.create', compact('users', 'products'));
    }

    /**
     * Store a newly created resource in storage.
     * @param CreateOrderRequest $request
     * @return RedirectResponse
     * @throws RepositoryException
     */
    public function store(CreateOrderRequest $request)
    {
        $products = [];
        foreach ($request->input('products') as $product) {
            $products[] = \json_decode($product);
        }
        $order_by = $request->input('order_by');
        $this->orderRepository->create(compact('products', 'order_by'));

        return redirect()->route('orders.index')
            ->with(config('core.session_success'), _t('order') . ' ' . _t('create_success'));
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Application|Factory|Response|View
     */
    public function edit($id)
    {
        $order = $this->orderRepository->findById($id);
        $status = Order::statuses();

        return view('order::orders.edit', compact('order', 'status'));
    }

    /**
     * Update the specified resource in storage.
     * @param UpdateOrderRequest $request
     * @param int $id
     * @return RedirectResponse
     * @throws RepositoryException
     */
    public function update(UpdateOrderRequest $request, $id)
    {
        $this->orderRepository->updateById($id, $request->except(['_token', 'method']));

        return redirect()->route('orders.index')
            ->with(config('core.session_success'), _t('order') . ' ' . _t('update_success'));
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return RedirectResponse
     * @throws RepositoryException
     */
    public function destroy($id)
    {
        $this->orderRepository->deleteById($id);

        return redirect()->route('orders.index')
            ->with(config('core.session_success'), _t('order') . ' ' . _t('delete_success'));
    }
}
