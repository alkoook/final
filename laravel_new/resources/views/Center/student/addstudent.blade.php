@extends('Center.layout')
@section('cen')
<div style="position: relative;width:25%;right:35%;display:flex;justify-content:center;border:1px black solid">
  <form method="POST" action="{{route('create.student')}}" style="position:absolute;width:90%;">
    @csrf
    <div>
        <img src="{{asset('img/Author.png')}}" style="margin-top:10px;width: 120px;height:110px;display: block;margin-left: auto;margin-right: auto;">
    </div>
    <div class="form-group">
      <input type="text" class="form-control mt-3 @error('first_name')is-invalid  @enderror" name="first_name" placeholder="الاسم الاول">
      @error('first_name')
      <span class="invalid-feedback" role="alert">
          <strong>{{ $message }}</strong>
      </span>
  @enderror
    </div>

    <div class="form-group">
        <input type="text" class="form-control mt-3 @error('last_name')is-invalid  @enderror" name="last_name" placeholder="الاسم الثاني">
        @error('last_name')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
      </div>

      <div class="form-group">
        <input type="email" class="form-control mt-3 @error('email')is-invalid  @enderror" name="email" placeholder="البريد الالكتروني">
        @error('email')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
      </div>

      <div class="form-group">
        <input type="password" class="form-control mt-3 @error('password')is-invalid  @enderror" name="password" placeholder="كلمة المرور">
        @error('password')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
      </div>

      <div class="form-group">
        <input type="text" class="form-control mt-3 @error('address')is-invalid  @enderror" name="address" value="{{old('address')}}" placeholder="العنوان">
        @error('address')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
      </div>

      <div class="form-group">
        <input type="date" class="form-control mt-3 " name="date_of_birth" placeholder="المواليد">
    </div>
      <div class="form-group">
        <input type="text" class="form-control mt-3 @error('phone')is-invalid  @enderror" name="phone" placeholder="الهاتف">
        @error('phone')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
      </div>
      <div class="form-group" style="font-size: 20px;">
        <label >ذكر</label>
        <input type="radio" name ="gender"  value="ذكر">
        <br>
        <label >أنثى</label>
        <input type="radio" name ="gender"  value="انثى">
      </div>
      <select name="course_name" class="form-control">
          <option value="">-- الدورة --</option>
          @foreach ($cor as $c )
            {
              @if ($c->count>$std->count()&&$std->cours_id=$c->id)
              <option value={{$c->id}}>{{ $c->name }}</option>
              @endif
            }
          @endforeach
      </select>
        <button type="submit"  class="btn btn-primary">اضافة</button>
  </form>
</div>
@endsection