<x-layouts.auth>
    <div class="row">
        <div class="offset-md-2 col-lg-5 col-md-7 offset-lg-4 offset-md-3">
            <div class="panel border bg-white">
                <div class="panel-heading">
                    <h3 class="pt-3 font-weight-bold">Ro'yhatdan o'tish</h3>
                </div>
                <div class="panel-body p-3">
                    <form action="{{ route('register_store') }}" method="POST">
                        @csrf
                        <div class="form-group py-2">
                            <div class="input-field">
                                <span class="far fa-user p-2"></span>
                                <input name="name" type="text" placeholder="Ismingizni kiriting" required>
                            </div>
                        </div>
                        <div class="form-group py-2">
                            <div class="input-field">
                                <span class="far fa-user p-2"></span>
                                <input name="email" type="text" placeholder="Email" required>
                            </div>
                        </div>
                        <div class="form-group py-1 pb-2">
                            <div class="input-field">
                                <span class="fas fa-lock px-2"></span>
                                <input name="password" type="password" placeholder="Parolni kiriting" required>
                                <button class="btn bg-white text-muted"> <span class="far fa-eye-slash"></span> </button>
                            </div>
                        </div>
                        <div class="form-group py-1 pb-2">
                            <div class="input-field">
                                <span class="fas fa-lock px-2"></span>
                                <input name="password_confirmation" type="password" placeholder="Parolni tasdiqlang" required>
                                <button class="btn bg-white text-muted"> <span class="far fa-eye-slash"></span> </button>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary btn-block mt-3">jo'natish</button>
                        <div class="text-center pt-4 text-muted">Ro'yhatdan o'tganmisiz
                            <a href="{{ route('login') }}">Login</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-layouts.auth>
