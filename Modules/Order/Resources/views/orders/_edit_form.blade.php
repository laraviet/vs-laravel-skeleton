<div data-repeater-item class="outer">
    @component('common-components.forms.select', [
        'options' => $status,
        'props' => ['class' => 'select2'],
    ])
        @slot('field') status @endslot
        @slot('label') {{ _t('status') }} @endslot
    @endcomponent

    <div class="row">
        <div class="col-lg-12">
            <div class="card border border-primary">
                <div class="card-header bg-transparent border-primary">
                    <h5 class="my-0 text-center text-primary">
                        <i class="mdi mdi-view-list mr-3"></i><u>{{ _t('product') }}</u>
                    </h5>
                </div>
                <div class="card-body">

                    <table class="table table-centered table-nowrap" id="product_cart">
                        <thead class="thead-light">
                        <tr>
                            <th>{{ _t('item') }}</th>
                            <th>{{ _t('unit_price') }}</th>
                            <th>{{ _t('quantity') }}</th>
                            <th>{{ _t('total') }}</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($order->orderItems as $item)
                            <tr>
                                <td>
                                    <input type="hidden" name="products[{{ $item->id }}][id]"
                                           value="{{ $item->product_id }}">
                                    <span>{{ $item->product->name }}</span>
                                </td>
                                <td>
                                    <input type="text" name="products[{{ $item->id }}][unit_price]"
                                           value="{{ $item->unit_price }}">
                                </td>
                                <td>
                                    <select name="products[{{ $item->id }}][quantity]" id="">
                                        <option value="1" @if($item->quantity == 1) selected @endif>1</option>
                                        <option value="2" @if($item->quantity == 2) selected @endif>2</option>
                                        <option value="3" @if($item->quantity == 3) selected @endif>3</option>
                                        <option value="4" @if($item->quantity == 4) selected @endif>4</option>
                                        <option value="5" @if($item->quantity == 5) selected @endif>5</option>
                                    </select>
                                </td>
                                <td>
                                    <span>{{ $item->total }}</span>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
</div>
