@extends('components.admin_base')

@section('title',"Категории")

@section('content')

    <div class="container mt-5 pt-5">
        <form action=" {{route('category.store')}}" class="form-group w-50 d-flex" method="post">
            @csrf
            <input type="text" class="form-control" name="title" placeholder="Добавьте новую категорию">
            <button type="submit" class="btn btn-success">Добавить</button>
        </form>
        <table class="table mt-5 w-100 table-bordered">
            <thead>
            <td>id</td>
            <td>Имя</td>
            <td>Объявлений</td>
            <td>Действия</td>
            </thead>
            @foreach( $categories as $category)
                <tr>
                    <td class="">{{ $category['id'] }}</td>
                    <td>
                        @if (isset($editedCategory) && $editedCategory == $category['id'])
                            @include('components.editFormOneField', [
                                'route' => $route,
                                'name' => 'title',
                                'value' => $category['title'],
                                'method' => 'PUT'
                                ])
                        @else
                            <a href="{{ route('category.edit', $category['id'])}}" title="нажмите дял редактирования"> {{ $category['title'] }}</a>
                        @endif
                    </td>
                    <td>{{ $category->getAdsCount() }}</td>
                    <td class="d-flex flex-row">
                        <form action="{{ route('category.destroy', $category['id']) }}" method="post">
                            @method('DELETE')
                            @csrf
                            <Button class="btn btn-danger">Удалить</Button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </table>
    </div>
    </div>

@endsection
