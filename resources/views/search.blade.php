@extends('component.base')

@section('title',"Поиск")

@section('content')

<div class="mt-5 mb-5 h-25">
</div>

@include('component.searchForm')

@if (isset($searchResult))

<div class="container mt-5">
    <table class="mt-5 table-bordered">
        @foreach( $searchResult as $item)
        <tr>
            <td>{{ $item['id'] }}</td>
            <td><a href="{{ route('ad.show', $item['id'])}}"> {{ $item['title'] }}</a></td>
            <td>{{ $item['text'] }}</td>
            <td>{{ $item->category->title }}</td>
        </tr>
        @endforeach
    </table>
</div>
@endif
@endsection