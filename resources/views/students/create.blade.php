@extends('students.layout')
@section('content')

<div class="card">
  <div class="card-header">Students Page</div>
  <div class="card-body">
     @if(Session::has('success'))
        <div class="alert alert-success">
            {{ Session::get('success') }}
            @php
                Session::forget('success');
            @endphp
        </div>
        @endif

        <!-- Way 1: Display All Error Messages -->
        @if ($errors->any())
            <div class="alert alert-danger">
                <strong>Whoops!</strong> There were some problems with your input.<br><br>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>

        @endif

      <form action="{{ url('student') }}" method="post">
        {!! csrf_field() !!}
        <label>Name</label></br>
        <input type="text" name="name" id="name" class="form-control"></br>
         <!-- Way 2: Display Error Message -->
            @error('name')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        <label>Address</label></br>
        <input type="text" name="address" id="address" class="form-control"></br>

        <!-- Way 2: Display Error Message -->
        @error('address')
             <span class="text-danger">{{ $message }}</span>
        @enderror
        <label>Mobile</label></br>
        <input type="text" name="mobile" id="mobile" class="form-control"></br>

        <!-- Way 2: Display Error Message -->
        @error('mobile')
           <span class="text-danger">{{ $message }}</span>
         @enderror
        <input type="submit" value="Save" class="btn btn-success"></br>
    </form>

  </div>
</div>

@stop
