<div class="box-border sticky max-w-2xl rounded-lg shadow-lg w-80 h-3/4 bg-base-200">
    <div class="flex justify-center mt-10">
        @if (!is_null($image))
            <div class="avatar">
                <div class="w-24 h-24 rounded-full">
                    <img src="{{ asset('storage/images/profile/' . $image) }}">
                </div>
            </div>
        @else
            <div class="avatar placeholder">
                <div class="w-24 h-24 rounded-full bg-neutral-focus text-neutral-content">
                    <span class="text-xl">{{ ucwords($nameShort) }}</span>
                </div>
            </div>
        @endif
    </div>
    <div class="flex justify-between mx-10 mt-5 group_info">
        <div class="posts">
            <div class="text-center text-gray-400 text-md number">{{ $countPost }}</div>
            <div class="text-gray-400 text-md title">Posts</div>
        </div>
        <div class="posts">
            <div class="text-center text-gray-400 text-md number">0</div>
            <div class="text-gray-400 text-md title">Followers</div>
        </div>
        <div class="posts">
            <div class="text-center text-gray-400 text-md number">{{ $countFollowing }}</div>
            <div class="text-gray-400 text-md title">Following</div>
        </div>
    </div>
    <div class="mx-10 mt-5 profile_detail">
        <div class="text-gray-600 name">
            {{ $name }}
        </div>
        <div class="text-gray-400 bio">
           {{ $bio }}
        </div>
        <div class="text-gray-400 address">
            {{ $address }}
        </div>
        <div class="mt-2 text-blue-400">
            <a href="#">{{ $website }}</a>
        </div>

        <div class="mt-5">
            <label wire:click='$set("closeModal", false)' for="modal_profile" class="w-full btn btn-outline btn-primary modal-button">Edit Profile</label>
            <input type="checkbox" id="modal_profile" class="modal-toggle">
            <div class="modal {{ $closeModal ? 'hidden' : '' }}">
            <div class="modal-box">
                <div>
                    <div class="form-control">
                        <label class="label">
                            <span class="label-text">Bio</span>
                        </label>
                        <textarea rows="2" wire:model.lazy='bio' class="textarea textarea-bordered @error('bio')
                            textarea-error
                        @enderror"></textarea>
                        @error('bio')
                            <span class="text-error">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-control">
                        <label class="label">
                            <span class="label-text">Address</span>
                        </label>
                        <textarea rows="3" wire:model.lazy='address' class="textarea textarea-bordered @error('address')
                            textarea-error
                        @enderror"></textarea>
                        @error('address')
                            <span class="text-error">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-control">
                        <label class="label">
                            <span class="label-text">Website</span>
                        </label>
                        <input type="text" wire:model.lazy='website' class="input input-bordered @error('website')
                            input-error
                        @enderror">
                        @error('website')
                            <span class="text-error">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-control">
                        <label class="label">
                            <span class="label-text">Image</span>
                        </label>
                        <input type="file" wire:model.lazy='img' class="@error('img')
                            input-error
                        @enderror">
                        @error('img')
                            <span class="text-error">{{ $message }}</span>
                        @enderror

                        <div class="mt-2">
                            <div class="avatar">
                                <div class="w-24 h-24 rounded-full">
                                    <img src="{{ asset('storage/images/profile/' . $image) }}">
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="modal-action">
                    <button wire:click='updateProfile({{ $user_id }})' for="modal_profile" class="btn btn-primary">Accept</button>
                    <label for="modal_profile" class="btn">Close</label>
                </div>
            </div>
            </div>
        </div>
    </div>
</div>
