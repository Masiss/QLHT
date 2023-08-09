@extends('layout.master')
@section('content')
    <div class="row">
        <div class="col-md-4">
            <section>
                <form action="{{route('signing')}}" method="post">
                    @csrf
                    @method('post')
                    <h2 class="h2">Đăng nhập</h2>
                    <hr/>
                    <div class="form-floating mb-3">
                        <input type="email" class="form-control" name="email"/>
                        <label for="email" class="form-label">Email</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="password" name="password" class="form-control"/>
                        <label for="password" class="form-label">Mật khẩu</label>
                    </div>
                    <div class="form-floating mb-3">
                        <select name="role" class="form-select">
                            <option value="0">Cha/mẹ</option>
                            <option value="1">Con</option>
                        </select>
                        <label for="role" class="form-label">Là</label>
                    </div>

                    <div class="checkbox mb-3">
                        <label for="saveLogin" class="form-label">
                            <input class="form-check-input" name="saveLogin"/>
                            Nhớ mật khẩu
                        </label>
                    </div>
                    <div>
                        <button id="login-submit" type="submit" class="w-100 btn btn-lg btn-primary active">Đăng nhập
                        </button>
                    </div>
                    <div>
                        <p>
                            <a href="{{route('signup')}}">Không có tài khoản ? Hãy
                                đăng kí</a>
                        </p>
                    </div>
                </form>
            </section>
        </div>
    </div>

@endsection
