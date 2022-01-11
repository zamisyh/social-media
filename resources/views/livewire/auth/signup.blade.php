@section('title', 'Social Media App - Signup Page')
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

            @if ($errors->any())
                <div class="alert alert-error">
                    <div class="flex-1">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" class="w-6 h-6 mx-2 stroke-current">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path>
                        </svg>
                        <label>Oppss, something error. check your form registration</label>
                    </div>
                </div>
            @endif

            @if ($isNextForm)
                <div class="form-control">
                    <label class="label">
                        <span class="label-text">Name</span>
                    </label>
                    <input type="text" wire:model.lazy='name' placeholder="Input your name" class="input input-bordered @error('name')
                        input-error
                    @enderror">
                    @error('name')
                        <span class="text-error">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-control">
                    <label class="label">
                        <span class="label-text">Gender</span>
                    </label>
                    <select wire:model.lazy='gender' class="select select-bordered @error('gender')
                        select-error
                    @enderror">
                        <option value="">Choose</option>
                        <option value="male">Male</option>
                        <option value="female">Female</option>

                    </select>
                    @error('gender')
                        <span class="select-error">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-control">
                    <label class="label">
                        <span class="label-text">Birthday</span>
                    </label>
                    <input type="date" wire:model.lazy='birthday' placeholder="Input your birthday" class="input input-bordered @error('birthday')
                        input-error
                    @enderror">
                    @error('birthday')
                        <span class="text-error">{{ $message }}</span>
                    @enderror
                </div>

                @if ($isSubmit)
                    <div class="flex justify-between mt-6">
                        <button wire:click='$set("isNextForm", false)' class="btn btn-primary">Previous</button>
                        <button wire:loading.remove wire:click='save' class="btn btn-primary">Submit</button>
                        <button wire:loading wire:target='save' class="btn btn-primary loading" disabled>Submitting..</button>
                    </div>
                @else
                    <div class="mt-6 form-control">
                        <button wire:click='$set("isNextForm", false)' class="btn btn-primary">Previous</button>
                    </div>
                @endif
            @else
                <div class="form-control">
                    <label class="label">
                        <span class="label-text">Username</span>
                    </label>
                    <input type="text" wire:model.lazy='username' placeholder="Input your username" class="input input-bordered @error('username')
                        input-error
                    @enderror">
                    @error('username')
                        <span class="text-error">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-control">
                    <label class="label">
                        <span class="label-text">Email</span>
                    </label>
                    <input type="text" wire:model.lazy='email' placeholder="Input your email" class="input input-bordered @error('email')
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
                    <label class="input-group">
                        <input type="{{ $isShowPassword ? 'text' : 'password' }}" wire:model.lazy='password' placeholder="Input your password" class="input input-bordered @error('password')
                            input-error
                        @enderror">
                        @if ($isShowPassword)
                            <span wire:click='$set("isShowPassword", false)'>
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M3.707 2.293a1 1 0 00-1.414 1.414l14 14a1 1 0 001.414-1.414l-1.473-1.473A10.014 10.014 0 0019.542 10C18.268 5.943 14.478 3 10 3a9.958 9.958 0 00-4.512 1.074l-1.78-1.781zm4.261 4.26l1.514 1.515a2.003 2.003 0 012.45 2.45l1.514 1.514a4 4 0 00-5.478-5.478z" clip-rule="evenodd" />
                                    <path d="M12.454 16.697L9.75 13.992a4 4 0 01-3.742-3.741L2.335 6.578A9.98 9.98 0 00.458 10c1.274 4.057 5.065 7 9.542 7 .847 0 1.669-.105 2.454-.303z" />
                                </svg>
                            </span>
                        @else
                            <span wire:click='$set("isShowPassword", true)'>
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 20 20" fill="currentColor">
                                    <path d="M10 12a2 2 0 100-4 2 2 0 000 4z" />
                                    <path fill-rule="evenodd" d="M.458 10C1.732 5.943 5.522 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z" clip-rule="evenodd" />
                                </svg>
                            </span>
                        @endif
                    </label>
                    @error('password')
                        <span class="text-error">{{ $message }}</span>
                    @enderror

                </div>
                <div class="form-control">
                    <label class="label">
                        <span class="label-text">Confirm Password</span>
                    </label>
                    <label class="input-group">
                        <input type="{{ $isShowConfirmPassword ? 'text' : 'password' }}" wire:model.lazy='confirm_password' placeholder="Input your confirm password" class="input input-bordered @error('confirm_password')
                        input-error
                        @enderror">
                        @if ($isShowConfirmPassword)
                            <span wire:click='$set("isShowConfirmPassword", false)'>
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M3.707 2.293a1 1 0 00-1.414 1.414l14 14a1 1 0 001.414-1.414l-1.473-1.473A10.014 10.014 0 0019.542 10C18.268 5.943 14.478 3 10 3a9.958 9.958 0 00-4.512 1.074l-1.78-1.781zm4.261 4.26l1.514 1.515a2.003 2.003 0 012.45 2.45l1.514 1.514a4 4 0 00-5.478-5.478z" clip-rule="evenodd" />
                                    <path d="M12.454 16.697L9.75 13.992a4 4 0 01-3.742-3.741L2.335 6.578A9.98 9.98 0 00.458 10c1.274 4.057 5.065 7 9.542 7 .847 0 1.669-.105 2.454-.303z" />
                                </svg>
                            </span>
                        @else
                            <span wire:click='$set("isShowConfirmPassword", true)'>
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 20 20" fill="currentColor">
                                    <path d="M10 12a2 2 0 100-4 2 2 0 000 4z" />
                                    <path fill-rule="evenodd" d="M.458 10C1.732 5.943 5.522 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z" clip-rule="evenodd" />
                                </svg>
                            </span>
                        @endif
                    </label>

                    @error('confirm_password')
                        <span class="text-error">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mt-6 form-control">
                    <button wire:click='$set("isNextForm", true)' class="btn btn-primary">Next</button>
                </div>
            @endif
        </div>
      </div>
        @if (!$isNextForm)
            <div class="mt-2 mb-3">
                <a href="{{ route('auth.signin') }}" class="text-1xl">Already have an account ?</a>
            </div>
        @endif
        @if (Auth::check())
        <script>
            window.location.href = "{{ route('home') }}";
        </script>
    @endif
    </div>
</div>


