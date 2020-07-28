<div class="form-group row mb-4">
    <label for="{{ $field }}"
           class="col-form-label col-lg-2">{{ $label }}</label>
    <div class="col-lg-10">
        {!! Form::textarea($field, null, ['placeholder' => $placeholder,'class' => 'form-control', 'id' => 'elm1']) !!}
    </div>
</div>
