@extends('app')
@section('style')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    {{-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css"> --}}
    <link rel="stylesheet" href="//cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
@endsection
@section('content')
    <div>
        <table id="myTable" class="table table-striped">
            <thead>
                <tr>
                    <th>id</th>
                    <th>name</th>
                    <th>email</th>
                    <th>status</th>
                    <th>type</th>
                    <th>created_at</th>
                    <th>qr code</th>
                    <th>actions</th>
                    @if (Auth::user()->type =='admin')
                        <th>active/deactivate</th>
                    @endif

                </tr>
            </thead>


            <tbody>
                @foreach ($user as $users)
                    <tr>
                        <td>{{$users->id}}</td>
                        <td>{{$users->name}}</td>
                        <td>{{$users->email}}</td>
                        <td>
                            @if ($users->active)
                                <span class="badge badge-success">مفعل</span>
                            @else
                                <span class="badge badge-danger">غير مفعل</span>
                            @endif
                        </td>
                        <td>{{$users->type}}</td>
                        <td>{{$users->created_at}}</td>
                        <td><a href="{{$users->qr_code}}">{{$users->qr_code}}</a></td>
                        <td>
                            <a class="btn btn-primary btn-sm" href="{{route('user.show',$users->id)}}">show</a>
                            @if (Auth::user()->type=='admin')
                            <a class="btn btn-primary btn-sm" href="{{route('user.edit',$users->id)}}"><i class="fas fa-edit"></i></a>
                            <form class="d-inline" action="{{route('user.destroy', $users->id)}}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')"><i class="fas fa-trash"></i></button>
                            </form>
                        </td>
                        <td>
                            @if ($users->active)
                                <a href="{{ route('users.deactivate', $users) }}" class="btn btn-danger">إلغاء التفعيل</a>
                            @else
                                <a href="{{ route('users.activate', $users) }}" class="btn btn-success">تفعيل</a>
                            @endif
                        </td>
                        @endif
                    </tr>
                @endforeach
            </tbody>

        </table>
    </div>
@endsection
@section('script')

<script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
<script src="//cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
<script>
    let table = new DataTable('#myTable');
</script>

@endsection
