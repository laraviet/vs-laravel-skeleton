<div data-repeater-item class="outer">
    @component('common-components.forms.text')
        @slot('field') {{localize_field('name')}} @endslot
        @slot('label') {{ _t('name') }} @endslot
        @slot('placeholder') {{ _t('enter') . ' ' . _t('name') . '...' }} @endslot
    @endcomponent

    @component('common-components.forms.select',[
        'options' => $parents,
        'props' => ['class' => 'select2'],
    ])
        @slot('field') parent_id @endslot
        @slot('label') {{ _t('parent') }} @endslot
    @endcomponent

    @component('common-components.forms.image-view')
        @slot('path') {{ isset($blogCategory) ? $blogCategory->thumbnail : noImage() }} @endslot
    @endcomponent

    @component('common-components.forms.file')
        @slot('field') thumbnail @endslot
        @slot('label') {{ _t('thumbnail') }} @endslot
        @slot('placeholder') {{ _t('enter') . ' ' . _t('thumbnail') . '...' }} @endslot
    @endcomponent

    @component('common-components.forms.select',[
        'options' => \Modules\Blog\Entities\BlogCategory::statuses(),
        'props' => [],
    ])
        @slot('field') status @endslot
        @slot('label') {{ _t('status') }} @endslot
    @endcomponent
</div>
