@extends('dashboard.layouts.main')

@section('container')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Product</h1>
</div>

@if (session()->has('success'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>{{ JSON_decode(session()->get('success'))->message }}</strong>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif
@if (session()->has('message'))
<div class="alert alert-danger alert-dismissible fade show" role="alert">
    <strong>{{ session()->get('message') }}</strong>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif
<form class="form-horizontal" id="submitform" role="form" method="POST" action="{{ route('result-product')}}">
    {{csrf_field()}}
    <div class="form-group">
        <label class="col-lg-3 control-label">Select product number</label>
        <select class="form-control" name="bank_id" autocomplete="off" required>
            <option value="">choice...</option>
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
        </select>
    </div>
    <div class="form-group">
        <label class="col-md-3 control-label"></label>
        <div class="col-md-8">
            <input class="btn btn-primary" type="submit" value="Get" />
        </div>
        <span></span>
    </div>
</form>
<div class="table-responsive col-lg-6">
    <table class="table table-striped table-sm">
        <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">Account Name</th>
                <th scope="col">Account Number</th>
            </tr>
        </thead>
        <tbody>
            @if (session()->has('success'))
            @foreach ( JSON_decode(session()->get('success'))->data as $user)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $user->account_name }}</td>
                <td>{{ $user->account_number }}</td>

            </tr>
            @endforeach
            @endif

        </tbody>
    </table>
</div>
{{-- <script>
    $('#submitform').submit(function(event) {
    event.preventDefault();
    $.ajax({
      type: "POST",
      url: "{{ route('result-product')}}",
      data: $(this).serialize(),
      success: function(response) {
        if (response.status == 1) {
          $('#response1').text(response.data[0].account_name);
          $('#response2').text(response.data[0].account_number);
          $('#response').show();
        } else {
          alert("data not found!")
          $('#response').hide();
        }
      }
    });
  });
</script> --}}
@endsection