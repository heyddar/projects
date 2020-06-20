<select
        data-header="انتخاب نمایید"
        data-live-search="{{ $search ?? 'true' }}"
        multiple
        name="{{ $name }}[]"
        id="input_{{ $name }}"
        class="selectpicker form-control"
        data-selected-text-format="count > {{ $count ?? 1 }}"
        data-style="btn-default"
        {!! isset($max) ? "data-max-options='{$max}'" : ''  !!}
        data-size={{  1 }}
                data-tickIcon={{  'glyphicon-ok' }}
                data-live-search-placeholder="جستجو">
    {{ $options }}

</select>
