@extends('Admin.layout')
@section('content')

<div class="container">
    <div class="row">
        <div class="col mb-5 " style="background-color: whitesmoke "></div>
    </div>
    <div class="w-50 m-auto ">
        <form action="{{route('profile.edit.password',$my->id)}}" method="POST">
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
            <hr style="background-color: white" class="mt-5">
            <div class="form-group" >
              <input type="password" class="form-control  @error('password') is-invalid @enderror" name="password"  placeholder="كلمة المرور الحالية">
              @error('password')
                <span class="invalid-feedback text-danger" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
              @enderror
            </div>
            <div class="form-group">
              <input type="password" class="form-control  @error('new_password') is-invalid @enderror"  name="new_password" placeholder="كلمة المرور الجديدة">
              @error('new_password')
              <span class="invalid-feedback text-danger" role="alert">
                  <strong>{{ $message }}</strong>
              </span>
            @enderror
            </div>

              <div class="form-group">
                <input type="password" class="form-control  @error('conf_password') is-invalid @enderror" name="conf_password"placeholder="تاكيد كلمة المرور">
                @error('conf_password')
                <span class="invalid-feedback text-danger" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
              @enderror
            </div>
              <div class="form-group">

                </div>
            <button type="submit" name="add" class="btn btn-primary">حفظ التغيرات</button>
          </form><br>
          <form action="{{route('admin.profile')}}">
            <button type="submit" name="add" class="btn btn-danger"> رجوع  </button>
        </form>

    </div>


</div>

@endsection
