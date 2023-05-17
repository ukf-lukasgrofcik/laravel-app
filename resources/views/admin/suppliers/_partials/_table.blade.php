<table class="table">
    <thead>
    <tr class="table-secondary">
        <th>#</th>
        <th>Name</th>
        <th>Full address</th>
        <th>Business ID</th>
        <th>Contact</th>
        <th>Actions</th>
    </tr>
    </thead>
    <tbody>
    @forelse($suppliers as $supplier)
        <tr>
            <td>{{ $supplier->id }}</td>
            <td>{{ $supplier->name }}</td>
            <td>{{ $supplier->full_address }}</td>
            <td>{{ $supplier->business_id }}</td>
            <td>
                <a href="mailto:{{ $supplier->email }}" class="btn btn-dark px-2 py-1">
                    <i class="fa-solid fa-envelope"></i>
                </a>
                <a href="tel:{{ $supplier->phone }}" class="btn btn-dark px-2 py-1">
                    <i class="fa-solid fa-phone"></i>
                </a>
            </td>
            <td>
                <div class="dropdown">
                    <button class="btn btn-secondary btn-sm dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Actions
                    </button>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="{{ route('suppliers.edit', $supplier) }}">Edit</a></li>
                        <li>
                            <form action="{{ route('suppliers.destroy', $supplier) }}" method="post">
                                @method('DELETE')
                                @csrf
                                <button type="button" class="dropdown-item confirm-delete"
                                        data-entity="{{ "Supplier $supplier->name" }}">
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

{{ $suppliers->links() }}
