@extends('Admin.layout')
@section('content')

<div class="container">
    <div class="row">
        <div class="col-12 mt-3">
            <table class="table"  style="direction:rtl;text-align: center">
                <thead class="bg-danger">
                  <tr>
                    <th scope="col">الرقم التسلسلي</th>
                    <th scope="col">الاسم</th>
                    <th scope="col">البريد الالكتروني</th>
                    <th scope="col">العنوان</th>
                    <th scope="col">رقم الهاتف</th>
                    <th scope="col">نهاية الاشتراك</th>
                    <th></th>
                  </tr>
                </thead>
                <tbody>
                    @php
                    $f=0;
                @endphp
              <tr>
                  @foreach ($center as $center)
                <th scope="row">{{$f=$f+1;}}</th>
                <td>{{$center->name}}</td>
                <td>{{$center->email}}</td>
                <td>{{$center->address}}</td>
                <td>{{$center->phone}}</td>
                <td>{{$center->edate}}</td>
                <td >
                    <div class="row">

                        <div class="col-lg">
                            <a class="btn btn-success" href="{{route('show,refresh.center',$center->id)}}" style="width: 80px">تجديد</a>
                        </div>
                        <div class="col-lg">
                            <a class="btn btn-danger" href="{{route('delete.center',$center->id)}}" style="width: 80px">حذف </a>
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
