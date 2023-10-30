@extends('Admin.layout')
@section('content')

<div class="container">
    @if ($message=Session::get('success'))
    <div class="alert alert-success text-center" role="alert">
        {{$message}}
    </div>
    @endif
    <div class="row">
        <div class="col-12 mt-3">
            <table class="table"  style="direction:rtl;text-align: center">
                <thead class="bg-primary">
                  <tr>
                    <th scope="col">الرقم التسلسلي</th>
                    <th scope="col">الاسم</th>
                    <th scope="col">البريد الالكتروني</th>
                    <th scope="col">رقم الهاتف</th>
                    <th scope="col">الدور</th>
                    <th scope="col">السماحيات</th>
                    <th></th>
                  </tr>
                </thead>
                <tbody>
                    @php
                    $f=0;
                @endphp
              <tr>
                  @foreach ($data as $admin)
                <th scope="row">{{$f=$f+1;}}</th>
                <td>{{$admin->name}}</td>
                <td>{{$admin->email}}</td>
                <td>{{$admin->phone}}</td>
                <td>{{$admin->role->name}}</td>
                <td>
                    <ul>
                        @foreach ($admin->role->permissions as $per)
                            <li>
                                {{$per->name}}
                            </li>
                        @endforeach
                    </ul>
                </td>
                <td >
                    <div class="row">

                        <div class="col-lg">
                            <a class="btn btn-success" href="{{route('edit.record',$admin->id)}}" style="width: 80px">تعديل</a>
                        </div>
                        <div class="col-lg">
                            <a class="btn btn-danger" href="{{route('delete,admin',$admin->id)}}" style="width: 80px">حذف </a>
                        </div>
                </td>
              </tr>
              @endforeach
                </tbody>
              </table>
        </div>
    </div>
</div>
@endsection
