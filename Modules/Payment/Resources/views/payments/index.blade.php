@extends('layouts.admin.master')

@section('title') {{ _t('payment') }} @endsection

@section('css')
    <link rel="stylesheet" type="text/css" href="{{ theme_url('assets/libs/toastr/toastr.min.css')}}">
@endsection

@section('content')

    @component('common-components.breadcrumb')
        @slot('title') {{ _t('payment') }} @endslot
        @slot('li_1') {{ _t('home') }} @endslot
        @slot('li_2') {{ _t('payment') }} @endslot
    @endcomponent

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="row mb-2">
                        <div class="col-sm-4">
                            <div class="search-box mr-2 mb-2 d-inline-block">
                                <div class="position-relative">
                                    <input type="text"
                                           class="form-control"
                                           id="search-box"
                                           placeholder="{{ _t('search') }}..."
                                           @if ($search = request()->get('filter')['search'])
                                           value="{{ $search  }}"
                                           @endif
                                           onkeypress="return search(event, '{{ route('payments.index') }}')"
                                    />
                                    <i class="bx bx-search-alt search-icon"
                                       onclick="return redirectWithSearch('{{ route('payments.index') }}')"></i>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-8">
                            <div class="text-sm-right">
                                <a type="button" style="color: white;" href="{{ route('payments.create') }}"
                                   class="btn btn-success btn-rounded waves-effect waves-light mb-2 mr-2"><i
                                        class="mdi mdi-plus mr-1"></i> {{ _t('add_new') . ' ' . _t('payment') }}
                                </a>
                            </div>
                        </div><!-- end col-->
                    </div>

                    <div class="table-responsive">
                        <table class="table table-centered table-nowrap">
                            <thead class="thead-light">
                            <tr>
                                <th>{{ _t('order') }}</th>
                                <th>{{ _t('invoice_number') }}</th>
                                <th>{{ _t('price') }}</th>
                                <th>{{ _t('comment') }}</th>
                                <th>{{ _t('status') }}</th>
                                <th>{{ _t('action') }}</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($payments as $payment)
                                <tr>
                                    <td>{{ $payment->order->order_number }}</td>
                                    <td>{{ $payment->invoice_number }}</td>
                                    <td>{{ format_currency($payment->price) }}</td>
                                    <td>{{ $payment->comment }}</td>
                                    <td>{!! activeInactiveHtml($payment->statusName) !!}</td>
                                    <td>
                                        @if($payment->status != \Modules\Payment\Entities\Payment::STATUS_PAID)
                                            <a href="{{ route('payments.edit', [$payment->id]) }}"
                                               class="mr-3 text-primary" data-toggle="tooltip"
                                               data-placement="top" title=""
                                               data-original-title="{{ _t('edit') }}"><i
                                                    class="mdi mdi-pencil font-size-18"></i></a>

                                            {!! Form::open([
                                                    'method' => 'DELETE',
                                                    'route' => ['payments.destroy', $payment->id],
                                                    'style'=>'display:inline',
                                                    'onsubmit' => 'return confirm("' . _t('delete_confirm') . '");'
                                            ]) !!}
                                            <span data-toggle="tooltip"
                                                  data-placement="top" title=""
                                                  data-original-title="{{ _t('delete') }}">
                                            <button type="submit"
                                                    style="background: transparent; border: transparent; padding: 0;">
                                                <i class="mdi mdi-close font-size-18 text-danger"></i>
                                            </button>
                                        </span>
                                            {!! Form::close() !!}
                                        @endif

                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>

                    <div class="pagination pagination-rounded justify-content-end mb-2">
                        {{ $payments->withQueryString()->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end row -->
@endsection

@section('script')

    @include('common-components.functions.search')
    @include('common-components.functions.toastr')
@endsection
