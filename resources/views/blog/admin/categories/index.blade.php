@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <nav class="navbar navbar-toggleable-md navbar-light bg-faded">
                    <a href="{{ route('blog.admin.categories.create') }}" class="btn btn-primary"> Добавить</a>
                </nav>
                <div class="card">
                    <div class="card-body">
                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Категория</th>
                                <th>Родитель</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach( $paginator as $item)
                                @php /** @var \App\Models\BlogCategory $item  */   @endphp
                                <tr>
                                    <td>{{ $item->id }}</td>
                                    <td>
                                        <a href="{{ route('blog.admin.categories.edit', $item->id) }}">
                                            {{ $item->title }}
                                        </a>
                                    </td>
                                    <td @if(in_array($item->parent_id, [0, 1])) style="color: rgba(255,33,0,0.58)" @endif >
                                        {{-- {{ $item->parent_id }}--}}

                                        {{-- {{ $item->parentCategory()->title ?? 'unknown...' }}--}}

                                        {{--{{ optional($item->parentCategory)->title }}--}} {{--пытается получить обьект $item->parentCategory - если есть выводит тайтл
                             если нет возвращает Null
                             --}}

                                        {{-- {{
                                            $item->parentCategory->title
                                                ?? ($item->id === \App\Models\BlogCategory::ROOT
                                                    ? 'Корень'
                                                    : '???...')
                                          }}--}}

                                        {{ $item->parentTitle }} {{--getParentTitleAttribute--}}
                                        {{-- $item->parent_title снейк кейс поле в таблице
                                             parentTitle - camel case -accesor  --Models/BlogCategory.php
                                             поле преобразованное с помощью преобразователя accesor

                                              @property-read  string $parentTitle  Models/BlogCategory.php
                                        --}}
                                    </td>
                                </tr>

                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        @if($paginator->total() > $paginator->count())
            <br>
            <div class="row justify-content-center">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            {{ $paginator->links() }}
                        </div>
                    </div>
                </div>
            </div>
        @endif
    </div>
@endsection