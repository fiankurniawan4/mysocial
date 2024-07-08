<div class="flex flex-col gap-4">
    @foreach ($comments as $item)
        <div class="flex flex-col">
            <div class="flex flex-row gap-4">
                <h1 class="text-lg font-medium">{{ $item->user->name }}</h1>
                <p class="text-lg font-medium">({{ $item->created_at->diffForHumans() }})</p>
            </div>
            <p class="text-md">{{ $item->comment }}</p>
            <div class="flex flex-row gap-2 mt-2">
                <button class="btn btn-primary" wire:click="selectReply({{ $item->id }})">Balas</button>
                <button class="btn btn-warning" wire:click="selectEdit({{ $item->id }})">Edit</button>
                <button class="btn btn-error" wire:click="delete({{ $item->id }})">Delete</button>
            </div>
        </div>
        @if (isset($edit_comment_id) && $edit_comment_id == $item->id)
            <div class="flex flex-col gap-4 mt-4">
                <form wire:submit="change">
                    <textarea wire:model='mchange.comment' class="border-2 p-2 rounded-lg w-full @error('mchange.comment') border-red-500 @enderror"
                        placeholder="Tuliskan komentar..." rows="4"></textarea>
                    <button class="btn btn-primary">Edit</button>
                </form>
            </div>
        @endif
        @if (isset($comment_id) && $comment_id == $item->id)
            <div class="flex flex-col gap-4 mt-4">
                <form wire:submit="reply">
                    <textarea wire:model='mreply.comment' id="comment" rows="4"
                        class="border-2 p-2 rounded-lg w-full @error('mreply.comment') border-red-500 @enderror"
                        placeholder="Tuliskan komentar..."></textarea>
                    <button class="btn btn-primary">Balas</button>
                </form>
            </div>
        @endif
        <hr class="bg-gray-400">
        @if ($item->childrens)
            @foreach ($item->childrens as $item2)
                <div class="flex flex-col gap-4 ml-4">
                    <div class="flex flex-row gap-4">
                        <h1 class="text-lg font-medium">{{ $item2->user->name }}</h1>
                        <p class="text-lg font-medium">({{ $item2->created_at->diffForHumans() }})</p>
                    </div>
                    <p class="text-md">{{ $item2->comment }}</p>
                    <div class="flex flex-row gap-2 mt-2">
                        <button class="btn btn-primary" wire:click="selectReply({{ $item2->id }})">Balas</button>
                        <button class="btn btn-warning" wire:click="selectEdit({{ $item2->id }})">Edit</button>
                        <button class="btn btn-error" wire:click="delete({{ $item2->id }})">Delete</button>
                    </div>
                </div>
                @if (isset($edit_comment_id) && $edit_comment_id == $item2->id)
                    <div class="flex flex-col gap-4 mt-4">
                        <form wire:submit="change">
                            <textarea wire:model='mchange.comment' id="comment" rows="4"
                                class="border-2 p-2 rounded-lg w-full @error('mchange.comment') border-red-500 @enderror"
                                placeholder="Tuliskan komentar..."></textarea>
                            <button class="btn btn-primary">Edit</button>
                        </form>
                    </div>
                @endif
                @if (isset($comment_id) && $comment_id == $item2->id)
                    <div class="flex flex-col gap-4 mt-4">
                        <form wire:submit="reply">
                            <textarea wire:model='mreply.comment' id="comment" rows="4"
                                class="border-2 p-2 rounded-lg w-full @error('mreply.comment') border-red-500 @enderror"
                                placeholder="Tuliskan komentar..."></textarea>
                            <button class="btn btn-primary">Balas</button>
                        </form>
                    </div>
                @endif
            @endforeach
        @endif
    @endforeach
</div>
