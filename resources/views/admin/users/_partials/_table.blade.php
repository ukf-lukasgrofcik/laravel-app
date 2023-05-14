<table class="table">
    <thead>
    <tr class="table-secondary">
        <th scope="col">#</th>
        <th scope="col">Full name</th>
        <th scope="col">E-mail</th>
        <th scope="col">Role</th>
        <th scope="col">Actions</th>
    </tr>
    </thead>
    <tbody>
    @foreach($users as $user)
        <tr>
            <th scope="row">{{ $user->id }}</th>
            <td>{{ $user->full_name }}</td>
            <td>{{ $user->email }}</td>
            <td>{{ $user->formatted_role }}</td>
            <td>
                <div class="dropdown">
                    <button class="btn btn-secondary btn-sm dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Actions
                    </button>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="{{ route('users.edit', $user) }}">Edit</a></li>
                        <li>
                            <form action="{{ route('users.destroy', $user) }}" method="post">
                                @csrf
                                <button type="button" class="dropdown-item confirm-delete"
                                        data-entity="User {{ $user->full_name }}">
                                    Delete
                                </button>
                            </form>
                        </li>
                    </ul>
                </div>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
