<table class="table">
    <thead>
    <tr class="table-secondary">
        <th>Number</th>
        <th>Order Number</th>
        <th>Supplier</th>
        <th>Price (€)</th>
        <th>Price VAT (€)</th>
        <th>Due date</th>
        <th>Payment</th>
        <th>Actions</th>
    </tr>
    </thead>
    <tbody>
    @forelse($invoices as $invoice)
        <tr class="{{ $invoice->color ? "bg-$invoice->color" : '' }}" style="--bs-bg-opacity: 0.7;">
            <td>{{ $invoice->number }}</td>
            <td>{{ $invoice->order->number }}</td>
            <td>{{ $invoice->order->supplier->name }}</td>
            <td>{{ $invoice->order->formatted_price }}</td>
            <td>{{ $invoice->order->formatted_price_vat ?? '-' }}</td>
            <td>{{ $invoice->formatted_due_date }}</td>
            <td>
                @if($invoice->payment_date)
                    {{ $invoice->formatted_payment_date }}
                @else
                    <i>Unpaid</i>
                @endif
            </td>
            <td>
                <div class="dropdown">
                    <button class="btn btn-secondary btn-sm dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Actions
                    </button>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="{{ route('invoices.edit', $invoice) }}">Edit</a></li>
                        <li>
                            <form action="{{ route('invoices.destroy', $invoice) }}" method="post">
                                @method('DELETE')
                                @csrf
                                <button type="button" class="dropdown-item confirm-delete"
                                        data-entity="{{ "Invoice $invoice->number" }}">
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

{{ $invoices->links() }}
