@extends('backend')
@section('content')
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h6 class="mb-0">About Us Page Data</h6>
            <a href="{{ route('admin.about.create') }}" class="btn btn-primary btn-sm">Add About Content</a>
        </div>
        <div class="card-body p-0">
            @if($abouts->count() > 0)
                <!-- Desktop Table View -->
                <div class="table-responsive p-0 d-none d-md-block">
                    <table class="table table-hover mb-0">
                        <thead>
                            <tr>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Circle Title</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Circle Subtitle</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Title Black</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Title Blue</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Description</th>
                                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Actions</th>
                                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Activate</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($abouts as $about)
                                <tr>
                                    <td>
                                        <span class="text-xs font-weight-bold">{{ $about->circle_title }}</span>
                                    </td>
                                    <td>
                                        <span class="text-xs font-weight-bold">{{ $about->circle_subtitle }}</span>
                                    </td>
                                    <td>
                                        <span class="text-xs font-weight-bold">{{ $about->title_black }}</span>
                                    </td>
                                    <td>
                                        <span class="text-xs font-weight-bold text-primary">{{ $about->title_blue }}</span>
                                    </td>
                                    <td>
                                        <span class="text-xs">{{ Str::limit($about->title_description, 50) }}</span>
                                    </td>
                                    <td class="text-center">
                                        <a href="{{ route('admin.about.edit', $about->id) }}" class="btn btn-sm btn-info me-1">Edit</a>
                                        <form action="{{ route('admin.about.destroy', $about->id) }}" method="POST" style="display:inline-block">
                                            @csrf 
                                            @method('DELETE')
                                            <button onclick="return confirm('Delete this about section?')" class="btn btn-sm btn-danger">Delete</button>
                                        </form>
                                    </td>
                                    <td class="text-center">
                                        <form action="{{ route('admin.about.toggle', $about->id) }}" method="POST" style="display:inline;">
                                            @csrf
                                            @method('PATCH')
                                            <label class="switch">
                                                <input type="checkbox" onchange="this.form.submit()" {{ $about->is_activated ? 'checked' : '' }}>
                                                <span class="slider"></span>
                                            </label>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <!-- Mobile Card View -->
                <div class="d-block d-md-none">
                    @foreach($abouts as $about)
                        <div class="card mb-3 mx-3">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-12">
                                        <h6 class="mb-2">
                                            <span class="text-dark">{{ $about->title_black }}</span>
                                            <span class="text-primary">{{ $about->title_blue }}</span>
                                            @if($about->is_activated)
                                                <span class="badge bg-success ms-2">Active</span>
                                            @else
                                                <span class="badge bg-secondary ms-2">Inactive</span>
                                            @endif
                                        </h6>
                                        <p class="text-sm mb-2"><strong>Circle:</strong> {{ $about->circle_title }} - {{ $about->circle_subtitle }}</p>
                                        <p class="text-sm mb-3">{{ Str::limit($about->title_description, 80) }}</p>
                                        
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div>
                                                <a href="{{ route('admin.about.edit', $about->id) }}" class="btn btn-sm btn-info me-2">Edit</a>
                                                <form action="{{ route('admin.about.destroy', $about->id) }}" method="POST" style="display:inline-block">
                                                    @csrf 
                                                    @method('DELETE')
                                                    <button onclick="return confirm('Delete this about section?')" class="btn btn-sm btn-danger">Delete</button>
                                                </form>
                                            </div>
                                            <div>
                                                <form action="{{ route('admin.about.toggle', $about->id) }}" method="POST" style="display:inline;">
                                                    @csrf
                                                    @method('PATCH')
                                                    <label class="switch">
                                                        <input type="checkbox" onchange="this.form.submit()" {{ $about->is_activated ? 'checked' : '' }}>
                                                        <span class="slider"></span>
                                                    </label>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <div class="text-center p-4">
                    <p>No about content found.</p>
                    <a href="{{ route('admin.about.create') }}" class="btn btn-primary">Create About Content</a>
                </div>
            @endif
        </div>
    </div>

    @if(session('success'))
        <div class="alert alert-success mt-3">
            {{ session('success') }}
        </div>
    @endif

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

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        console.log('SweetAlert2 loaded');
        @if(session()->has('swal'))
            @php $swal = session('swal'); @endphp
            console.log('Session swal data found:', @json($swal));
            Swal.fire({
                title: '{{ $swal['title'] }}',
                text: '{{ $swal['text'] }}',
                icon: '{{ $swal['icon'] }}',
                confirmButtonText: 'OK'
            });
        @else
            console.log('No swal session data found');
        @endif
    </script>
@endsection
