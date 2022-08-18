<div class="alert container mt-5 pt-5">
    @if (session('success'))
    <div class="mt-5 alert alert-success">
        {{ session('success') }}
    </div>
    @endif

    @if (session('fail'))
    <div class="mt-5 alert alert-danger">
        {{ session('fail') }}
    </div>
    @endif

    @if ($errors->any())

    <div class="alert alert-danger mt-5">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>

    @endif
</div>