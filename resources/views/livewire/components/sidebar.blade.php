<div x-data="{ tab: 'home' }" class="flex items-center px-10 py-5 rounded-lg shadow-lg w-60 h-80 bg-base-100">
    <nav>
        <ul>
            <li>
                <a @click.prevent="tab = 'home'" href="{{ route('home') }}" class="text-xl text-gray-400" :class="{'text-blue-400' : tab === 'home'}">Home</a>
            </li>
            <li class="mt-3">
                <a @click.prevent="tab = 'profile'" href="{{ route('home') }}" class="text-xl text-gray-400" :class="{'text-blue-400' : tab === 'profile'}">Profile</a>
            </li>
            <li class="mt-3">
                <a @click.prevent="tab = 'settings'" href="{{ route('home') }}" class="text-xl text-gray-400" :class="{'text-blue-400' : tab === 'settings'}">Settings</a>
            </li>
            <li class="mt-3">
                <a @click.prevent="tab = 'logout'" href="{{ route('home') }}" class="text-xl text-gray-400" :class="{'text-blue-400' : tab === 'logout'}">Logout</a>
            </li>
        </ul>
    </nav>
</div>
