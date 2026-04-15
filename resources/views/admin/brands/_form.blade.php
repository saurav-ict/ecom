<div class="mb-3">
    <label class="form-label">Name</label>
    <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
        value="{{ old('name', $brand->name ?? '') }}">
    @error('name') <div class="invalid-feedback">{{ $message }}</div> @enderror
</div>

<div class="mb-3">
    <label class="form-label">Logo</label>

    @if(isset($brand) && $brand->logo)
        <div class="mb-2">
            <img src="{{ asset('storage/' . $brand->logo) }}" alt="Current Logo"
                 style="height:60px;object-fit:contain;border-radius:8px;border:1px solid #eee;padding:4px;">
        </div>
    @endif

    <input type="file" name="logo" accept="image/*"
           class="form-control @error('logo') is-invalid @enderror"
           data-preview="#logoPreview">
    @error('logo') <div class="invalid-feedback">{{ $message }}</div> @enderror

    <img id="logoPreview" src="#" alt="Preview"
         style="display:none;margin-top:10px;height:60px;object-fit:contain;border-radius:8px;border:1px solid #eee;padding:4px;">
</div>

<div class="mb-3 form-check">
    <input type="checkbox" name="is_active" id="is_active" class="form-check-input" value="1"
        {{ old('is_active', $brand->is_active ?? true) ? 'checked' : '' }}>
    <label class="form-check-label" for="is_active">Active</label>
</div>
