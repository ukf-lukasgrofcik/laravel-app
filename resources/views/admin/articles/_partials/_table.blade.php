<table class="table">
    <thead>
    <tr class="table-secondary">
        <th>#</th>
        <th>Name</th>
        <th>Content</th>
        <th>Published</th>
        <th>Category</th>
        <th>Tags</th>
        <th>Actions</th>
    </tr>
    </thead>
    <tbody>
    @forelse($articles as $article)
        <tr>
            <td>{{ $articles->id }}</td>
            <td>{{ $articles->name }}</td>
            <td>{{ str($articles->content)->limit(64) }}</td>
            <td>{{ $articles->published }}</td>
            <td>{{ $articles->category?->name ?? 'Bez kategórie' }}</td>
            <td>{{ $articles->tags->count() }}</td>
            <td>
                <div class="dropdown">
                    <button class="btn btn-secondary btn-sm dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Actions
                    </button>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="{{ route('articles.edit', $articles) }}">Edit</a></li>
                        <li>
                            <form action="{{ route('articles.destroy', $articles) }}" method="post">
                                @method('DELETE')
                                @csrf
                                <button type="button" class="dropdown-item confirm-delete"
                                        data-entity="{{ "Article $articles->name" }}">
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
