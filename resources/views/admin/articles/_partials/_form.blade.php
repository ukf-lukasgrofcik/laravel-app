@csrf

<div class="row mt-3">
    <div class="col-sm-6">
        <label for="name" class="form-label">Name</label>
        <input type="text" name="name" class="form-control {{ $errors->has("name") ? 'is-invalid' : '' }}" id="name" placeholder="Name" value="{{ old('name', $article->name ?? '') }}">
        @include('admin._partials._error', [ 'column' => "name" ])
    </div>

    <div class="col-sm-6">
        <input type="checkbox" name="published" class="form-check-input {{ $errors->has("published") ? 'is-invalid' : '' }}" id="published" {{ old('published', $article->published ?? 0) ? 'checked' : '' }}>
        <label class="form-check-label" for="published">Published</label>
        @include('admin._partials._error', [ 'column' => "published" ])
    </div>
</div>

<div class="row mt-3">
    <div class="col-sm-6">
        <label for="category_id" class="form-label">Category</label>
        <select id="category_id" name="category_id" class="form-select {{ $errors->has("category_id") ? 'is-invalid' : '' }}">
            <option value>Choose category</option>
            @foreach($categories as $category)
                <option value="{{ $category->id }}" {{ $category->id == $article->category_id ? 'selected' : '' }}>{{ $category->name }}</option>
            @endforeach
        </select>
        @include('admin._partials._error', [ 'column' => "category_id" ])
    </div>

    <div class="col-sm-6">
        <label for="tags" class="form-label">Tags</label>
        <select id="tags" name="tags" multiple class="form-select {{ $errors->has("tags") ? 'is-invalid' : '' }}">
            @foreach($tags as $tag)
                <option value="{{ $tag->id }}" {{ $article->tags->contains('id', $tag->id) ? 'selected' : '' }}>{{ $tag->name }}</option>
            @endforeach
        </select>
        @include('admin._partials._error', [ 'column' => "tags" ])
        @include('admin._partials._error', [ 'column' => "tags.*" ])
    </div>
</div>

<div class="row mt-3">
    <div class="col-sm-12">
        <label for="content" class="form-label">Content</label>
        <textarea name="content" class="form-control {{ $errors->has("content") ? 'is-invalid' : '' }}" id="content">{{ old('content', $category->content ?? '') }}</textarea>
        @include('admin._partials._error', [ 'column' => "content" ])
    </div>
</div>

<div class="row mt-3">
    <div class="col-sm-12">
        <button type="submit" class="btn btn-success">Save</button>
    </div>
</div>
