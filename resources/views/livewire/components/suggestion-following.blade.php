<div>
    <h1 class="mb-3 text-xl font-bold text-gray-500">Suggestion</h1>
    <div class="w-80">
        <div class="px-5 py-5 detail_profile">
           @foreach ($data_following as $item)
                @if (Auth::user()->id != $item->user_id)
                    <div class="flex justify-between">
                        <div class="data_profile">
                            <div class="avatar">
                                <div class="w-10 h-10 mb-8 rounded-full">
                                    @if (!is_null($item->image))
                                        <img src="{{ asset('storage/images/profile/' . $item->image) }}">
                                    @else
                                        <img src="{{ asset('blank.png') }}" alt="">
                                    @endif
                                </div>
                                <span class="mt-1 ml-3 text-gray-800">{{ $item->name }}</span>
                            </div>
                        </div>
                        <div class="mt-1 button_follow">
                            @php
                                $data = \App\Models\FollowUser::where('user_id', $item->id)->first();
                            @endphp
                            @if (!is_null($data))
                                <svg xmlns="http://www.w3.org/2000/svg" wire:click='unfollow({{ $item->id }})' class="w-6 h-6 text-red-400" viewBox="0 0 20 20" fill="currentColor">
                                    <path d="M11 6a3 3 0 11-6 0 3 3 0 016 0zM14 17a6 6 0 00-12 0h12zM13 8a1 1 0 100 2h4a1 1 0 100-2h-4z" />
                                </svg>
                            @else
                                <svg xmlns="http://www.w3.org/2000/svg" wire:click='follows({{ $item->id }})' role="button" class="w-6 h-6 text-blue-500" viewBox="0 0 20 20" fill="currentColor">
                                    <path d="M8 9a3 3 0 100-6 3 3 0 000 6zM8 11a6 6 0 016 6H2a6 6 0 016-6zM16 7a1 1 0 10-2 0v1h-1a1 1 0 100 2h1v1a1 1 0 102 0v-1h1a1 1 0 100-2h-1V7z" />
                                </svg>

                            @endif

                        </div>
                    </div>
                @endif
           @endforeach
        </div>

        <div>
            <button wire:click='loadMore' wire:loading.remove class="w-full btn btn-outline btn-primary">Load More</button>
            <button wire:loading wire:target='loadMore' class="w-full btn btn-primary" disabled>Load data ... </button>
        </div>
    </div>
</div>
