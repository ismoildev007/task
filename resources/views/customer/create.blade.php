<x-layouts.auth>
    <div class="container">
        <div class="w-50 py-4">
            <div class="contact-form">
                <div id="success"></div>

                <form action="{{ route('customer.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="control-group">
                        <input type="text" id="if" class="form-control p-4" name="name" placeholder="ism" value="{{ old('name') }}" />
                        @error('name')
                        <label for="if" class="text-danger">Sarlavhani to'ldiring</label>
                        @enderror
                        <p class="help-block text-danger"></p>
                    </div>
                    <div class="control-group">
                        <input type="email" id="if" class="form-control p-4" name="email" placeholder="Description" value="{{ old('email') }}" />
                        @error('email')
                        <label for="if" class="text-danger">emailni to'ldiring</label>
                        @enderror
                        <p class="help-block text-danger"></p>
                    </div>
                    <div class="control-group">
                        <input type="text" id="if" class="form-control p-4" name="address" placeholder="address" value="{{ old('address') }}" />
                        @error('address')
                        <label for="if" class="text-danger">address to'ldiring</label>
                        @enderror
                        <p class="help-block text-danger"></p>
                    </div>
                    <div class="control-group">
                        <input type="text" id="if" class="form-control p-4" name="phone" placeholder="phone" value="{{ old('phone') }}" />
                        @error('phone')
                        <label for="if" class="text-danger">phone to'ldiring</label>
                        @enderror
                        <p class="help-block text-danger"></p>
                    </div>
                    <div>
                        <button class="btn btn-primary btn-block py-3 px-5" type="submit" id="sendMessageButton">Saqlash</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-layouts.auth>
