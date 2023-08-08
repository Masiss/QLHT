<ul class=" navbar-nav flex-grow-1">
    <li class="nav-item">
        <a class="nav-link text-dark" href="{{route('child.index')}}">Home</a>
    </li>
    <li class="nav-item">
        <a class="nav-link text-dark" href="{{route('child.assignment.index')}}">Bài tập</a>
    </li>
    <li class="nav-item">
        <a class="nav-link text-dark" href="{{route('child.point.index')}}">Điểm</a>
    </li>
    <li class="nav-item">
        <a class="nav-link text-dark" href="{{route('child.schedule.index')}}">Thời khóa biểu</a>
    </li>
</ul>
<div class="flex align-center">
    <a class="align-self-center mx-3" href="#">{{auth('child')->user()->name}}</a>
    <a class="align-self-center mx-3" href="{{route('logout')}}">Đăng xuất</a>
</div>
