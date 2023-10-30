@extends('Admin.layout')
@section('content')
<div class="container">
    <div class="row" >
        <div class="col-2"></div>
        <div class="col-8" style="margin-top: 60px">
    <form method="POST" action="{{ route('save.edit.record',$admin->id) }}">
        @method('POST')
        @csrf
        <div>
            <img src="{{asset('img/Author.png')}}" style="width: 150px;display: block;margin-left: auto;margin-right: auto;">
        </div>
        <hr style="background-color: white" class="mt-5">
        <div class="form-group" >
          <input type="text" class="form-control @error('name') is-invalid @enderror" name="name"  value="{{$admin->name}}"
            @if ($per==false)
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
          <input type="email" class="form-control @error('email') is-invalid @enderror"  name="email" value="{{$admin->email}}">
          @error('email')
          <span class="invalid-feedback text-danger" role="alert">
              <strong>{{ $message }}</strong>
          </span>
          @enderror
        </div>

          <div class="form-group">
            <input type="int" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{$admin->phone}}">
            @error('phone')
            <span class="invalid-feedback text-danger" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
          <div class="form-group">
            <select name="role_id" id="" class="form-control">
                @foreach ($role as $role)
                    <option value="{{$role->id}}"{{$role->id==$admin->role_id ? 'selected' : ''}}>
                        {{$role->name}}</option>
                @endforeach
            </select>
        <button type="submit" name="add" class="btn btn-primary mt-2 mb-2">حفظ التغييرات</button><br>
            <form action="{{route('admin.ditails')}}">
        <button type="submit"  class="btn btn-danger">رجوع للخلف</button>
    </form>
      </form>
</div>
    </div>
</div>


@endsection
{{--  --}}
