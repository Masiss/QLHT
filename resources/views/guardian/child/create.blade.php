@extends('layout.master')
@section('content')
    <div>
        <div class="grid grid-cols-4 my-5">
            <div class="col-start-2 col-span-2">
                <form action="{{route('child.point.store')}}" method="POST">
                    @csrf
                    @method('post')
                    <h2 class="h2">Thêm con</h2>
                    <div class="form-floating mb-3">
                        <input class="form-control" name="id"/>
                        <label for="id" class="form-label">ID</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input class="form-control" name="name"/>
                        <label for="name" class="form-label">Tên</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input class="form-control" name="email"/>
                        <label for="email" class="form-label">Email</label>
                    </div>

                    <div class="form-floating mb-3">
                        <button class="btn btn-primary active" type="submit">Thêm</button>
                    </div>

                </form>
            </div>
        </div>
    </div>
@endsection
