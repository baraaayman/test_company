@extends('app')
@section('content')

<h1 class="h3 mb-4 text-gray-800">Edit Product</h1>
<form action="{{route('user.update', $user->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('put')
    <div class="row">
        <div class="col-md-6">
            <div class="mb-3">
                <label>name</label>
                <input type="text" name="name" placeholder="Name" class="form-control" value="{{ old('name', $user->name) }}" />

            </div>
        </div>

        <div class="col-md-6">
            <div class="mb-3">
                <label>email</label>
                <input type="email" name="email" placeholder="email" class="form-control" value="{{ old('email', $user->email) }}" />
            </div>
        </div>

        <div class="col-md-6">
            <div class="mb-3">
                <label>password</label>
                <input type="password" name="password" placeholder="password" class="form-control" value="{{ old('password', $user->password) }}" />
            </div>
        </div>


    </div>

    <button class="btn btn-success px-5">Update</button>
    </form>


@endsection
