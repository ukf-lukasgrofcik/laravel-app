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
            <td>{{ $article->id }}</td>
            <td>{{ $article->name }}</td>
            <td>{{ str($article->content)->limit(64) }}</td>
            <td>
                @if($article->published)
                    <i class="fa-solid fa-check fa-xl text-success"></i>
                @else
                    <i class="fa-solid fa-times fa-xl text-danger"></i>
                @endif
            </td>
            <td>{{ $article->category?->name ?? 'Bez kategórie' }}</td>
            <td>{{ $article->tags->count() }}</td>
            <td>
                <div class="dropdown">
                    <button class="btn btn-secondary btn-sm dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Actions
                    </button>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="{{ route('articles.edit', $article) }}">Edit</a></li>
                        <li>
                            <form action="{{ route('articles.destroy', $article) }}" method="post">
                                @method('DELETE')
                                @csrf
                                <button type="button" class="dropdown-item confirm-delete"
                                        data-entity="{{ "Article $article->name" }}">
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

{{ $articles->links() }}
