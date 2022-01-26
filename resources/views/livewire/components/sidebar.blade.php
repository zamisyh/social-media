<div class="flex items-center px-10 py-5 rounded-lg shadow-lg w-60 h-60 bg-base-100">
    <nav>
        <ul>
            <li>
                <a href="{{ route('home') }}" class="text-xl text-gray-400">Home</a>
            </li>
            <li class="mt-3">
                <a href="{{ route('update.profile') }}" class="text-xl text-gray-400">Profile</a>
            </li>
            <li class="mt-3">
                <a href="{{ route('home') }}" class="text-xl text-gray-400">Settings</a>
            </li>
            <li class="mt-3">
                <a wire:click='logout' role="button" class="text-xl text-gray-400">Logout</a>
            </li>
        </ul>
    </nav>
</div>
