<nav class="navbar d-flex flex-column">
    <a href="{{ route('todo.index') }}" class="navbar-brand fw-bold fs-3 mb-3">Laravel Activity</a>
    <ul class="nav flex-column w-100">
        <li class="nav-item mb-2">
            <a href="{{ route('todo.index') }}" class="nav-link rounded-start-5 {{ Route::is('todo.index') ? 'bg-light text-black fw-bold' : 'text-white' }}">All List</a>
        </li>
        <li class="nav-item mb-2">
            <a href="{{ route('todo.current') }}" class="nav-link rounded-start-5 {{ Route::is('todo.current') ? 'bg-light text-black fw-bold' : 'text-white' }}">Current Task</a>
        </li>
        <li class="nav-item mb-2">
            <a href="{{ route('todo.completed') }}" class="nav-link rounded-start-5 {{ Route::is('todo.completed') ? 'bg-light text-black fw-bold' : 'text-white' }}">Completed Task</a>
        </li>
        <li class="nav-item mb-2">
            <a href="{{ route('todo.trash') }}" class="nav-link rounded-start-5 {{ Route::is('todo.trash') ? 'bg-light text-black fw-bold' : 'text-white' }}">Trash</a>
        </li>
    </ul>
</nav>
