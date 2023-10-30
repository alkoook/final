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
                    <th scope="col">السعر </th>
                  </tr>
                </thead>
                <tbody>
              <tr>
                  @foreach ($sub as $sub)
                <th scope="row">{{$sub->id}}</th>
                <td>{{$sub->name}}</td>
                <td><span style="border: 1px solid rgba(0, 0, 0, 0.37);padding: 4px">{{$sub->price}}</span></td>
              </tr>
              @endforeach
                </tbody>
              </table><br><br>
              <h3  style="margin-left: 80%">تعديل الاسعار </h3><hr class="w-25">
              <form action="{{route('edit_subscription')}}" method="POST">
                @csrf
                <select name="id" class="form-control w-25 mb-3">
                    @foreach ($subb as $sub)
                        <option value="{{$sub->id}}">{{$sub->name}}</option>
                    @endforeach
                </select>
                <div class="form-group">
                    <input type="int" class="form-control w-25 mb-3" placeholder="السعرالجديد" name="price">
                  </div>
                    <button class="btn btn-primary"  style="margin-left: 75%">تعديل</button>
                </form>


        </div>

    </div>
</div>


@endsection
