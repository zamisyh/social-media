<div>
    @section('title', 'Social Media App')
    @section('theme', $changeTheme);
    <div class="flex justify-between pt-10 mx-10">
        <div>
            <h1 class="text-2xl text-gray-400">Social Media App <span class="text-blue-400">v.1</span></h1>
        </div>
        <div>
            {{ $changeTheme }}
            <select class="select select-bordered" wire:model='changeTheme'>
                <option value="light">Light</option>
                <option value="dark">Dark</option>
                <option value="cupcake">Cupcake</option>
                <option value="bumblebee">Bumblebee</option>
                <option value="emerald">Emerald</option>
                <option value="corporate">Corporate</option>
                <option value="synthwave">Synthwave</option>
                <option value="retro">Retro</option>
                <option value="cyberpunk">Cyberpunk</option>
                <option value="valentine">Valentine</option>
                <option value="halloween">Halloween</option>
                <option value="garden">Garden</option>
                <option value="forest">Forest</option>
                <option value="aqua">Aqua</option>
                <option value="lofi">Lofi</option>
                <option value="pastel">Pastel</option>
                <option value="fantasy">Fantasy</option>
                <option value="wireframe">Wireframe</option>
                <option value="black">Black</option>
                <option value="luxury">Luxury</option>
                <option value="dracula">Dracula</option>
                <option value="cmyk">Cmyk</option>
            </select>
        </div>
    </div>

    <div class="flex flex-wrap justify-between h-screen gap-4 py-3 mx-10">
        <div class="rounded-lg shadow-lg w-60 h-80 bg-base-300">
            <!-- Navbar -->

        </div>
        @livewire('components.posts.add-post')
        <div class="max-w-2xl rounded-lg shadow-lg w-80 h-80 bg-base-300">
            <!-- Profile -->
        </div>

        <div class="max-w-2xl rounded-lg shadow-2xl w-96 h-80 bg-base-200" style="width: 630px; margin-left:21%; margin-top:-12%; ">
            <!-- Status -->
        </div>


    </div>
</div>
