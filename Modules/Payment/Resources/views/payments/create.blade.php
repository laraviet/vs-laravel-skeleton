@extends('layouts.admin.master')

@section('title') {{ _t('create') . ' ' . _t('payment') }} @endsection

@section('css')
    <!-- Bootstrap Rating css -->
    <link rel="stylesheet" type="text/css"
          href="{{ theme_url('assets/libs/bootstrap-rating/bootstrap-rating.min.css')}}">
@endsection

@section('content')

    @component('common-components.breadcrumb')
        @slot('title') {{ _t('payment') }} @endslot
        @slot('li_1') {{ _t('home') }} @endslot
        @slot('li_2') {{ _t('create') . ' ' . _t('payment') }} @endslot
    @endcomponent


    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title mb-4">{{ _t('create_new') . ' ' . _t('payment') }}</h4>

                    @include('common-components.forms.alert-error')

                    {!! Form::model( $payment, ['route' => 'payments.store','method'=>'POST', 'class' => 'outer-repeater', 'enctype' => 'multipart/form-data']) !!}
                    <div data-repeater-list="outer-group" class="outer">
                        @include('payment::payments._form', ['action' => 'create'])
                    </div>
                    <div class="row justify-content-end">
                        <div class="col-lg-10">
                            <button type="submit"
                                    class="btn btn-primary">{{ _t('create') . ' ' . _t('payment') }}</button>
                        </div>
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
    <!-- end row -->

@endsection


@section('script')
@endsection

