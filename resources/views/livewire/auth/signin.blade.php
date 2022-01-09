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
            <label class="label">
              <span class="label-text">Email</span>
            </label>
            <input type="text" placeholder="Input your email" class="input input-bordered">
          </div>
          <div class="form-control">
            <label class="label">
              <span class="label-text">Password</span>
            </label>
            <input type="text" placeholder="Input your password" class="input input-bordered">
            <label class="label">
              <a href="#" class="label-text-alt">Forgot password?</a>
            </label>
          </div>
          <div class="mt-6 form-control">
            <button class="btn btn-primary">Login</button>
          </div>
        </div>
      </div>
      <div class="mt-2 mb-3">
        <a href="{{ route('auth.signup') }}" class="text-1xl">Don't have any account ?</a>
    </div>
    </div>
  </div>
