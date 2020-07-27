<div data-repeater-item class="outer">
    @component('common-components.forms.text')
        @slot('field') sku @endslot
        @slot('label') {{ _t('sku') }} @endslot
        @slot('placeholder') {{ _t('enter') . ' ' . _t('sku') . '...' }} @endslot
    @endcomponent

    @component('common-components.forms.text')
        @slot('field') {{localize_field('name')}} @endslot
        @slot('label') {{ _t('name') }} @endslot
        @slot('placeholder') {{ _t('enter') . ' ' . _t('name') . '...' }} @endslot
    @endcomponent

    @component('common-components.forms.text')
        @slot('field') {{localize_field('caption')}} @endslot
        @slot('label') {{ _t('caption') }} @endslot
        @slot('placeholder') {{ _t('enter') . ' ' . _t('caption') . '...' }} @endslot
    @endcomponent

    @component('common-components.forms.text-area')
        @slot('field') {{localize_field('description')}} @endslot
        @slot('label') {{ _t('description') }} @endslot
        @slot('placeholder') {{ _t('enter') . ' ' . _t('description') . '...' }} @endslot
    @endcomponent

    @component('common-components.forms.checkbox')
        @slot('field') is_feature @endslot
        @slot('label') {{ _t('featured') }} @endslot
    @endcomponent

    @component('common-components.forms.select',[
        'options' => $brands,
        'props' => ['class' => 'select2'],
    ])
        @slot('field') brand_id @endslot
        @slot('label') {{ _t('brand') }} @endslot
    @endcomponent

    @component('common-components.forms.image-view')
        @slot('path') {{ isset($product) ? $product->featureImage : noImage() }} @endslot
    @endcomponent

    @component('common-components.forms.file')
        @slot('field') feature_image @endslot
        @slot('label') {{ _t('feature_image') }} @endslot
        @slot('placeholder') {{ _t('enter') . ' ' . _t('feature_image') . '...' }} @endslot
    @endcomponent

    @component('common-components.forms.text')
        @slot('field') regular_price @endslot
        @slot('label') {{ _t('regular_price') }} @endslot
        @slot('placeholder') {{ _t('enter') . ' ' . _t('regular_price') . '...' }} @endslot
    @endcomponent

    @component('common-components.forms.text')
        @slot('field') sale_price @endslot
        @slot('label') {{ _t('sale_price') }} @endslot
        @slot('placeholder') {{ _t('enter') . ' ' . _t('sale_price') . '...' }} @endslot
    @endcomponent

    @component('common-components.forms.text')
        @slot('field') quantity @endslot
        @slot('label') {{ _t('quantity') }} @endslot
        @slot('placeholder') {{ _t('enter') . ' ' . _t('quantity') . '...' }} @endslot
    @endcomponent

    @component('common-components.forms.checkbox')
        @slot('field') shippable @endslot
        @slot('label') {{ _t('shippable') }} @endslot
    @endcomponent

    @component('common-components.forms.checkbox')
        @slot('field') downloadable @endslot
        @slot('label') {{ _t('downloadable') }} @endslot
    @endcomponent


    @component('common-components.forms.select',[
        'options' => \Modules\Product\Entities\Product::statuses(),
        'props' => [],
    ])
        @slot('field') status @endslot
        @slot('label') {{ _t('status') }} @endslot
    @endcomponent
</div>
