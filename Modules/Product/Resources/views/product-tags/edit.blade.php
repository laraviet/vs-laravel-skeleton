@extends('layouts.admin.master')

@section('title') {{ _t('edit') . ' ' . _t('tag') }} @endsection

@section('css')
    <link href="{{ theme_url('assets/css/select2.min.css')}}" id="app-light" rel="stylesheet" type="text/css"/>
@endsection

@section('content')

    @component('common-components.breadcrumb')
        @slot('title') {{ _t('tag') }} @endslot
        @slot('li_1') {{ _t('home') }} @endslot
        @slot('li_2') {{ _t('edit') . ' ' . _t('tag') }} @endslot
    @endcomponent


    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title mb-4">{{ _t('edit') . ' ' . _t('tag') }}</h4>

                    @include('common-components.forms.alert-error')

                    {!! Form::model($productTag, ['route' => ['product-tags.update', $productTag->id],'method'=>'PATCH', 'class' => 'outer-repeater', 'enctype' => 'multipart/form-data']) !!}
                    <div data-repeater-list="outer-group" class="outer">
                        @include('product::product-tags._form')
                    </div>
                    <div class="row justify-content-end">
                        <div class="col-lg-10">
                            <button type="submit"
                                    class="btn btn-primary">{{ _t('update') . ' ' . _t('tag') }}</button>
                        </div>
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
    <!-- end row -->

@endsection
