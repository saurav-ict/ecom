<div class="mb-3">
    <label class="form-label">Name</label>
    <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
           value="{{ old('name', $property->name ?? '') }}">
    @error('name') <div class="invalid-feedback">{{ $message }}</div> @enderror
</div>

<div class="mb-4 form-check">
    <input type="checkbox" name="is_active" id="is_active" class="form-check-input" value="1"
        {{ old('is_active', $property->is_active ?? true) ? 'checked' : '' }}>
    <label class="form-check-label" for="is_active">Active</label>
</div>

<div class="mb-3">
    <label class="form-label fw-semibold">Options</label>

    <div id="options-list" class="d-flex flex-column gap-2 mb-2">
        @foreach(old('options', isset($property) ? $property->options->toArray() : []) as $i => $option)
            <div class="option-row d-flex align-items-center gap-2">
                <input type="hidden" name="options[{{ $i }}][id]" value="{{ $option['id'] ?? '' }}">
                <input type="text" name="options[{{ $i }}][name]"
                       class="form-control" placeholder="Option name"
                       value="{{ $option['name'] ?? '' }}">
                <div class="form-check mb-0 ms-1" style="white-space:nowrap">
                    <input type="checkbox" class="form-check-input"
                           name="options[{{ $i }}][is_active]" value="1"
                           {{ ($option['is_active'] ?? true) ? 'checked' : '' }}>
                    <label class="form-check-label" style="font-size:12px">Active</label>
                </div>
                <button type="button" class="btn btn-sm btn-outline-danger remove-option">
                    <i class="bi bi-x"></i>
                </button>
            </div>
        @endforeach
    </div>

    <button type="button" id="add-option" class="btn btn-sm btn-outline-primary"
            data-index="{{ count(old('options', isset($property) ? $property->options->toArray() : [])) }}">
        <i class="bi bi-plus-lg me-1"></i> Add Option
    </button>
</div>
