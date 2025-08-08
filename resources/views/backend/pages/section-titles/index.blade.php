@extends('backend')
@section('content')
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h6 class="mb-0">Section Titles Management</h6>
            <a href="{{ route('admin.section-titles.create') }}" class="btn btn-primary btn-sm">
                <i class="fas fa-plus"></i> Add Section Title
            </a>
        </div>
        <div class="card-body">
            @if($sectionTitles->count() > 0)
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Section Name</th>
                                <th>Subtitle</th>
                                <th>Title (Black)</th>
                                <th>Title (Blue)</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($sectionTitles as $section)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>
                                        <span class="badge bg-info">{{ ucfirst($section->section_name) }}</span>
                                    </td>
                                    <td>{{ Str::limit($section->subtitle, 30) }}</td>
                                    <td>{{ Str::limit($section->title_black, 30) }}</td>
                                    <td>{{ Str::limit($section->title_blue, 20) }}</td>
                                    <td>
                                        <form action="{{ route('admin.section-titles.toggle', $section->id) }}" method="POST" style="display: inline;">
                                            @csrf
                                            @method('PATCH')
                                            <button type="submit" class="btn btn-sm {{ $section->is_active ? 'btn-success' : 'btn-secondary' }}">
                                                {{ $section->is_active ? 'Active' : 'Inactive' }}
                                            </button>
                                        </form>
                                    </td>
                                    <td>
                                        <div>
                                            <a href="{{ route('admin.section-titles.edit', $section->id) }}" class="btn btn-sm btn-warning me-2">
                                                <span>Edit</span>
                                            </a>
                                            <form action="{{ route('admin.section-titles.destroy', $section->id) }}" method="POST" style="display: inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">
                                                    <span>Delete</span>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @else
                <div class="text-center py-4">
                    <p class="text-muted">No section titles found.</p>
                    <a href="{{ route('admin.section-titles.create') }}" class="btn btn-primary">
                        <i class="fas fa-plus"></i> Create First Section Title
                    </a>
                </div>
            @endif
        </div>
    </div>
@endsection
