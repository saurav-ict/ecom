<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\Property;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    private function formData(): array
    {
        return [
            'brands'     => Brand::where('is_active', true)->get(),
            'categories' => Category::where('is_active', true)->get(),
            'properties' => Property::where('is_active', true)
                ->with(['options' => fn($q) => $q->where('is_active', true)])
                ->get()
                ->filter(fn($p) => $p->options->isNotEmpty())
                ->values(),
        ];
    }

    private function uniqueSlug(string $name, ?int $ignoreId = null): string
    {
        $slug     = Str::slug($name);
        $original = $slug;
        $i        = 1;

        while (
            Product::where('slug', $slug)
                ->when($ignoreId, fn($q) => $q->where('id', '!=', $ignoreId))
                ->exists()
        ) {
            $slug = $original . '-' . $i++;
        }

        return $slug;
    }

    private function selectedOptions(array $properties): array
    {
        return array_values(array_filter($properties));
    }

    public function index()
    {
        $products = Product::with('brand')->latest()->paginate(10);
        return view('admin.products.index', compact('products'));
    }

    public function create()
    {
        return view('admin.products.create', $this->formData());
    }

    public function store(StoreProductRequest $request)
    {
        $data = [
            'name'        => $request->name,
            'sku'         => $request->sku,
            'slug'        => $this->uniqueSlug($request->name),
            'description' => $request->description,
            'price'       => $request->price,
            'stock'       => $request->stock,
            'brand_id'    => $request->brand_id,
            'is_active'   => $request->boolean('is_active'),
        ];

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('products', 'public');
        }

        $product = Product::create($data);
        $product->categories()->sync($request->input('categories', []));
        $product->propertyOptions()->sync($this->selectedOptions($request->input('properties', [])));

        return redirect()->route('admin.products.index')->with('success', 'Product created.');
    }

    public function edit(Product $product)
    {
        $product->load('categories', 'propertyOptions');
        return view('admin.products.edit', array_merge($this->formData(), compact('product')));
    }

    public function update(UpdateProductRequest $request, Product $product)
    {
        $data = [
            'name'        => $request->name,
            'sku'         => $request->sku,
            'slug'        => $this->uniqueSlug($request->name, $product->id),
            'description' => $request->description,
            'price'       => $request->price,
            'stock'       => $request->stock,
            'brand_id'    => $request->brand_id,
            'is_active'   => $request->boolean('is_active'),
        ];

        if ($request->hasFile('image')) {
            if ($product->image) {
                Storage::disk('public')->delete($product->image);
            }
            $data['image'] = $request->file('image')->store('products', 'public');
        }

        $product->update($data);
        $product->categories()->sync($request->input('categories', []));
        $product->propertyOptions()->sync($this->selectedOptions($request->input('properties', [])));

        return redirect()->route('admin.products.index')->with('success', 'Product updated.');
    }

    public function destroy(Product $product)
    {
        if ($product->image) {
            Storage::disk('public')->delete($product->image);
        }

        $product->delete();

        return redirect()->route('admin.products.index')->with('success', 'Product deleted.');
    }
}
