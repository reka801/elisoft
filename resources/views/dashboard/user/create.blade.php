@extends('dashboard.layouts.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Edit</h1>
</div>

<div class="input-group">
    <form method="post" action="{{ route('user.store') }}">
        @csrf
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Name</label>
            <input type="text" name="name" class="form-control" id="exampleFormControlInput1" placeholder="Name">
        </div>

        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Email</label>
            <input type="email" name="email" class="form-control" id="exampleFormControlInput1"
                placeholder="name@example.com">
        </div>

        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Password</label>
            <input type="password" name="password" class="form-control" id="exampleFormControlInput1"
                placeholder="Password">
        </div>

        <button class="w-100 btn btn-lg btn-primary" type="submit">Update</button>
    </form>
</div>



@endsection