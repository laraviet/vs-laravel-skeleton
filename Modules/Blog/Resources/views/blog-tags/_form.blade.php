<div data-repeater-item class="outer">
    @component('common-components.forms.text')
        @slot('field') name @endslot
        @slot('label') {{ _t('name') }} @endslot
        @slot('placeholder') {{ _t('enter') . ' ' . _t('name') . '...' }} @endslot
    @endcomponent

    @component('common-components.forms.select',[
        'options' => \Modules\Blog\Entities\BlogTag::statuses(),
        'props' => [],
    ])
        @slot('field') status @endslot
        @slot('label') {{ _t('status') }} @endslot
    @endcomponent
</div>
