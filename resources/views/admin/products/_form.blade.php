<div class="row g-4">

    {{-- Left Column --}}
    <div class="col-lg-8">

        {{-- Basic Info --}}
        <div class="card mb-4">
            <div class="card-header">Basic Information</div>
            <div class="card-body">
                <div class="mb-3">
                    <label class="form-label">Name</label>
                    <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                           value="{{ old('name', $product->name ?? '') }}">
                    @error('name') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label">SKU <span class="text-muted" style="font-size:12px">(optional)</span></label>
                    <input type="text" name="sku" class="form-control @error('sku') is-invalid @enderror"
                           placeholder="e.g. PRD-0001"
                           value="{{ old('sku', $product->sku ?? '') }}">
                    @error('sku') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label">Description</label>
                    <textarea name="description" rows="4"
                              class="form-control @error('description') is-invalid @enderror">{{ old('description', $product->description ?? '') }}</textarea>
                    @error('description') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

                <div class="row g-3">
                    <div class="col-md-6">
                        <label class="form-label">Price</label>
                        <div class="input-group">
                            <span class="input-group-text">$</span>
                            <input type="number" name="price" step="0.01" min="0"
                                   class="form-control @error('price') is-invalid @enderror"
                                   value="{{ old('price', $product->price ?? '') }}">
                            @error('price') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Stock</label>
                        <input type="number" name="stock" min="0"
                               class="form-control @error('stock') is-invalid @enderror"
                               value="{{ old('stock', $product->stock ?? 0) }}">
                        @error('stock') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>
                </div>
            </div>
        </div>

        {{-- Properties --}}
        <div class="card mb-4">
            <div class="card-header">Properties</div>
            <div class="card-body">
                @forelse($properties as $property)
                    <div class="mb-4">
                        <label class="form-label fw-semibold d-block mb-2">
                            <i class="bi bi-tag me-1" style="color:var(--primary)"></i>{{ $property->name }}
                        </label>
                        <div class="d-flex flex-wrap gap-2">
                            @foreach($property->options as $option)
                                @php
                                    $oldVal   = old('properties.' . $property->id);
                                    $selected = isset($product)
                                        ? $product->propertyOptions->contains($option->id)
                                        : ($oldVal == $option->id);
                                @endphp
                                <label class="prop-badge {{ $selected ? 'prop-badge--active' : '' }}">
                                    <input type="radio"
                                           name="properties[{{ $property->id }}]"
                                           value="{{ $option->id }}"
                                           {{ $selected ? 'checked' : '' }}
                                           style="display:none"
                                           onchange="toggleRadioBadge(this)">
                                    {{ $option->name }}
                                </label>
                            @endforeach
                        </div>
                    </div>
                    @if(!$loop->last)<hr class="my-2">@endif
                @empty
                    <p class="text-muted mb-0" style="font-size:13px">
                        <i class="bi bi-info-circle me-1"></i>No properties available. <a href="{{ route('admin.properties.create') }}">Add properties</a>
                    </p>
                @endforelse
            </div>
        </div>

    </div>

    {{-- Right Column --}}
    <div class="col-lg-4">

        {{-- Status --}}
        <div class="card mb-4">
            <div class="card-header">Status</div>
            <div class="card-body">
                <div class="form-check form-switch">
                    <input class="form-check-input" type="checkbox" name="is_active"
                           id="is_active" value="1"
                           {{ old('is_active', $product->is_active ?? true) ? 'checked' : '' }}>
                    <label class="form-check-label" for="is_active">Active</label>
                </div>
            </div>
        </div>

        {{-- Image --}}
        <div class="card mb-4">
            <div class="card-header">Image</div>
            <div class="card-body">
                @if(isset($product) && $product->image)
                    <img src="{{ Str::startsWith($product->image, ['http://', 'https://']) ? $product->image : asset('storage/' . $product->image) }}" class="img-fluid rounded mb-2"
                         style="max-height:160px;object-fit:cover;width:100%;">
                @endif
                <input type="file" name="image" accept="image/*"
                       class="form-control @error('image') is-invalid @enderror"
                       data-preview="#imagePreview">
                @error('image') <div class="invalid-feedback">{{ $message }}</div> @enderror
                <img id="imagePreview" src="#" alt="Preview"
                     style="display:none;margin-top:10px;width:100%;max-height:160px;object-fit:cover;border-radius:8px;">
            </div>
        </div>

        {{-- Brand --}}
        <div class="card mb-4">
            <div class="card-header">Brand</div>
            <div class="card-body">
                <select name="brand_id" class="form-select @error('brand_id') is-invalid @enderror">
                    <option value="">— None —</option>
                    @foreach($brands as $brand)
                        <option value="{{ $brand->id }}"
                            {{ old('brand_id', $product->brand_id ?? '') == $brand->id ? 'selected' : '' }}>
                            {{ $brand->name }}
                        </option>
                    @endforeach
                </select>
                @error('brand_id') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>
        </div>

        {{-- Categories --}}
        <div class="card mb-4">
            <div class="card-header">Categories</div>
            <div class="card-body">
                @forelse($categories as $category)
                    @php
                        $checked = isset($product)
                            ? $product->categories->contains($category->id)
                            : in_array($category->id, old('categories', []));
                    @endphp
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox"
                               name="categories[]" value="{{ $category->id }}"
                               id="cat_{{ $category->id }}"
                               {{ $checked ? 'checked' : '' }}>
                        <label class="form-check-label" for="cat_{{ $category->id }}">
                            {{ $category->name }}
                        </label>
                    </div>
                @empty
                    <p class="text-muted mb-0" style="font-size:13px">No categories available.</p>
                @endforelse
                @error('categories') <div class="text-danger" style="font-size:13px">{{ $message }}</div> @enderror
            </div>
        </div>

    </div>
</div>
