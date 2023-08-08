<ul class=" navbar-nav flex-grow-1">
    <li class="nav-item">
        <a class="nav-link text-dark" href="{{route('guardian.index')}}">Home</a>
    </li>
    <li class="nav-item">
        <a class="nav-link text-dark" href="{{route('guardian.assignment.index')}}">Bài tập</a>
    </li>
    <li class="nav-item">
        <a class="nav-link text-dark" href="{{route('guardian.child.index')}}">Con</a>
    </li>
</ul>
<a class="align-self-center" href="#">{{auth('guardian')->user()->name}}</a>
<a class="align-self-center" href="{{route('logout')}}">Đăng xuất</a>
