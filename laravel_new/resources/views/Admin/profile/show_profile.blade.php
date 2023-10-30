@extends('Admin.layout')
@section('content')
        <div class="row" >
            <div class="col-3"></div>
            <div class="col-6" style="margin-top: 50px">
                <div class="container">
                <form action="{{route('edit.admin.profile',$my->id)}}" method="POST">
                    @csrf
                    <div>
                        <img src="{{asset('img/Author.png')}}" style="width: 110px;display: block;margin-left: auto;margin-right: auto;">
                    </div>
                    @if ($message=Session::get('faild'))
                    <div class="alert alert-danger text-center" role="alert">
                        {{$message}}
                    </div>
                    @endif
                    @if ($message=Session::get('success'))
                    <div class="alert alert-success text-center" role="alert">
                       {{$message}}
                    </div>
                @endif
                    <hr style="background-color: white" class="mt-4">
                    <div class="form-group" >
                      <input type="text" class="form-control  @error('name') is-invalid @enderror" name="name"  value="{{$my->name}}"
                       @if($per==false)
                       readonly
                       @endif
                       >
                       @error('name')
                       <span class="invalid-feedback text-danger" role="alert">
                           <strong>{{ $message }}</strong>
                       </span>
                   @enderror
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control"  value="{{$role_id}}" readonly>
                      </div>
                    <div class="form-group">
                      <input type="email" class="form-control @error('email') is-invalid @enderror"  name="email" value="{{$my->email}}">
                      @error('email')
                      <span class="invalid-feedback text-danger" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
                    </div>
                      <div class="form-group">
                        <input type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{$my->phone}}">
                        @error('phone')
                        <span class="invalid-feedback text-danger" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                      </div>
                      <div class="form-group">

                        </div>
                    <button type="submit" name="add" class="btn btn-primary">تعديل</button>
                  </form><br>
                    <form action="{{route('profile.reset.password')}}">
                  <button type="submit" name="add" class="btn btn-danger"> تعديل كلمة المرور</button>
                    </form>
            </div>
        </div>
    </div>
@endsection
