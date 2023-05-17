<table class="table">
    <thead>
    <tr class="table-secondary">
        <th>#</th>
        <th>Name</th>
        <th>Description</th>
        <th>Articles</th>
        <th>Actions</th>
    </tr>
    </thead>
    <tbody>
    @forelse($tags as $tag)
        <tr>
            <td>{{ $tag->id }}</td>
            <td>{{ $tag->name }}</td>
            <td>{{ str($tag->description)->limit(64) }}</td>
            <td>{{ $tag->articles_count }}</td>
            <td>
                <div class="dropdown">
                    <button class="btn btn-secondary btn-sm dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Actions
                    </button>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="{{ route('tags.edit', $tag) }}">Edit</a></li>
                        <li>
                            <form action="{{ route('tags.destroy', $tag) }}" method="post">
                                @method('DELETE')
                                @csrf
                                <button type="button" class="dropdown-item confirm-delete"
                                        data-entity="{{ "Tag $tag->name" }}">
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

{{ $tags->links() }}
