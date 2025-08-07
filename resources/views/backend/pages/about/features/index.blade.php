@extends('backend')
@section('content')
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <div>
                <h6 class="mb-0">About Features for: {{ $about->title_black }} {{ $about->title_blue }}</h6>
                <small class="text-muted">Manage dynamic features for this about page</small>
            </div>
            <div>
                <a href="{{ route('admin.about.index') }}" class="btn btn-secondary btn-sm me-2">Back to About Pages</a>
                <a href="{{ route('admin.about.features.create', $about->id) }}" class="btn btn-primary btn-sm">Add Feature</a>
            </div>
        </div>
        <div class="card-body p-0">
            @if($features->count() > 0)
                <table class="table table-hover mb-0">
                    <thead>
                        <tr>
                            <th>Sort Order</th>
                            <th>Icon Path</th>
                            <th>Title</th>
                            <th>Description</th>
                            <th>Status</th>
                            <th>Actions</th>
                            <th>Activate (Show)</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($features as $feature)
                            <tr>
                                <td>
                                    <span class="badge bg-info">{{ $feature->sort_order }}</span>
                                </td>
                                <td>
                                    <code class="small">{{ $feature->icon_path }}</code>
                                </td>
                                <td>{{ $feature->title }}</td>
                                <td>{{ Str::limit($feature->description, 60) }}</td>
                                <td>
                                    <span class="badge {{ $feature->is_active ? 'bg-success' : 'bg-secondary' }}">
                                        {{ $feature->is_active ? 'Active' : 'Inactive' }}
                                    </span>
                                </td>
                                <td>
                                    <a href="{{ route('admin.about.features.edit', [$about->id, $feature->id]) }}" class="btn btn-sm btn-info">Edit</a>
                                    <form action="{{ route('admin.about.features.destroy', [$about->id, $feature->id]) }}" method="POST" style="display:inline-block">
                                        @csrf 
                                        @method('DELETE')
                                        <button onclick="return confirm('Delete this feature?')" class="btn btn-sm btn-danger">Delete</button>
                                    </form>
                                </td>
                                <td>
                                    <form action="{{ route('admin.about.features.toggle', [$about->id, $feature->id]) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('PATCH')
                                        <label class="switch">
                                            <input type="checkbox" onchange="this.form.submit()" {{ $feature->is_active ? 'checked' : '' }}>
                                            <span class="slider"></span>
                                        </label>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @else
                <div class="text-center p-4">
                    <div class="mb-3">
                        <i class="fas fa-list-ul fa-3x text-muted"></i>
                    </div>
                    <h5 class="text-muted">No Features Found</h5>
                    <p class="text-muted">Start by adding dynamic features for this about page.</p>
                    <a href="{{ route('admin.about.features.create', $about->id) }}" class="btn btn-primary">Add First Feature</a>
                </div>
            @endif
        </div>
    </div>

    <style>
        .switch {
            position: relative;
            display: inline-block;
            width: 60px;
            height: 34px;
        }

        .switch input {
            opacity: 0;
            width: 0;
            height: 0;
        }

        .slider {
            position: absolute;
            cursor: pointer;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: #ccc;
            transition: .4s;
            border-radius: 34px;
        }

        .slider:before {
            position: absolute;
            content: "";
            height: 26px;
            width: 26px;
            left: 4px;
            bottom: 4px;
            background-color: white;
            transition: .4s;
            border-radius: 50%;
        }

        input:checked + .slider {
            background-color: #2196F3;
        }

        input:checked + .slider:before {
            transform: translateX(26px);
        }
    </style>

    <script>
        @if(session()->has('swal'))
            @php $swal = session('swal'); @endphp
            console.log('Session swal data found:', @json($swal));
            Swal.fire({
                title: '{{ $swal['title'] }}',
                text: '{{ $swal['text'] }}',
                icon: '{{ $swal['icon'] }}',
                timer: 3000
            });
        @else
            console.log('No session swal data found');
        @endif
    </script>
@endsection
