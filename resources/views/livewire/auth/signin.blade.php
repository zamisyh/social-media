@section('title', 'Social Media App - Login Page')

<div class="min-h-screen hero bg-base-200">
    <div class="flex-col justify-center hero-content">
      <div class="text-left">
            <h1 class="mb-1 text-4xl font-bold">
                Social Media App
            </h1>
            <p class="mb-2">
                Bosan sendiri terus ? yuk cari teman disini
            </p>
      </div>
      <div class="flex-shrink-0 w-full max-w-sm shadow-2xl card bg-base-100">
        <div class="card-body">
          <div class="form-control">
            @if (session()->has('message'))
             <div class="alert alert-success" x-data="{show: false}" :class="{'hidden' : show === true}">
                <div class="flex-1">
                    <label>Succesfully logout</label>
                  </div>
                  <div class="flex-none">
                      <svg role="button" @click="show = true" xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 mx-2 hide" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                      </svg>
                  </div>
            </div>
            @endif


          </div>
          <div class="form-control">
            <label class="label">
              <span class="label-text">Email</span>
            </label>
            <input wire:model.lazy='email' type="text" placeholder="Input your email" class="input input-bordered @error('email')
                input-error
            @enderror">
            @error('email')
                <span class="text-error">{{ $message }}</span>
            @enderror
          </div>
          <div class="form-control">
            <label class="label">
              <span class="label-text">Password</span>
            </label>
            <input wire:model.lazy='password' type="password" placeholder="Input your password" class="input input-bordered @error('password')
                input-error
            @enderror">
            @error('password')
                <span class="text-error">{{ $message }}</span>
            @enderror
            <label class="label">
              <a href="#" class="label-text-alt">Forgot password?</a>
            </label>
          </div>
          <div class="mt-6 form-control">
            <button wire:click='login' wire:loading.remove class="btn btn-primary">Login</button>
            <button wire:loading wire:target='login' class="btn btn-primary loading" disabled>Login ...</button>

        </div>
        </div>
      </div>
      <div class="mt-2 mb-3">
        <a href="{{ route('auth.signup') }}" class="text-1xl">Don't have any account ?</a>
    </div>
    </div>

    @if ($isRedirect)
        <script>
            setTimeout(function () {
                window.location.href = "{{ route('home') }}";
            }, 4000);
        </script>
    @endif

    @if (Auth::check())
        <script>
            window.location.href = "{{ route('home') }}";
        </script>
    @endif
</div>

