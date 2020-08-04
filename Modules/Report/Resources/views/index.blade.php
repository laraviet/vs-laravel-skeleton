@extends('layouts.admin.master')

@section('title') {{ _t('report') }} @endsection

@section('content')

    @component('common-components.breadcrumb')
        @slot('title') {{ _t('report') }} @endslot
        @slot('li_1') {{ _t('home') }} @endslot
        @slot('li_2') {{ _t('report') }} @endslot
    @endcomponent

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    {{ Form::model($currentTime ,['route' => 'report.index', 'method'=>'GET', 'class' => 'outer-repeater']) }}
                    <div data-repeater-list="outer-group" class="outer row">
                        <div class="col-md-5">
                            @component('common-components.forms.select', [
                            'options' => $months,
                            'props' => ['class' => 'select2']
                            ])
                                @slot('field') month @endslot
                                @slot('label') {{ _t('month') }} @endslot
                            @endcomponent
                        </div>
                        <div class="col-md-5">
                            @component('common-components.forms.select', [
                                                        'options' => $years,
                                                        'props' => ['class' => 'select2']
                                                        ])
                                @slot('field') year @endslot
                                @slot('label') {{ _t('year') }} @endslot
                            @endcomponent
                        </div>
                        <div class="col-md-2">
                            <button type="submit"
                                    class="btn btn-primary btn-sm">{{ _t('filter') }}</button>
                        </div>
                    </div>
                    {{ Form::close() }}
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h2 class="card-title mb-4 text-center">{{ _t('month_revenue') }} {{ $currentTime->month }}
                        /{{ $currentTime->year }} </h2>

                    @if($monthRevenue)
                        <div class="row mb-4">
                            <div class="col-lg-6 align-middle">
                                <table class="table table-responsive">
                                    <tr>
                                        <td>{{ _t('total_revenue') }}</td>
                                        <td>{{ format_currency($monthRevenue->total_revenue) }}</td>
                                    </tr>
                                    <tr>
                                        <td>{{ _t('order_revenue') }}</td>
                                        <td>{{ format_currency($monthRevenue->order_revenue) }}</td>
                                    </tr>
                                </table>
                            </div>
                            <div class="col-lg-6">
                                <div id="month_revenue" class="apex-charts" dir="ltr"></div>
                            </div>
                        </div>

                        <div id="daily_revenue" class="apex-charts" dir="ltr"></div>
                    @else
                        <h5 class="text-center">
                            {{ _t('no_result') }}
                        </h5>
                    @endif
                </div>
            </div><!--end card-->
        </div>
    </div>

@endsection

@section('script')
    <!-- apexcharts -->
    <script src="{{ theme_url('assets/libs/apexcharts/apexcharts.min.js')}}"></script>

    @if($monthRevenue)
        @include('report::chart_monthly_revenue')
        @include('report::chart_daily_revenue')
    @endif
@endsection
