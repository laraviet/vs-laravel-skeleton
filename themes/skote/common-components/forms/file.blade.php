<div class="form-group row mb-4">
    <label for="{{ $field }}"
           class="col-form-label col-lg-2">{{ $label }}</label>
    <div class="col-lg-10">
        <input type="file" class="form-control" id="customFile" name="{{ $field }}"
               @if(isset($multiple)) multiple @endif>
    </div>
</div>
