@extends('dashboard.layouts.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <h1 class="h2">User</h1>
</div>

@if (session()->has('success'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>{{ session('success') }}</strong>
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif

@if (session()->has('message'))
<div class="alert alert-danger alert-dismissible fade show" role="alert">
  <strong>{{ session('message') }}</strong>
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif

<div class="table-responsive col-lg-6">
  <a href="{{route('user.create')}}" class="btn btn-primary mb-3"> Create New User</a>
  <table class="table table-striped table-sm">
    <thead>

      <tr>
        <th scope="col">No</th>
        <th scope="col">Name</th>
        <th scope="col">Email</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($users as $user)
      <tr>
        <td>{{ $loop->iteration }}</td>
        <td>{{ $user->name }}</td>
        <td>{{ $user->email }}</td>
        <td>

          {{-- <a href="/dashboard/categories/{{ $user->slug }}" class="badge bg-info"><span
              data-feather="eye"></span></a> --}}
          {{-- aturan default route resource untuk edit --}}
          <a href="{{ route('user.edit', $user->uuid) }}" class="badge bg-warning"><span data-feather="edit"></span></a>
          <form action="{{ route('user.destroy', $user->uuid) }}" method="post" class="d-inline">
            @method('delete')
            @csrf
            <button class="badge bg-danger border-0" onclick="return confirm('Are You Sure?')">
              <span data-feather="x-circle"></span>
            </button>
          </form>
        </td>
      </tr>
      @endforeach


    </tbody>
  </table>
</div>

@endsection