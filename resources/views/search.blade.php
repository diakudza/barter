@extends('components.base')

@section('title', 'Поиск')

@section('content')

<!-- 
<div class="mt-5 mb-5">
</div> -->

<section class="container">
    @include('components.searchForm')
</section>


<section class="container">
    @if (isset($searchResult))

    @foreach ($searchResult as $item)

    @include('components.littelCard')

    @endforeach

    @else

    <p>Ни чего не найдено!!</p>

    @endif
</section>
@endsection