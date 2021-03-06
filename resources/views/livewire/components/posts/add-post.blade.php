<div class="flex-auto">
    <textarea
        wire:model.lazy='text' rows="3" class="textarea textarea-bordered @error('text')
            textarea-error
        @enderror" style="width: 100%" placeholder="What's on yout mind ?">
    </textarea>
    @if ($errors->any())
        @foreach ($errors->all() as $item)
            <ul>
                <li class="text-error">{{ $item }}</li>
            </ul>
        @endforeach
    @endif
    <div class="flex justify-between">
        <div class="flex">
         <label class="cursor-pointer">
             <div>
                 <svg xmlns="http://www.w3.org/2000/svg" class="w-10 h-10 text-gray-400 group-hover:text-gray-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                     <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12" />
                 </svg>
                 <p class="pt-2 ml-2 text-sm tracking-wider text-gray-400 group-hover:text-gray-600">
                     Uploads</p>
             </div>
             <input wire:model.lazy='file' type="file" class="opacity-0 @error('file')
                 input-error
             @enderror" />
         </label>
         </div>
        <div>
             <select wire:model.lazy='type' class="select select-bordered @error('type')
                select-error
             @enderror">
                 <option value="">Choose</option>
                 <option value="public">Public</option>
                 <option value="private">Private</option>
                 <option value="friends">Only Friends</option>
             </select>
             <button wire:loading.remove wire:click='savePosts({{ Auth::user()->id }})' class="mt-2 btn btn-primary">Send</button>
             <button wire:loading wire:target='savePosts({{ Auth::user()->id }})' class="mt-2 btn btn-primary" disabled>Sending...</button>

        </div>
    </div>

    <div
        class="sticky flex justify-between p-3 mb-5 rounded-lg shadow-xl bg-base-200"
        style="margin-top: -3%"
        x-data="{open : 'latest'}"
        >
        <div class="mx-2">
            <span class="text-xl text-blue-400">Feeds</span>
        </div>
        <div class="mx-2 space-x-4">
            <span wire:click='$emit("latest")' @click.prevent="open = 'latest'" class="text-lg text-gray-400 cursor-pointer" :class="{'text-blue-400' : open === 'latest'}">Latest</span>
            <span wire:click='$emit("for_you")'@click.prevent="open = 'for_you'" class="text-lg text-gray-400 cursor-pointer" :class="{'text-blue-400' : open === 'for_you'}">For You</span>
            <span wire:click='$emit("following")' @click.prevent="open = 'following'" class="text-lg text-gray-400 cursor-pointer" :class="{'text-blue-400' : open === 'following'}">Following</span>
        </div>
    </div>
 </div>
