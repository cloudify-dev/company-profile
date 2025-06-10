@extends('backend')
@section('content')
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h6 class="mb-0">Team List</h6>
            <a href="{{ route('admin.team.create') }}" class="btn btn-primary btn-sm">Add Team Member</a>
        </div>
        <div class="card-body p-0">
            <table class="table table-hover mb-0">
                <thead>
                    <tr>
                        <th>Image</th>
                        <th>Name</th>
                        <th>Position</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Availability</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($teams as $team)
                        <tr>
                            <td>
                                @if ($team->image)
                                    <img src="{{ asset('storage/' . $team->image) }}" class="avatar avatar-sm me-3"
                                        alt="{{ $team->name }}">
                                @else
                                    <span class="text-muted">No Image</span>
                                @endif
                            </td>
                            <td>{{ $team->name }}</td>
                            <td>{{ $team->position }}</td>
                            <td>{{ $team->email ?? '-' }}</td>
                            <td>{{ $team->phone ?? '-' }}</td>
                            <td>{{ $team->availability ?? '-' }}</td>
                            <td>
                                <a href="{{ route('admin.team.edit', $team->id) }}" class="btn btn-sm btn-info">Edit</a>
                                <form action="{{ route('admin.team.destroy', $team->id) }}" method="POST"
                                    style="display:inline-block">
                                    @csrf
                                    @method('DELETE')
                                    <button onclick="return confirm('Delete this team member?')"
                                        class="btn btn-sm btn-danger">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
