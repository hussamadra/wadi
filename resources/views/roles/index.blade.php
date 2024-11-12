@extends('layouts-new.index')

@section('content')

    <div class="card">
        @include('components.create_btn',['route'=>$route,'name'=>'اضافة جديد'])
        <div class="card-datatable table-responsive pt-0">
            <table id="data_tb" class="user-list-table table ">
                <thead class="thead-light ">
                <tr>
                    <th>الأسم</th>
                    <th>تاريخ الاضافة</th>
                    <th>الاجراءات</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($roles as $role)
                    <tr>
                        <td>{{ $role->name }}</td>
                        <td>{{ $role->created_at }}</td>
                        <td style="flex: 1; display: flex; justify-content: space-between;">
                            <a href="{{route('roles.edit',$role->id)}}" class="btn btn-warning"
                            ><i data-feather='edit-2' class="text-white"></i>  تعديل  </a><br>
                            
                            <form action="{{route('roles.destroy',$role->id)}}" method="post">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger"
                                ><i class="text-white" data-feather='delete'></i>   حذف
                                </button>
                            </form>


                        </td>
                    </tr>

                @endforeach
                </tbody>
            </table>

        </div>
    </div>


@endsection
