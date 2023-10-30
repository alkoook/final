@extends('Admin.layout')
@section('content')
<div class="container">
    <div class="row">
       <div class="col-2">
       </div>
       <div class="col-8" style="margin-top: 40px">
        @if ($message=Session::get('faild'))
        <div class="alert alert-danger text-center" role="alert">
            {{$message}}
        </div>
        @endif
    <form action="{{route('store')}}" method="POST">
        @csrf
        <div>
            <img src="{{asset('img/Author.png')}}" style="width: 110px;display: block;margin-left: auto;margin-right: auto;">
        </div><hr>
        <div class="form-group" >
          <input type="text" class="form-control @error('name') is-invalid @enderror" name="name"  placeholder=" الاسم" value="{{old('name')}}">
          @error('name')
          <span class="invalid-feedback text-danger" role="alert">
              <strong>{{ $message }}</strong>
          </span>
          @enderror
        </div>
        <div class="form-group">
          <input type="email" class="form-control  @error('email') is-invalid @enderror" name="email" placeholder="البريد الالكتروني" value="{{old('email')}}">
          @error('email')
          <span class="invalid-feedback text-danger" role="alert">
              <strong>{{ $message }}</strong>
          </span>
          @enderror
        </div>
        <div class="form-group">
            <input type="password" class="form-control  @error('password') is-invalid @enderror" name="password" placeholder="كلمة المرور" >
            @error('password')
            <span class="invalid-feedback text-danger" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
          <div class="form-group">
            <input type="text" class="form-control  @error('phone') is-invalid @enderror" name="phone" placeholder="رقم الهاتف " value="{{old('phone')}}">
            @error('phone')
            <span class="invalid-feedback text-danger" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
          <div class="form-group">
                <select name="role_id" class="form-control">
                    @foreach ($role as $rol)
                    <option value="{{$rol->id}}" {{$rol->id==2 ? 'selected' : ''}}>{{$rol->name}}</option>
                    @endforeach
                </select>
            </div>
        <button type="submit" name="add" class="btn btn-primary">اضافة</button>
      </form>
       </div>
    </div>
</div>
@endsection
