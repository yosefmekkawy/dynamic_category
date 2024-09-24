@extends('components.layout')

@section('content')
    <div class="container">
        <div class="row justify-content-center align-items-center h-100">
            <div class="col-lg-6">
                @if($errors->any())
                    @foreach($errors->all() as $error)
                        <p class="alert alert-danger">{{$error}}</p>
                    @endforeach
                @endif
                <form action="{{route('login')}}" method="post" class="p-4 bg-light my-form">

                    @csrf
                    <h1 class="text-center my-5">Login</h1>
                    <div class="form-floating my-5">
                        <input type="text" class="form-control" id="floatingNumber" placeholder="email" name="email">
                        <label for="floatingInput">Email</label>
                    </div>
                    <div class="form-floating my-5">
                        <input type="password" class="form-control" id="floatingPassword" placeholder="Password" name="password">
                        <label for="floatingPassword">Password</label>
                    </div>
                    <input type="submit" class="btn btn-success form-control">
                </form>
            </div>
        </div>
    </div>
@endsection

@section('styling')
  <style>
      body{

          background-color: #f8f9fd;
      }
      .container{
          min-height: 100vh;
      }
      .container .row{
          min-height: 100vh;
      }
      form{
          background-color: white;
          border-radius: 10px;
          box-shadow: 0px 10px 34px -15px rgba(0, 0, 0, 0.24);
          margin: 0 auto;
          max-width: 500px;
      }

  </style>
@endsection
