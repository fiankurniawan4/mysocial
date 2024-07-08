<div class="flex flex-col m-4">
    <h1 class="text-xl lg:text-3xl font-bold">{{ $articles->title }}</h1>
    <div class="flex flex-row gap-4">
        <p class="text-gray-400 font-mono">{{ $articles->created_at->diffForHumans() }}</p>
        <p class="text-orange-400 font-mono">{{ $articles->user->name }}</p>
    </div>
    <p class="text-md lg:text-xl font-sans">{!! nl2br(e($articles->body)) !!}</p>
    @auth
    <form wire:submit='save' class="mt-4">
        <label for="comment" class="text-lg font-bold">[{{ $total_comments }}] Comment</label>
        <textarea wire:model='form.comment' id="comment" rows="4"
            class="border-2 p-2 rounded-lg w-full @error('form.comment') border-red-500 @enderror"
            placeholder="Tuliskan komentar..."></textarea>
        @error('form.comment')
            <p class="text-red-500">{{ $message }}</p>
        @enderror
        <button class="bg-blue-500 text-white p-2 rounded-lg mt-2 w-full">Submit</button>
    </form>
    @endauth
</div>
