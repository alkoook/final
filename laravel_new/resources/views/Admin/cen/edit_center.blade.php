@extends('Admin.layout')
@section('content')

<div class="container">
    <div class="row">
        <div class="col-2" >
        </div>
        <div class="col-8" style="margin-top: 80px">

    <form action="{{route('refresh.center',$center->id)}}" method="POST" enctype="multipart/form-data">
        @csrf
            <div class="form-group" >
          <input type="text" class="form-control  @error('name') is-invalid @enderror" name="name" value="{{$center->name}}" placeholder=" الاسم" >
          @error('name')
          <span class="invalid-feedback text-danger" role="alert">
              <strong>{{ $message }}</strong>
          </span>
          @enderror
        </div>
        <div class="form-group">
          <input type="email" class="form-control  @error('email') is-invalid @enderror" name="email" value="{{$center->email}}" placeholder="البريد الالكتروني">
          @error('email')
          <span class="invalid-feedback text-danger" role="alert">
              <strong>{{ $message }}</strong>
          </span>
          @enderror
        </div>
          <div class="form-group">
            <input type="text" class="form-control  @error('phone') is-invalid @enderror" name="phone" value="{{$center->phone}}" placeholder="رقم الهاتف ">
            @error('phone')
            <span class="invalid-feedback text-danger" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
          <div class="form-group">
            <input type="text" class="form-control  @error('address') is-invalid @enderror" name="address" value="{{$center->address}}" placeholder="العنوان  ">
            @error('address')
            <span class="invalid-feedback text-danger" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
            <div class="form-group">
                <select name="sup" class="form-control">
                    <option value="{{ date('Y-m-d',strtotime('1 month')) }}"{{'selected'}}> شهر</option>
                    <option value="{{ date('Y-m-d',strtotime('3 month')) }}">ثلاث شهور</option>
                    <option value="{{ date('Y-m-d',strtotime('6 month')) }}">ستة شهور</option>
                    <option value="{{ date('Y-m-d',strtotime('1 year')) }}">سنة </option>
                </select>
            </div>
        <button type="submit"  class="btn btn-primary">اضافة</button>
      </form>
    </div>
    </div>
</div>
@endsection
