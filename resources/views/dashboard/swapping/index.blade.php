@extends('dashboard.layouts.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Swape</h1>
</div>

@if (session()->has('success'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>{{ session('success') }}</strong>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif

<div class="input-group">
    <form method="post" action="{{ route('swap-exec') }}">
        @csrf
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">A</label>
            <input type="number" name="a" class="form-control" id="exampleFormControlInput1"
                placeholder="Masukkan Bilanagn A">
        </div>

        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">B</label>
            <input type="number" name="b" class="form-control" id="exampleFormControlInput1"
                placeholder="Masukkan Bilanagn B">
        </div>

        <div class="result" id="result"></div>

        <button class="w-100 btn btn-lg btn-primary" type="submit">Generate</button>
    </form>
</div>

@endsection