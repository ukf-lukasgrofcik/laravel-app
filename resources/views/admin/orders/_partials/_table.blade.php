<table class="table">
    <thead>
    <tr class="table-secondary">
        <th>Number</th>
        <th>Supplier</th>
        <th>Items</th>
        <th>Price (€)</th>
        <th>Price VAT (€)</th>
        <th>Actions</th>
    </tr>
    </thead>
    <tbody>
    @forelse($orders as $order)
        <tr>
            <td>{{ $order->number }}</td>
            <td>{{ $order->supplier->name }}</td>
            <td>{{ $order->items_count }}</td>
            <td>{{ $order->formatted_price }}</td>
            <td>{{ $order->formatted_price_vat ?? '-' }}</td>
            <td>
                <div class="dropdown">
                    <button class="btn btn-secondary btn-sm dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Actions
                    </button>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="{{ route('orders.edit', $order) }}">Edit</a></li>
                        <li>
                            <form action="{{ route('orders.destroy', $order) }}" method="post">
                                @method('DELETE')
                                @csrf
                                <button type="button" class="dropdown-item confirm-delete"
                                        data-entity="{{ "Order $order->number" }}">
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

{{ $orders->links() }}
