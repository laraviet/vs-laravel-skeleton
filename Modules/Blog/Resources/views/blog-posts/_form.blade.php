<div data-repeater-item class="outer">
    @component('common-components.forms.text')
        @slot('field') {{ localize_field('title') }} @endslot
        @slot('label') {{ _t('title') }} @endslot
        @slot('placeholder') {{ _t('enter') . ' ' . _t('title') . '...' }} @endslot
    @endcomponent

    @component('common-components.forms.ck-editor')
        @slot('field') {{ localize_field('content') }} @endslot
        @slot('label') {{ _t('content') }} @endslot
        @slot('placeholder') {{ _t('enter') . ' ' . _t('content') . '...' }} @endslot
    @endcomponent

    @component('common-components.forms.image-view')
        @slot('path') {{ isset($blogPost) ? $blogPost->featureImage : noImage() }} @endslot
    @endcomponent

    @component('common-components.forms.file')
        @slot('field') feature_image @endslot
        @slot('label') {{ _t('feature_image') }} @endslot
        @slot('placeholder') {{ _t('enter') . ' ' . _t('feature_image') . '...' }} @endslot
    @endcomponent

    @component('common-components.forms.select',[
        'options' => \Modules\Blog\Entities\BlogPost::statuses(),
        'props' => [],
    ])
        @slot('field') status @endslot
        @slot('label') {{ _t('status') }} @endslot
    @endcomponent
</div>
