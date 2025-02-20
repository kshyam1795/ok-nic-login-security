<!DOCTYPE html>
<html>
<head>
    <title>Admin - Users</title>
</head>
<body>
    <h1>Manage Users</h1>
    <form method="POST" action="{{ route('admin.assignRole', $user) }}">
        @csrf
        <select name="roles[]" multiple>
            @foreach($roles as $role)
                <option value="{{ $role->id }}" {{ $user->roles->contains($role->id) ? 'selected' : '' }}>
                    {{ $role->name }}
                </option>
            @endforeach
        </select>
        <button type="submit">Assign Roles</button>
    </form>
</body>
</html>
