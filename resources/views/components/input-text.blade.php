<div>
    <!-- It is not the man who has too little, but the man who craves more, that is poor. - Seneca -->
    <div class="row">
        <label for="" class="col-sm-12 col-form-label"> {{ $labelName }} </label>
    </div>
    <div class="col-sm-12">
    <div class="form-group {{ $errors->has($varName) ? 'has-danger': ''}} ">
            <input type={{ $type }} name={{ $varName }} id="input-{{ $varName }}" class="form-control {{ $errors->has($varName) ? 'is-invalid': ''}}" placeholder="{{$placeholderName}}" required aria-required="true" value="{{old($varName, $dbvalue ?? null)}}">
            @if($type=="password")
                <input type="checkbox" onclick="viewPassword_{{ $varName }}()">Show Password
            @endif
            @if($errors->has($varName))
            <span id="{{ $varName }}-name" class="error text-danger" for='input-{{ $varName }}'>
                {{ $errors->first($varName) }}
            </span>
            @endif
        </div>
    </div>
</div>

{{-- <div class="row">
    <label for="" class="col-sm-12 col-form-label"> {{ __("Category Name") }} </label>
</div>
<div class="col-sm-12">
    <div class="form-group {{ $errors->has('categoryname') ? 'has-danger': ''}} ">
        <input type="text" name="categoryname" id="input-categoryname" class="form-control {{ $errors->has('categoryname') ? 'is-invalid': ''}}" placeholder="{{ __('Add New Category') }}" required aria-required="true" value=" {{ old('categoryname') }} ">
        @if($errors->has('categoryname'))
        <span id="category-name" class="error text-danger" for='input-categoryname'>
            {{ $errors->first('categoryname') }}
        </span>
        @endif
    </div>
</div> --}}