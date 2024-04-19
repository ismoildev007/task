<x-layouts.auth>
    <div class="container">
        <div class="w-50 py-4">
            <div class="contact-form">
                <div id="success"></div>
                {{--                    @if ($errors->any())--}}
                {{--                        <div class="alert alert-danger">--}}
                {{--                            <ul>--}}
                {{--                                @foreach ($errors->all() as $error)--}}
                {{--                                    <li>{{ $error }}</li>--}}
                {{--                                @endforeach--}}
                {{--                            </ul>--}}
                {{--                        </div>--}}
                {{--                    @endif--}}

                <form action="{{ route('product.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="control-group">
                        <input type="text" id="if" class="form-control p-4" name="name" placeholder="ism" value="{{ old('name') }}" />
                        @error('name')
                        <label for="if" class="text-danger">Sarlavhani to'ldiring</label>
                        @enderror
                        <p class="help-block text-danger"></p>
                    </div>
                    <div class="control-group">
                        <input type="text" id="if" class="form-control p-4" name="description" placeholder="Description" value="{{ old('description') }}" />
                        @error('description')
                        <label for="if" class="text-danger">Sarlavhani to'ldiring</label>
                        @enderror
                        <p class="help-block text-danger"></p>
                    </div>
                    <div class="control-group">
                        <input type="number" id="if" class="form-control p-4" name="price" placeholder="Narxi" value="{{ old('price') }}" />
                        @error('price')
                        <label for="if" class="text-danger">Narxini to'ldiring</label>
                        @enderror
                        <p class="help-block text-danger"></p>
                    </div>
                    <div class="control-group">
                        <select name="category_id" class="form-control mt-3 mb-3">
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="control-group">
                        {{--                        @error('category_id')--}}
                        {{--                        <label for="if" class="text-danger">Kategoriyani to'ldiring</label>--}}
                        {{--                        @enderror--}}
{{--                        <select name="tags[]" class="form-control mt-3 mb-3" multiple>--}}
{{--                            <option value="">tag tanlang</option>--}}
{{--                            @foreach($tags as $tag)--}}
{{--                                <option value="{{ $tag->id }}">{{ $tag->name }}</option>--}}
{{--                            @endforeach--}}
{{--                        </select>--}}
                    </div>
                    <div class="control-group form-control mb-3 pb-5">
                        <input name="image_url" type="file" class="input-group m-2" id="subject"/>
                    </div>
                    @error('image_url')
                    <label for="if" class="text-danger">faylni yuklashni unutdingiz3</label>
                    @enderror
                    <div>
                        <button class="btn btn-primary btn-block py-3 px-5" type="submit" id="sendMessageButton">Saqlash</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-layouts.auth>
