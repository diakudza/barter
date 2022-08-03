@extends('component.base')

@section('title',"Поиск")

@section('content')

    <form class="container d-flex flex-column w-25">

        <input type="text" placeholder="Наименование" name="name">

        <select name="city">
            <option>11</option>
            <option>2</option>
            <option>33</option>
            <option>44</option>
        </select>

        <select name="category">
            <option>11</option>
            <option>2</option>
            <option>33</option>
            <option>44</option>
        </select>

        <button type="submit">Поиск</button>

    </form>

    <div>

    </div>
@endsection
