<div data-repeater-item class="outer">
    @component('common-components.forms.select', [
        'options' => $users,
        'props' => ['class' => 'select2'],
    ])
        @slot('field') order_by @endslot
        @slot('label') {{ _t('order_by') }} @endslot
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

                        </tbody>
                    </table>
                    <div class="text-right">
                        <span class="mr-2">
                            {{ _t('product') . ': ' }}
                            {!! Form::select('product', $products) !!}
                        </span>
                        <span class="mr-2">
                            {{ _t('quantity') . ': ' }}
                            {!! Form::select('quantity', ["1" => "1", "2" => "2", "3" => "3", "4" => "4", "5" => "5"]) !!}
                        </span>
                        <a type="button" href="#" class="btn btn-primary btn-rounded" id="add-product">
                            <i class="mdi mdi-plus mr-1"></i>{{ _t('add_new') . ' ' . _t('product') }}
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@push('script-extra')
    <script>
        $(document).on('click', '#add-product', function () {
            let product_id = $('select[name="product"]').val();
            let product_name = $('select[name="product"] option:selected').text();
            let quantity = $('select[name="quantity"]').val();
            $.ajax({
                url: "/api/product/" + product_id + "/price",
            }).done(function (data) {
                $('#product_cart tbody').append(
                    "<tr>" +
                    "<td>" +
                    "<input type='hidden' name='products[]' value='{\"id\":" + product_id + ",\"unit_price\":" + data.unit_price + ",\"quantity\":" + quantity + "}' />" +
                    "<span>" + product_name + "</span>" +
                    "</td>" +
                    "<td>" +
                    "<span>" + data.unit_price + "</span>" +
                    "</td>" +
                    "<td>" +
                    "<span>" + quantity + "</span>" +
                    "</td>" +
                    "<td>" +
                    "<span>" + data.unit_price * quantity + "</span>" +
                    "</td>" +
                    "</tr>"
                )
                ;
            });
        })
    </script>
@endpush
