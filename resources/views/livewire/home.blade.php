<div>
    @section('title', 'Social Media App')
    <div class="px-10 mt-10">
        <h1 class="text-2xl text-gray-400">Social Media App <span class="text-blue-400">v.1</span></h1>
    </div>

    <div class="flex flex-wrap justify-between h-screen gap-4 py-3 mx-10">
        <!-- Navbar -->
        @livewire('components.sidebar')
        <!-- Add Post -->
        @livewire('components.posts.add-post')
        <!-- Profile -->
        @livewire('components.profile.index')

        <div class="max-w-2xl rounded-lg shadow-2xl w-96 h-80 bg-base-300" style="width: 630px; margin-left:21%; margin-top:-20%; ">
            <!-- Status -->
        </div>


    </div>
</div>
