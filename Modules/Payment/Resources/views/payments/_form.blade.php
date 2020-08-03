<div data-repeater-item class="outer">
    @if ($action == 'create')
        @component('common-components.forms.select', [
          'options' => $orders,
          'props' => ['class' => 'select2'],
          ])
            @slot('field') order_id @endslot
            @slot('label') {{ _t('order_number') }} @endslot
        @endcomponent
    @endif
    @component('common-components.forms.number')
        @slot('field') price @endslot
        @slot('label') {{ _t('price') }} @endslot
        @slot('placeholder') {{ _t('enter') . ' ' . _t('price') . '...' }} @endslot
        @slot('min') 0 @endslot
        @slot('max') 9999999999 @endslot
    @endcomponent

    @component('common-components.forms.text')
        @slot('field') comment @endslot
        @slot('label') {{ _t('comment') }} @endslot
        @slot('placeholder') {{ _t('enter') . ' ' . _t('comment') . '...' }} @endslot
    @endcomponent

    @component('common-components.forms.select', [
       'options' => $status,
       'props' => ['class' => 'select2']
       ])
        @slot('field') status @endslot
        @slot('label') {{ _t('status') }} @endslot
    @endcomponent

</div>
