@php $blog = $blog ?? null; @endphp

@if ($errors->any())
<div class="alert alert-danger">
    <ul class="mb-0">
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

<div class="form-group">
    <select class="form-select" name="blog_category_id" required>
        <option value="">All Categories</option>
        @foreach($blogCategories as $category)
        <option value="{{ $category->blog_category_id }}">
            {{ $category->text }}
        </option>
        @endforeach
    </select>
</div>
<div class="form-group">
    <label>Title</label>
    <input type="text" name="title" class="form-control" value="{{ old('title', $blog->title ?? '') }}" required>
</div>
<div class="form-group">
    <label>Description</label>
    <textarea name="description" class="form-control" required>{{ old('description', $blog->description ?? '') }}</textarea>
</div>
<div class="form-group">
    <label>Author</label>
    <input name="author" class="form-control" required value="{{ old('author', $blog->author ?? '') }}"></input>
</div>
<div class="form-group">
    <label>Tag</label>
<input type="text" name="tag_name" class="form-control" 
           value="{{ old('tag_name', isset($blog) ? $blog->blogTags->pluck('tag_name')->implode(', ') : '') }}">
</div>
<div class="form-group">
    <label>Quote</label>
    <input name="quote" class="form-control" required value="{{ old('text', isset($blog) ? $blog->blogQuote->text : '') }}"></input>
</div>
<div class="form-group">
    <label>Image</label>
    <input type="file" name="image" class="form-control">
    @if (!empty($blog->image))
    <img src="{{ asset('storage/' . $blog->image) }}" width="100" class="mt-2">
    @endif
</div>
<div class="row">
    <div class="col-12">
        <h4>Comment</h4>
    </div>
    <div class="col-6">
        <div class="form-group">
            <label>Name</label>
            <input name="name" class="form-control" value="{{ old('name', $blog->name ?? '') }}"></input>
        </div>
    </div>
    <div class="col-6">
        <div class="form-group">
            <label>Email</label>
            <input name="email" class="form-control" value="{{ old('email', $blog->email ?? '') }}"></input>
        </div>
    </div>
    <div class="col-12">
        <div class="form-group">
            <label>Website</label>
            <input name="website" class="form-control" value="{{ old('website', $blog->website ?? '') }}"></input>
        </div>
    </div>
    <div class="col-12">
        <div class="form-group">
            <label>Comment</label>
            <input name="comment" class="form-control" value="{{ old('comment', $blog->comment ?? '') }}"></input>
        </div>
    </div>
</div>