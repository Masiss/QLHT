@extends('layout.master')
@section('content')
    <div class="grid">
        <div class="mx-5 w-[35%] my-5 align-center justify-self-center p-5 border-1 rounded-md shadow">
            <form action="{{route('registering')}}" method="POST">
                <h2 class="h2">Đăng ký</h2>
                @csrf
                @method('post')
                <div>
                    <label for="name">Tên</label>
                    <input name="name" class="form-control"/>
                </div>
                <div>
                    <label for="email">Email</label>
                    <input name="email" class="form-control"/>
                </div>
                <div>
                    <label for="password">Mật khẩu</label>
                    <input name="password" class="form-control"/>
                </div>
                <div>
                    <label for="role">Vai trò</label>
                    <select name="role" class="form-select">
                        <option value="0">Cha/mẹ</option>
                        <option value="1">Con</option>
                    </select>
                </div>
                <button class="btn btn-primary mt-3 active" type="submit">Đăng ký</button>
            </form>
        </div>
    </div>
@endsection
