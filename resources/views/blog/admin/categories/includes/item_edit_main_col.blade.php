@php
    /** @var \App\Models\BlogCategory $item*/
    /** @var \Illuminate\Support\Collection $categoryList */

@endphp
<div class="row  justify-content-center">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <div class="card-title">
                    <ul class="nav nav-tabs" role="tablist">
                        <li class="nav-item">
                            <a href="#maindata" class="nav-link active" data-toggle="tab" role="tab">Основные данные</a>
                        </li>
                    </ul>
                    <br>
                    <div class="tab-content">
                        <div class="tab-pane active" id="maindata" role="tabpanel">
                            <div class="form-group">
                                <label for="title">Заголовок</label>
                                <input name="title"
                                       value="{{ $item->title }}"
                                       id="title"
                                       type="text"
                                       class="form-control"
                                       minlength="3"
                                       required>
                            </div>
                            <div class="form-group">
                                <label for="slug">Идетификатор</label>
                                <input name="slug"
                                       value="{{ $item->slug }}"
                                       id="slug"
                                       type="text"
                                       class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="parent_id">Родитель</label>
                                <select name="parent_id"
                                        id="parent_id"
                                        class="form-control form-control-lg"
                                        placeholder="Выберите категорию"
                                        required>
                                    @foreach($categoryList as $categoryOption)
                                        <option value="{{ $categoryOption->id }}"
                                                @if($categoryOption->id == $item->parent_id) selected @endif>
                                          {{--  {{ $categoryOption->id }} . {{ $categoryOption->title }}--}}
                                            {{ $categoryOption->id_title }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="discription">Идетификатор</label>
                                <textarea name="discription"
                                          id="discription"
                                          class="form-control"
                                          rows="3">
                                    {{ old('discription ', $item->discription) }}
                                    @php
                                        //old какой ключи ищем в старом input, если не пришел
                                    //то берем из базы $item->description
                                    @endphp
                                </textarea>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>