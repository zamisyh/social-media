<div>
    @section('title', 'Social Media App')
    <div class="px-10 mt-10">
        <h1 class="text-2xl text-gray-400">Social Media App <span class="text-blue-400">v.1</span></h1>
    </div>

    <div class="flex justify-between h-screen gap-4 py-3 mx-10">
        <!-- Navbar -->
        @livewire('components.sidebar')


        <div class="w-full px-5 py-5 rounded-lg shadow-lg h-3/4 bg-base-300">
            <div class="form-control">
                <label class="label">
                    <span class="label-text">Name</span>
                </label>
                <input type="text" wire:model.lazy='name' class="input input-bordered @error('name')
                    input-error
                @enderror">
                @error('name')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-control">
                <label class="label">
                    <span class="label-text">Gender</span>
                </label>
                <select  wire:model.lazy='gender' class="select select-bordered @error('gender')
                    select-error
                @enderror">
                    <option value="">Choose</option>
                    <option value="male">Male</option>
                    <option value="female">Female</option>
                </select>
                @error('gender')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-control">
                <label class="label">
                    <span class="label-text">Birthday</span>
                </label>
                <input type="date" wire:model.lazy='birthday' class="input input-bordered @error('birthday')
                    input-error
                @enderror">
                @error('birthday')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

        </div>

    </div>
</div>
