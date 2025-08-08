@extends('backend')
@section('content')
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h6 class="mb-0">Edit Achievement - {{ $achievement->achievement_value }} {{ $achievement->achievement_unit }}</h6>
            <a href="{{ route('admin.achievements.index') }}" class="btn btn-secondary btn-sm">Back to Achievements</a>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.achievements.update', $achievement->id) }}" method="POST">
                @csrf
                @method('PUT')
                
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="achievement_value" class="form-label">Achievement Value <span class="text-danger">*</span></label>
                            <input type="text" 
                                   class="form-control @error('achievement_value') is-invalid @enderror" 
                                   id="achievement_value" 
                                   name="achievement_value" 
                                   value="{{ old('achievement_value', $achievement->achievement_value) }}"
                                   placeholder="e.g., 100, 5K, 99%"
                                   required>
                            <small class="form-text text-muted">The main achievement number or value</small>
                            @error('achievement_value')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="achievement_unit" class="form-label">Achievement Unit <span class="text-danger">*</span></label>
                            <input type="text" 
                                   class="form-control @error('achievement_unit') is-invalid @enderror" 
                                   id="achievement_unit" 
                                   name="achievement_unit" 
                                   value="{{ old('achievement_unit', $achievement->achievement_unit) }}"
                                   placeholder="e.g., Projects, Clients, Years"
                                   required>
                            <small class="form-text text-muted">Unit or label for the achievement</small>
                            @error('achievement_unit')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="achievement_description" class="form-label">Achievement Description <span class="text-danger">*</span></label>
                            <input type="text" 
                                   class="form-control @error('achievement_description') is-invalid @enderror" 
                                   id="achievement_description" 
                                   name="achievement_description" 
                                   value="{{ old('achievement_description', $achievement->achievement_description) }}"
                                   placeholder="e.g., Completed Projects, Happy Clients"
                                   required>
                            <small class="form-text text-muted">Brief description of the achievement</small>
                            @error('achievement_description')
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
                                   value="{{ old('sort_order', $achievement->sort_order) }}"
                                   min="0">
                            <small class="form-text text-muted">Lower numbers appear first</small>
                            @error('sort_order')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="d-flex justify-content-between">
                    <a href="{{ route('admin.achievements.index') }}" class="btn btn-secondary">Cancel</a>
                    <button type="submit" class="btn btn-primary">Update Achievement</button>
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
