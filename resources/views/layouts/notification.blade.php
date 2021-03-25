@if (Session::has('notification'))
    <div class="alert alert-success text-center">
        <p>{{ Session::get('notification') }}</p>
    </div>
@endif