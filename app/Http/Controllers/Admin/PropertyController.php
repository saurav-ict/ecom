<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePropertyRequest;
use App\Http\Requests\UpdatePropertyRequest;
use App\Models\Property;
use App\Models\PropertyOption;

class PropertyController extends Controller
{
    public function index()
    {
        $properties = Property::withCount('options')->latest()->paginate(10);
        return view('admin.properties.index', compact('properties'));
    }

    public function create()
    {
        return view('admin.properties.create');
    }

    public function store(StorePropertyRequest $request)
    {
        $property = Property::create([
            'name'      => $request->name,
            'is_active' => $request->boolean('is_active'),
        ]);

        $this->syncOptions($property, $request->input('options', []));

        return redirect()->route('admin.properties.index')->with('success', 'Property created.');
    }

    public function edit(Property $property)
    {
        $property->load('options');
        return view('admin.properties.edit', compact('property'));
    }

    public function update(UpdatePropertyRequest $request, Property $property)
    {
        $property->update([
            'name'      => $request->name,
            'is_active' => $request->boolean('is_active'),
        ]);

        $this->syncOptions($property, $request->input('options', []));

        return redirect()->route('admin.properties.index')->with('success', 'Property updated.');
    }

    public function destroy(Property $property)
    {
        $property->delete();
        return redirect()->route('admin.properties.index')->with('success', 'Property deleted.');
    }

    private function syncOptions(Property $property, array $options): void
    {
        $keepIds = [];

        foreach ($options as $option) {
            $name = trim($option['name'] ?? '');
            if ($name === '') continue;

            $id = $option['id'] ?? null;

            $record = $id
                ? $property->options()->find($id)
                : null;

            if ($record) {
                $record->update(['name' => $name, 'is_active' => isset($option['is_active'])]);
            } else {
                $record = $property->options()->create(['name' => $name, 'is_active' => isset($option['is_active'])]);
            }

            $keepIds[] = $record->id;
        }

        $property->options()->whereNotIn('id', $keepIds)->delete();
    }
}
