<div class="mb-3">
    <label class="form-label">Name</label>
    <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
        value="{{ old('name', $customer->name ?? '') }}">
    @error('name') <div class="invalid-feedback">{{ $message }}</div> @enderror
</div>

<div class="mb-3">
    <label class="form-label">Email</label>
    <input type="email" name="email" class="form-control @error('email') is-invalid @enderror"
        value="{{ old('email', $customer->email ?? '') }}">
    @error('email') <div class="invalid-feedback">{{ $message }}</div> @enderror
</div>

<div class="mb-3">
    <label class="form-label">Password</label>
    <input type="password" name="password" class="form-control @error('password') is-invalid @enderror"
        value="{{ old('password', $customer->password ?? '') }}">
    @error('password') <div class="invalid-feedback">{{ $message }}</div> @enderror
</div>

<div class="mb-3">
    <label class="form-label">Role</label>
    <select name="role" class="form-select @error('role') is-invalid @enderror">
        <option value="1" {{ old('role', $customer->role ?? '') == 1 ? 'selected' : '' }}>Admin</option>
        <option value="0" {{ old('role', $customer->role ?? '') == 0 ? 'selected' : '' }}>User</option>
    </select>

    @error('role')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label class="form-label">Phone</label>
    <input 
        type="text" 
        name="phone" 
        value="{{ old('phone', $customer->phone ?? '') }}" 
        class="form-control @error('phone') is-invalid @enderror"
    >

    @error('phone')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label class="form-label">Address</label>
    <textarea 
        name="address" 
        class="form-control @error('address') is-invalid @enderror"
        rows="3"
    >{{ old('address', $customer->address ?? '') }}</textarea>

    @error('address')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>