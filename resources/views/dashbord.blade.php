<h1>This is a home page<h1>

<form method="POST" action="{{ url('logout') }}" class="float-end mx-3">
    @csrf
    <button type="submit" class="btn btn-primary " >Logout</button>
</form>