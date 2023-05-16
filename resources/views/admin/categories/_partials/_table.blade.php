<table class="table">
    <thead>
    <tr class="table-secondary">
        <th>#</th>
        <th>Name</th>
        <th>Description</th>
        <th>Actions</th>
    </tr>
    </thead>
    <tbody>
    @forelse($categories as $category)
        <tr>
            <td>{{ $category->id }}</td>
            <td>{{ $category->name }}</td>
            <td>{{ str($category->description)->limit(64) }}</td>
            <td>
                <div class="dropdown">
                    <button class="btn btn-secondary btn-sm dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Actions
                    </button>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="{{ route('categories.edit', $category) }}">Edit</a></li>
                        <li>
                            <form action="{{ route('categories.destroy', $category) }}" method="post">
                                @method('DELETE')
                                @csrf
                                <button type="button" class="dropdown-item confirm-delete"
                                        data-entity="{{ "Category $category->name" }}">
                                    Delete
                                </button>
                            </form>
                        </li>
                    </ul>
                </div>
            </td>
        </tr>
    @empty
        <tr>
            <td class="text-center fst-italic" colspan="100%">No entries to show</td>
        </tr>
    @endforelse
    </tbody>
</table>
