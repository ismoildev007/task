<x-layouts.auth>
    <div class="container">
        <div class="w-50 py-4">
            <div class="contact-form">
                <div id="success"></div>
                <form action="{{ route('order.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="control-group">
                        <input type="text" id="if" class="form-control p-4" name="status" placeholder="status" value="{{ old('status') }}" />
                        @error('status')
                        <label for="if" class="text-danger">status to'ldiring</label>
                        @enderror
                        <p class="help-block text-danger"></p>
                    </div>
                    <div class="control-group">
                        <input type="date" id="if" class="form-control p-4" name="order_date" placeholder="order_date" value="{{ old('order_date') }}" />
                        @error('order_date')
                        <label for="if" class="text-danger">order_date to'ldiring</label>
                        @enderror
                        <p class="help-block text-danger"></p>
                    </div>
                    <div class="control-group">
                        <input type="number" id="if" class="form-control p-4" name="total_price" placeholder="total_price" value="{{ old('total_price') }}" />
                        @error('total_price')
                        <label for="if" class="text-danger">total_price to'ldiring</label>
                        @enderror
                        <p class="help-block text-danger"></p>
                    </div>
                    <div class="control-group">
                        <select name="category_id" class="form-control mt-3 mb-3">
                            @foreach($customers as $customer)
                                <option value="{{ $customer->id }}">{{ $customer->name }}</option>
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
