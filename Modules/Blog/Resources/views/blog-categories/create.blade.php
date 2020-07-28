@extends('layouts.admin.master')

@section('title') {{ _t('create') . ' ' . _t('blog_category') }} @endsection

@section('content')

    @component('common-components.breadcrumb')
        @slot('title') {{ _t('blog_category') }} @endslot
        @slot('li_1') {{ _t('home') }} @endslot
        @slot('li_2') {{ _t('create') . ' ' . _t('blog_category') }} @endslot
    @endcomponent


    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title mb-4">{{ _t('create_new') . ' ' . _t('blog_category') }}</h4>

                    @include('common-components.forms.alert-error')

                    {!! Form::open(['route' => 'blog-categories.store','method'=>'POST', 'class' => 'outer-repeater', 'enctype' => 'multipart/form-data']) !!}
                    <div data-repeater-list="outer-group" class="outer">
                        @include('blog::blog-categories._form')
                    </div>
                    <div class="row justify-content-end">
                        <div class="col-lg-10">
                            <button type="submit"
                                    class="btn btn-primary">{{ _t('create') . ' ' . _t('blog_category') }}</button>
                        </div>
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
    <!-- end row -->

@endsection
