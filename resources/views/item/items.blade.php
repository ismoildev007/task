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

                <form action="{{ route('items.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="control-group">
                        <input type="text" id="if" class="form-control p-4" name="quantity" placeholder="quantity" value="{{ old('quantity') }}" />
                        @error('quantity')
                        <label for="if" class="text-danger">quantity to'ldiring</label>
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
                        <select name="category_id" class="form-control mt-3 mb-3">
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div>
                        <button class="btn btn-primary btn-block py-3 px-5" type="submit" id="sendMessageButton">Saqlash</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-layouts.auth>
