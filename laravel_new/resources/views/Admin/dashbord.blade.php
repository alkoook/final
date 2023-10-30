@extends('Admin.layout')
@section('content')
<div class="container">
    @if ($message=Session::get('faild'))
    <div class="alert alert-danger text-center" role="alert">
        {{$message}}
    </div>
    @endif
    <div class="color_dash">
        <div class="row">

            <div class="col bg-primary   text-center m-1 p-4"  href="">
                 <p class="mb-2" >الادمن</p>
                {{$con_admin}}<br>
               <a href="{{route('admin.ditails')}}" class="details" style="text-decoration:none;color: inherit">تفاصيل</a>
            </div>
            <div class="col bg-warning   text-center m-1 p-4" >
                 <p class="mb-3">الادوار</p>
                {{$con_role}}<br>
               <a href="{{route('role.ditails')}}" class="details" style="text-decoration:none;color: inherit">تفاصيل</a>
            </div>
            <div class="col bg-success  text-center m-1 p-4">
                <p class="mb-2">المراكز المشتركة</p>
                {{$con_center}}<br>
               <a href="{{route('center.ditails')}}" class="details" style="text-decoration:none;color: inherit">تفاصيل</a>
            </div>
            <div class="col bg-danger text-center m-1 p-4">
                <p class="mb-2"> المراكز منتهية الاشتراك</p>
               {{$con_center_of}}<br>
               <a href="{{route('center.off.ditails')}}" class="details" style="text-decoration:none;color: inherit;">تفاصيل</a>
           </div>
    </div>
        <div class="card mt-3" style="max-width: 640px;">
            <div class="row no-gutters">
              <div class="col-md-4">
                <img src="{{asset('img/Author.png')}}" class="card-img" alt="..." style="border: 2px solid rgba(0, 0, 0, 0.062);padding: 5px;margin: 5px">
              </div>
              <div class="col-md-8">
                <div class="card-body text-dark text-md-right">
                  <h5 class="card-title ">{{$data->name}}</h5>
                  <p class="card-text">{{$data->email}}</p>
                  <p class="card-text"><small class="text-muted">الدور : <h3>{{$data->role->name}}</h3></small></p>
                  <a class="btn btn-primary mr-5" href="{{route('admin.profile')}}">عرض الملف الشخصي</a>
                </div>
                </div>
            </div>
          </div>


@endsection
