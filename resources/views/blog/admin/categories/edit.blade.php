@extends('layouts.app')

@section('content')
    @php /** @var \App\Models\BlogCategory $item */ @endphp
    <form method="POST" action="{{ route('blog.admin.categories.update', $item->id) }}">
        @method('PATCH') {{--метод отправки  формы директива патч --}}
        @csrf
        <div class="container">
            @php
            /** @var \Illuminate\Support\ViewErrorBag $errors */
            @endphp
            @if($errors->any()) {{-- хоть что то  --}}
                <div class="row justify-content-center">
                    <div class="col-md-11">
                        <div class="alert alert-danger" role="alert">
                            <button type="button" class="close" data-miss="alert" aria-label="Close">
                                <span aria-hidden="true">x</span>
                            </button>
                            {{ $errors->first() }} {{--первая ошибка из списка --}}
                        </div>
                    </div>
                </div>
            @endif
            @if(session('success'))
                <div class="row justify-content-center">
                    <div class="col-md-11">
                        <div class="alert alert-success" role="alert">
                            <button type="button" class="close" data-miss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            {{   session()->get('success') }} {{-- получить значение ключа --}}
                        </div>
                    </div>
                </div>
            @endif

            <div class="row justify-content-center">
                <div class="col-md-8">
                    @include('blog.admin.categories.includes.item_edit_main_col')
                </div>
                <div class="col-md-3">
                    @include('blog.admin.categories.includes.item_edit_add_col')
                </div>
            </div>
        </div>
    </form>
@endsection