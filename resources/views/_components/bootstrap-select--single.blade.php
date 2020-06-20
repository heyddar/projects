<select
        data-header="انتخاب نمایید"
        data-style="btn-default"
        data-live-search="{{ $search ?? 'true' }}"
        name="{{ $name }}"
        id="input_{{ $name }}"
        class="selectpicker form-control"
        data-live-search-placeholder="جستجو">
    <option value="">انتخاب کنید...</option>

    {{ $options }}

</select>
