<div class="form-group d-flex flex-column flex-md-row mb-2 justify-content-start justify-content-md-end align-items-start align-items-md-center">
    <label for="attribute" class="input_caption mr-2 text-left text-md-right">Атрибут:</label>
    <div class="w-75 input_placeholder_style">
        <div class="row">
        <div class="col">
            <select class="strartline_stick input_placeholder_style form-control position-relative @error('attribute') is-invalid @enderror" id="attribute" name="attribute">
                @foreach ($attributes as $attribute)
                    <option value="{{ $attribute->id }}">{{ $attribute->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="col">
            <select class="strartline_stick input_placeholder_style form-control position-relative @error('attribute') is-invalid @enderror" id="attribute" name="attribute">
            
            </select>
        </div>
        <div class="col">
            <input name="margin" class="input_placeholder_style form-control position-relative">
        </div>
        </div>
    </div>
</div>