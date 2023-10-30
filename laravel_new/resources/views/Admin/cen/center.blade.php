@extends('Admin.layout')
@section('content')

<div class="container">
    <div class="row">
        <div class="col-2" >
        </div>
        <div class="col-8" style="margin-top: 80px">


    <form action="{{route('create_center')}}" method="POST" enctype="multipart/form-data">
        @csrf
            <div class="form-group" >
          <input type="text" class="form-control  @error('name') is-invalid @enderror" name="name"  placeholder=" الاسم" value="{{old('name')}}">
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
            <input type="password" class="form-control  @error('password') is-invalid @enderror" name="password" placeholder="كلمة المرور" value="{{old('password')}}">
            @error('password')
            <span class="invalid-feedback text-danger" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
          </div>
          <div class="form-group">
            <input type="int" class="form-control  @error('phone') is-invalid @enderror" name="phone" placeholder="رقم الهاتف " value="{{old('phone')}}">
            @error('phone')
            <span class="invalid-feedback text-danger" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
          </div>
          <div class="form-group">
            <input type="text" class="form-control  @error('address') is-invalid @enderror" name="address" placeholder="العنوان  " value="{{old('address')}}">
            @error('address')
            <span class="invalid-feedback text-danger" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
          </div>
            <div class="form-group">
                <select name="sup" class="form-control  @error('sup') is-invalid @enderror">
                    <option>--مدة الاشتراك--</option>
                    <option value="{{ date('Y-m-d',strtotime('1 month')) }}" {{'selected'}}> شهر</option>
                    <option value="{{ date('Y-m-d',strtotime('3 month')) }}">ثلاث شهور</option>
                    <option value="{{ date('Y-m-d',strtotime('6 month')) }}">ستة شهور</option>
                    <option value="{{ date('Y-m-d',strtotime('1 year')) }}">سنة </option>
                </select>
                @error('sup')
                <span class="invalid-feedback text-danger" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        <button type="submit" name="add" class="btn btn-primary">اضافة</button>
      </form>
    </div>
    </div>
</div>
@endsection
