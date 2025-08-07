@extends('backend')
@section('content')
    <div class="card">
        <div class="card-header">
            <h6 class="mb-0">Create About Us Content</h6>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.about.store') }}" method="POST">
                @csrf
                
                <div class="mb-3">
                    <label for="circle_title" class="form-label">Circle Title</label>
                    <input type="text" class="form-control @error('circle_title') is-invalid @enderror" 
                           id="circle_title" name="circle_title" value="{{ old('circle_title') }}" required>
                    @error('circle_title')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="circle_subtitle" class="form-label">Circle Subtitle</label>
                    <input type="text" class="form-control @error('circle_subtitle') is-invalid @enderror" 
                           id="circle_subtitle" name="circle_subtitle" value="{{ old('circle_subtitle') }}" required>
                    @error('circle_subtitle')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="title_black" class="form-label">Title (Black Part)</label>
                    <input type="text" class="form-control @error('title_black') is-invalid @enderror" 
                           id="title_black" name="title_black" value="{{ old('title_black') }}" required>
                    @error('title_black')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="title_blue" class="form-label">Title (Blue Part)</label>
                    <input type="text" class="form-control @error('title_blue') is-invalid @enderror" 
                           id="title_blue" name="title_blue" value="{{ old('title_blue') }}" required>
                    @error('title_blue')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="title_description" class="form-label">Description</label>
                    <textarea class="form-control @error('title_description') is-invalid @enderror" 
                              id="title_description" name="title_description" rows="4" required>{{ old('title_description') }}</textarea>
                    @error('title_description')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="d-flex justify-content-between">
                    <a href="{{ route('admin.about.index') }}" class="btn btn-secondary">Cancel</a>
                    <button type="submit" class="btn btn-primary">Save About Content</button>
                </div>
            </form>
        </div>
    </div>
@endsection
