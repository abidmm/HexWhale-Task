<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">ABC-</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse justify-content-between" id="navbarNav">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link {{ Route::currentRouteName() == 'home' ? 'text-primary' : '' }}" aria-current="page" href="{{route('home')}}">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{ Route::currentRouteName() == 'task-list' ? 'text-primary' : '' }}" href="{{route('task-list')}}">Tasks</a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{ Route::currentRouteName() == 'task-create' ? 'text-primary' : '' }}" href="{{route('task-create')}}">Add Task</a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{ Route::currentRouteName() == 'category-list' ? 'text-primary' : '' }}" href="{{route('category-list')}}">Category</a>
          </li>
        </ul>

        <form action="{{route('logout.post')}}" method="post">
          <button type="submit" class="btn btn-danger">Logout</button>
          @csrf
        </form>
      </div>
    </div>
  </nav>