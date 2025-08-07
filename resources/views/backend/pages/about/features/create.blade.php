@extends('backend')
@section('content')
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h6 class="mb-0">Add New Feature - {{ $about->title_black }} {{ $about->title_blue }}</h6>
            <a href="{{ route('admin.about.features', $about->id) }}" class="btn btn-secondary btn-sm">Back to Features</a>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.about.features.store', $about->id) }}" method="POST">
                @csrf
                
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="icon_path" class="form-label">Icon Path <span class="text-danger">*</span></label>
                            <input type="text" 
                                   class="form-control @error('icon_path') is-invalid @enderror" 
                                   id="icon_path" 
                                   name="icon_path" 
                                   value="{{ old('icon_path') }}"
                                   placeholder="e.g., fas fa-star, or path/to/icon.svg"
                                   required>
                            <small class="form-text text-muted">Enter FontAwesome class or icon file path</small>
                            @error('icon_path')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="sort_order" class="form-label">Sort Order</label>
                            <input type="number" 
                                   class="form-control @error('sort_order') is-invalid @enderror" 
                                   id="sort_order" 
                                   name="sort_order" 
                                   value="{{ old('sort_order', 0) }}"
                                   min="0">
                            <small class="form-text text-muted">Lower numbers appear first</small>
                            @error('sort_order')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="mb-3">
                    <label for="title" class="form-label">Feature Title <span class="text-danger">*</span></label>
                    <input type="text" 
                           class="form-control @error('title') is-invalid @enderror" 
                           id="title" 
                           name="title" 
                           value="{{ old('title') }}"
                           placeholder="Enter feature title"
                           required>
                    @error('title')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="description" class="form-label">Feature Description <span class="text-danger">*</span></label>
                    <textarea class="form-control @error('description') is-invalid @enderror" 
                              id="description" 
                              name="description" 
                              rows="4"
                              placeholder="Enter detailed description of this feature"
                              required>{{ old('description') }}</textarea>
                    @error('description')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <div class="form-check">
                        <input class="form-check-input" 
                               type="checkbox" 
                               id="is_active" 
                               name="is_active" 
                               value="1"
                               {{ old('is_active', true) ? 'checked' : '' }}>
                        <label class="form-check-label" for="is_active">
                            Active (Show on frontend)
                        </label>
                    </div>
                </div>

                <div class="d-flex justify-content-between">
                    <a href="{{ route('admin.about.features', $about->id) }}" class="btn btn-secondary">Cancel</a>
                    <button type="submit" class="btn btn-primary">Create Feature</button>
                </div>
            </form>
        </div>
    </div>

    <script>
        @if(session()->has('swal'))
            @php $swal = session('swal'); @endphp
            Swal.fire({
                title: '{{ $swal['title'] }}',
                text: '{{ $swal['text'] }}',
                icon: '{{ $swal['icon'] }}',
                timer: 3000
            });
        @endif
    </script>
@endsection
