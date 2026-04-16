<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCustomerRequest;
use App\Http\Requests\UpdateCustomerRequest;
use App\Models\User;

class CustomerController extends Controller
{
    public function index()
    {
        $customers = User::latest()->paginate(10);
        return view('admin.customers.index', compact('customers'));
    }

    public function create()
    {
        return view('admin.customers.create');
    }

    public function update(UpdateCustomerRequest $request, User $customer)
    {
        $data = $request->only(['name', 'email', 'role', 'phone', 'address']);

        if ($request->filled('password')) {
            $data['password'] = bcrypt($request->password);
        }

        $customer->update($data);

        return redirect()->route('admin.customers.index')->with('success', 'Customer updated successfully.');
    }

    public function edit(User $customer)
    {
        return view('admin.customers.edit', compact('customer'));
    }
}
