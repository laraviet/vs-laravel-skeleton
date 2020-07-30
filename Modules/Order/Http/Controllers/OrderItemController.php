<?php

namespace Modules\Order\Http\Controllers;

use Illuminate\Http\Response;
use Modules\Core\Http\Controllers\Controller;
use Modules\Order\Http\Requests\CreateOrderItemRequest;
use Modules\Order\Http\Requests\UpdateOrderItemRequest;
use Modules\Order\Repositories\Contracts\OrderItemRepositoryInterface;

class OrderItemController extends Controller
{
    /**
     * @var OrderItemRepositoryInterface
     */
    private $orderItemRepository;

    /**
     * OrderItemController constructor.
     * @param OrderItemRepositoryInterface $orderItemRepository
     */
    public function __construct(OrderItemRepositoryInterface $orderItemRepository)
    {
        $this->orderItemRepository = $orderItemRepository;
        $this->defaultEagerLoad = ['order', 'product'];
    }

    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        return view('order::order-items.index');
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        return view('order::order-items.create');
    }

    /**
     * Store a newly created resource in storage.
     * @param CreateOrderItemRequest $request
     * @return void
     */
    public function store(CreateOrderItemRequest $request)
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
        return view('order::order-items.show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Response
     */
    public function edit($id)
    {
        return view('order::order-items.edit');
    }

    /**
     * Update the specified resource in storage.
     * @param UpdateOrderItemRequest $request
     * @param int $id
     * @return void
     */
    public function update(UpdateOrderItemRequest $request, $id)
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
