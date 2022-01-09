<div class="min-h-screen hero bg-base-200">
    <div class="flex-col justify-center hero-content">
      <div class="text-left">
            <h1 class="mb-2 text-4xl font-bold">
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
                    <span class="label-text">Username</span>
                </label>
                <input type="text" placeholder="Input your username" class="input input-bordered">
            </div>
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
            </div>
            <div class="form-control">
                <label class="label">
                <span class="label-text">Confirm Password</span>
                </label>
                <input type="text" placeholder="Input your confirm password" class="input input-bordered">
            </div>
            <div class="mt-6 form-control">
                <button class="btn btn-primary">Next</button>
            </div>
        </div>
      </div>
      <div class="mt-2 mb-3">
        <a href="{{ route('auth.signin') }}" class="text-1xl">Already have an account ?</a>
    </div>
    </div>
  </div>
