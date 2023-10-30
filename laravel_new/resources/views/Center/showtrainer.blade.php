@extends('Center.layout')

@section('cen')


<div class="cont">
    <table class="table mt-3" id="t">
    <thead class="thead-dark "  style="border-radius:10px"  >
      <tr>
        <th scope="col">الرقم التسلسلي</th>
        <th scope="col">الاسم الاول</th>
        <th scope="col">الاسم التاني</th>
        <th scope="col">العنوان</th>
        <th scope="col">الهاتف</th>
        <th scope="col">النوع</th>
        <th scope="col">العمر</th>
        <th></th>

      </tr>
    </thead>
    <tbody>
        @php
            $f=0;
        @endphp
        @foreach ($data as $d)
      <tr>

        <td>{{$f=$f+1;}}</td>
        <td>{{$d->first_name}}</td>
        <td>{{$d->last_name}}</td>
        <td>{{$d->address}}</td>
        <td>{{$d->phone}}</td>
        <td>{{$d->gender}}</td>
        <td>{{\Carbon\Carbon::parse($d->date_of_birth)->diff(\Carbon\Carbon::now())->format('%y عام')}}</td>
        <td>
            <div class="row">

            <div class="col-lg">
                <a class="btn btn-success" href="{{route('edit.trainer',$d->id)}}" style="width: 80px">تعديل</a>
            </div>
            <div class="col-lg">
                <a class="btn btn-danger" href="{{route('delete.trainer',$d->id)}}" style="width: 80px">حذف </a>
            </div>
            @endforeach
        </td>

      </tr>

    </tbody>
  </table>

  @if ($message=Session::get('faild'))
  <div class="alert alert-danger text-center" role="alert">
     {{$message}}
  </div>
  @endif
    <form method="POST" action="{{route('create.trainer')}}" style="position:absolute;width:20%;right:1%;">
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
            <input type="radio"  name ="gender"  value="ذكر">
            <br>
            <label >أنثى</label>
            <input type="radio" name ="gender"  value="انثى">
          </div>

            <button type="submit"  class="btn btn-primary">اضافة</button>

      </form>


</div>


@endsection
