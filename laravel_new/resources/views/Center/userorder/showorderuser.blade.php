@extends('Center.layout')
@section('cen')

<div class="container">
    <table class="table">
        <thead>
          <tr>
            <th scope="col">رقم الطلب</th>
            <th scope="col">اسم الطالب</th>
            <th scope="col">اسم الدورة</th>
            <th scope="col">تفاصيل الدورة</th>
            <th></th>
          </tr>
        </thead>
        <tbody>
          <tr>
              @php
                  $f=0;
              @endphp
              @foreach ($order as $d)

            <th scope="row">{{$f=$f+1}}</th>
            <td>{{$d->first_name.' '.$d->last_name}}</td>
            <td>{{$d->name}}</td>
            <td>{{$d->details}}</td>
            <td>
                <div class="row">

                    <div class="col-lg">
                        <a class="btn btn-success" href="{{route('add.student.order',[$d->id_user,$d->id_course])}}" style="width: 80px">قبول</a>
                    </div>
                    <div class="col-lg">
                        <a class="btn btn-danger" href="{{route('delete.user.order',[$d->id_user,$d->id_course])}}" style="width: 80px">رفض </a>
                    </div>
            </td>
          </tr>
          @endforeach

        </tbody>
      </table>
</div>

@endsection
