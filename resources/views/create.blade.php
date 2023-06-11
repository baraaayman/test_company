@extends('app')
@section('content')

<form action="{{route('user.store')}}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="row">
        <div class="col-md-6">
            <div class="mb-3">
                <label>name</label>
                <input type="text" name="name" placeholder="Name" class="form-control" />
                {{-- @error('name_en')
                    <small class="invalid-feedback">{{ $message }}</small>
                @enderror --}}
            </div>
        </div>

        <div class="col-md-6">
            <div class="mb-3">
                <label>email</label>
                <input type="email" name="email" placeholder="email" class="form-control" />
                {{-- @error('email')
                    <small class="invalid-feedback">{{ $message }}</small>
                @enderror --}}
            </div>
        </div>

        <div class="col-md-6">
            <div class="mb-3">
                <label>password</label>
                <input type="password" name="password" placeholder="password" class="form-control" />
                {{-- @error('pass')
                    <small class="invalid-feedback">{{ $message }}</small>
                @enderror --}}
            </div>
        </div>


    </div>

    <button class="btn btn-success px-5">Add New</button>

    </form>

@endsection
