@extends('Center.layout')
@section('cen')

<div class="container" style="text-align: center">
    <h2 style="background:#f3aa20;left:650px;
    width:200px;height:50px;margin-right:450px;border:1px black solid;border-radius:10px;">{{$name}}</h2>
    <h5>{{'عدد الطلاب '.$co}}</h5>
    <h5>{{'المدرب '.$trainer_name}}</h5>
    <h5>{{'تاريخ البداية '.$sdate}}</h5>
    <h5>{{'تاريخ النهاية '.$edate}}</h5>
    <hr>
    <table class="table">
        <thead>
          <tr>
            <th scope="col" style="font-size:20px;">الرقم التسلسي</th>
            <th scope="col" style="font-size:20px;">الطالب</th>
          </tr>
        </thead>
        <tbody>
            @php
                $f=0;
            @endphp
          <tr>
                @foreach ($std as $std)
                <th scope="row">{{$f=$f+1;}}</th>
                <td>{{$std->first_name}}</td>
              </tr>
                @endforeach
        </tbody>
      </table>
</div>

@endsection
