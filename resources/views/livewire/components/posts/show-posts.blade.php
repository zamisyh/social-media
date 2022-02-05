<div style="margin-top: -18%; margin-left:21%; width:51%;">
    @foreach ($data_latest as $item)
        @if ($show_follow)
            @php
                $data = \App\Models\Follow::where('user_id', Auth::user()->id)->with('follow')->get();
            @endphp
            @foreach ($data as $a)
                @foreach ($a->follow as $f)
                    @if ($item->type == 'public' && $item->profiles->user_id === $f->user_id)
                        @include('livewire.components.posts.post-content')
                    @endif
                @endforeach
            @endforeach
        @else
            @if ($item->type == 'private' && $item->profiles->user_id == Auth::user()->id)
                @include('livewire.components.posts.post-content')

            @elseif ($item->type == 'public')
                @include('livewire.components.posts.post-content')


            @elseif ($item->type == 'friends')
                @include('livewire.components.posts.post-content')

            @endif
        @endif
    @endforeach
</div>
