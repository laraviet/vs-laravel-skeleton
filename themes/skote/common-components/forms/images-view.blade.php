@if($images->count() > 0)
    <div class="row mb-4">
        <label for=""
               class="col-form-label col-lg-2"></label>
        <div class="col-lg-10">
            <div class="row">
                @foreach($images as $image)
                    <div class="col-lg-1">
                        <div class="mr-2">
                            <img src="{{ url($image->getUrl('thumb')) }}" alt="">
                        </div>
                        <div data-toggle="tooltip" class="text-center"
                             data-placement="top" title=""
                             data-original-title="{{ _t('delete') }}">
                            <a href="{{ route('images.destroy', [$image->id]) }}" class="text-danger">
                                {{ _t('delete') }}
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>

        </div>
    </div>
@endif
