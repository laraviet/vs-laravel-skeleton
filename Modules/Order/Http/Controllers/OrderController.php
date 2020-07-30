<?php

namespace Modules\Order\Http\Controllers;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\View\View;
use Modules\Core\Http\Controllers\Controller;
use Modules\Core\Repositories\Contracts\UserRepositoryInterface;
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
        $this->defaultEagerLoad = ['orderItems', 'orderBy'];
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
     * @return void
     */
    public function store(CreateOrderRequest $request)
    {
        //
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Response
     */
    public function show($id)
    {
        return view('order::orders.show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Response
     */
    public function edit($id)
    {
        return view('order::orders.edit');
    }

    /**
     * Update the specified resource in storage.
     * @param UpdateOrderRequest $request
     * @param int $id
     * @return void
     */
    public function update(UpdateOrderRequest $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
}
