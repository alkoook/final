
@extends('Center.layout')
@section('cen')
<div style="position: relative;width:23%;right:600px;text-align:center;">
<form method="POST" action="{{route('update.trainer',$tra->id)}}" style="position:absolute;width:90%;">
    @csrf

    <div>
        <img src="{{asset('img/Author.png')}}" style="margin-top:10px;width: 120px;height:110px;display: block;margin-left: auto;margin-right: auto;">
    </div>
    <div class="form-group">
      <input type="text" class="form-control mt-3 @error('first_name')is-invalid  @enderror" name="first_name" placeholder="الاسم الاول" value="{{$tra->first_name}}">
      @error('first_name')
      <span class="invalid-feedback" role="alert">
          <strong>{{ $message }}</strong>
      </span>
  @enderror
    </div>

    <div class="form-group">
        <input type="text" class="form-control mt-3 @error('last_name')is-invalid  @enderror" name="last_name" placeholder="الاسم الثاني" value="{{$tra->last_name}}">
        @error('last_name')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
      </div>
      <div class="form-group">
        <input type="text" class="form-control mt-3 @error('address')is-invalid  @enderror" name="address" placeholder="العنوان" value="{{$tra->address}}">
        @error('address')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
      </div>

      <div class="form-group">
        <input type="date" class="form-control mt-3" name="date_of_birth" placeholder="المواليد" value="{{$tra->date_of_birth}}">
      </div>
      <div class="form-group">
        <input type="text" class="form-control mt-3 @error('phone')is-invalid  @enderror" name="phone" placeholder="الهاتف" value="{{$tra->phone}}">
        @error('phone')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
      </div>
      <div class="form-group" style="font-size: 20px;">
        <label >ذكر</label>
        <input type="radio" name ="gender"  value="M" checked >
        <br>
        <label >أنثى</label>
        <input type="radio" name ="gender"  value="F">
      </div>

        <button type="submit"style="width:90%;font-size:20px;"  class="btn btn-primary">اضافة</button>

  </form>
</div>

@endsection
