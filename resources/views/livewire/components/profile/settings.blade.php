<div>
    @section('title', 'Social Media App')
    <div class="px-10 mt-10">
        <h1 class="text-2xl text-gray-400">Social Media App <span class="text-blue-400">v.1</span></h1>
    </div>

    <div class="flex justify-between h-screen gap-4 py-3 mx-10">
        <!-- Navbar -->
        @livewire('components.sidebar')


        <div class="w-full px-5 py-5 rounded-lg shadow-lg h-96 bg-base-200">
            <div class="form-control">
                <label class="label">
                    <span class="label-text">Old Password</span>
                </label>
                <input type="password" wire:model.lazy='old_password' class="input input-bordered @error('old_password')
                    input-error
                @enderror">
                @error('old_password')
                    <span class="text-error">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-control">
                <label class="label">
                    <span class="label-text">New Password</span>
                </label>
                <input type="password" wire:model.lazy='new_password' class="input input-bordered @error('new_password')
                    input-error
                @enderror">
                @error('new_password')
                    <span class="text-error">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-control">
                <label class="label">
                    <span class="label-text">Confirm Password</span>
                </label>
                <input type="password" wire:model.lazy='confirm_password' class="input input-bordered @error('confirm_password')
                    input-error
                @enderror">
                @error('confirm_password')
                    <span class="text-error">{{ $message }}</span>
                @enderror
            </div>

            <button wire:loading.remove wire:click='updatePassword({{ Auth::user()->id }})' class="mt-8 btn btn-primary btn-outline">Update Password</button>
            <button wire:loading wire:target='updatePassword({{ Auth::user()->id }})' class="mt-8 btn btn-primary" disabled>Updating..</button>

        </div>

    </div>
</div>
