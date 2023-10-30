@extends('Center.layout')

@section('cen')


<div class="cont">
    <table class="table mt-3" id="t" style="width: 65%;margin-right: 50px">
    <thead class="thead-dark " >
      <tr>
        <th scope="col">الرقم التسلسلي</th>
        <th scope="col">الاسم </th>
        <th scope="col">التفاصيل </th>
        <th></th>

      </tr>
    </thead>
    <tbody>
        @php
            $f=0;
        @endphp
        @foreach ($d as $d)
      <tr>
        <td>{{$f=$f+1}}</td>
        <td>{{$d->name}}</td>
        <td>{{$d->details}}</td>

        <td>
            <div class="row">

            <div class="col">
                <a class="btn btn-success" href="{{route('offer.course',$d->id)}}" style="width: 80px">اعلان</a>
            </div>
            <div class="col">
                <a class="btn btn-danger" href="{{route('delete.course',$d->id)}}" style="width: 80px">حذف </a>
            </div>
            @endforeach
        </td>

      </tr>

    </tbody>
  </table>


    <form method="POST" action="{{route('create.order') }}" style="position:absolute;width:23%;right:1%;">
        @csrf

        <div class="form-group">
          <input type="text" class="form-control mt-3" name="name" placeholder="الاسم ">
        </div>

        <div class="form-group">
            <textarea class="form-control mt-3" name="details" rows="3" placeholder="التفاصيل"></textarea>
          </div>



            <button type="submit"  class="btn btn-primary">اضافة دورة مقدمة</button>


      </form>

      <form action="{{route('show.offer.cour')}}" style="position:absolute;width:23%;right:-10.5%;margin-top:172px">
        <button type="submit" class="btn btn-dark">
            اعلان عن دورة جديدة
        </button>
        <form action="{{route('ddddddd')}}" method="post">
            <button type="button">
                hhhhhhhh
            </button>
          </form>
      </form>



</div>


@endsection
