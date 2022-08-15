@extends('components.base')

@section('title', 'Поиск')

@section('content')

    <div class="mt-5 mb-5">
    </div>

    @include('components.searchForm')

    @if (isset($searchResult))

        <div class="container mt-5 d-flex flex-row flex-wrap gap-2 justify-content-center">

            @foreach ($searchResult as $item)
                @include('components.adCart')
            @endforeach

        </div>
    @endif
@endsection
