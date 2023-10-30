@extends('Admin.layout')
@section('content')

<div class="container">
    <div class="row">
        <div class="col-12 mt-3">
            <table class="table"  style="direction:rtl;text-align: center">
                <thead class="bg-warning">
                  <tr>
                    <th scope="col">الرقم التسلسلي</th>
                    <th scope="col">الاسم</th>
                    <th scope="col">السماحيات </th>
                  </tr>
                </thead>
                <tbody>
                    @php
                    $f=0;
                @endphp
              <tr>
                  @foreach ($role as $role)
                <th scope="row">{{$f=$f+1;}}</th>
                <td>{{$role->name}}</td>
                <td>
                        @foreach ($role->permissions as $per)
                                {{$per->name}}<br>
                        @endforeach
                </td>
              </tr>
              @endforeach
                </tbody>
              </table>
        </div>
    </div>
</div>


@endsection
