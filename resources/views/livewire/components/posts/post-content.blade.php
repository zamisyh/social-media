<div>
    <div class="flex justify-between header">
        <div class="detail_profile">
            <div class="avatar">
                <div class="w-10 h-10 mb-8 rounded-full">
                    @if (!is_null($item->profiles->image))
                        <img src="{{ asset('storage/images/profile/' . $item->profiles->image) }}">
                    @else
                        <img src="{{ asset('blank.png') }}" alt="">
                    @endif
                </div>
                <span class="ml-3 text-gray-800">{{ $item->profiles->name }}</span>
                @if ($item->profiles->gender === "male")
                    <span class="ml-3 badge badge-primary">{{ $item->profiles->age }}</span><br>
                @else
                    <span class="ml-3 badge badge-secondary">{{ $item->profiles->age }}</span>
                @endif
            </div>
            <span class="text-xs text-gray-500" style="margin-left: -40%;">{{ $item->created_at->diffForHumans() }}</span>

        </div>
    @if (Auth::user()->id === $item->user_id)
            <div class="dots_delete" role="button" wire:click='deletePost({{ $item->id }})'>
                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 5v.01M12 12v.01M12 19v.01M12 6a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2z" />
                </svg>
            </div>
    @endif
    </div>
    <div class="content">
    @if (!is_null($item->file))
            <div class="mt-2 mb-3">
                <img class="max-h-60" src="{{ asset('storage/images/posts/' . $item->file) }}" alt="">
            </div>
    @endif
    {{ $item->text }}
    </div>
    <div class="flex gap-4 my-5 data_all">
        @php
            $like = \App\Models\Like::where('user_id', Auth::user()->id)->first();
            $post = \App\Models\LikePost::where('post_id', $item->id)->get();
            $count = \App\Models\LikePost::where('post_id', $item->id)->count();

            $like_id = null;
            $post_id = null;
            foreach ($post as $key => $value) {
                $like_id = $value->like_id;
                $post_id = $value->post_id;
            }
        @endphp
        <div class="flex love" role="button">
           @if ($like->id != $like_id)
                <svg wire:loading.long wire:click='likePost({{ $item->id }})' xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                </svg>
           @else
                <svg xmlns="http://www.w3.org/2000/svg" wire:loading.long wire:click='unlikePost({{ $item->id }})' class="w-6 h-6 text-red-500" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M3.172 5.172a4 4 0 015.656 0L10 6.343l1.172-1.171a4 4 0 115.656 5.656L10 17.657l-6.828-6.829a4 4 0 010-5.656z" clip-rule="evenodd" />
                </svg>
           @endif

          <span class="ml-2">{{ $count }}</span>

        </div>
        <div class="flex chat" role="button">
           @if ($openFormComment)
                <svg xmlns="http://www.w3.org/2000/svg" wire:click='closeComment({{ $item->id }})' class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z" />
                </svg>
           @else
                <svg xmlns="http://www.w3.org/2000/svg" wire:click='openComment({{ $item->id }})' class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z" />
                </svg>
           @endif

           <span class="ml-2">0</span>
        </div>
    </div>

    @if ($openFormComment)
        <div class="mt-2 mb-2">
            <div class="data_comment">
                @foreach ($data_comment as $comment)
                    @foreach ($comment->comment as $c)
                        @if ($c->post_id === $item->id)
                            <div>
                                <span class="text-sm text-gray-600">{{ $item->profiles->name }}</span><br>
                                <span class="text-xs text-gray-400">{{ $comment->created_at->diffForHumans() }}</span><br>
                                <div class="mt-3 mb-5">
                                    <span class="text-sm text-gray-500"> {{ $comment->text }}</span>
                                </div>
                            </div>
                        @endif
                    @endforeach
                @endforeach
            </div>
            <div class="flex mt-4 mb-3 comment">
                <div class="form-control">
                    <input type="text" wire:model.lazy='comment_text' placeholder="Add your comment" class="input input-bordered input-sm @error('comment_text')
                        input-error
                    @enderror">
                </div>
                <div class="ml-3">
                    <button wire:loading.remove wire:click='saveComment({{ $item->id }})' class="btn btn-primary btn-outline btn-sm">Submit</button>
                    <button wire:loading wire:target='saveComment({{ $item->id }})' class="btn btn-primary btn-sm" disabled>Submitting...</button>
                </div>
            </div>
            @error('comment_text')
                <span class="text-error">{{ $message }}</span>
            @enderror
        </div>
    @endif
</div>


