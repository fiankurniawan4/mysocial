<div>
    @foreach ($articles as $item)
        <div class="m-6">
            <a href="/articles/{{ $item->slug }}" class="text-2xl font-bold hover:underline">{{ $item->title }}</a>
            @if (auth()->user()->id == $item->user_id)
                {{ $item->id }}
                <label wire:click='selectEdit({{ $item->id }})' for="editModal"
                    class="text-blue-500 font-sans text-sm hover:underline ml-4 cursor-pointer transition">Edit</label>
                <button wire:click='delete({{ $item->id }})'
                    class="text-red-500 font-sans text-sm hover:underline">Delete</button>
            @endif
            <div class="">
                <span class="text-gray-600">By: <a href="/profile/{{ $item->user->id }}"
                        class="text-blue-500 hover:underline">{{ $item->user->name }}</a></span>
                <span class="text-gray-600"> - {{ $item->created_at->diffForHumans() }}</span>
            </div>
            <p class="text-gray-600">{{ $item->description }}</p>
        </div>
        <hr>
    @endforeach
    <input type="checkbox" id="editModal" class="modal-toggle" />
    <div class="modal" role="dialog">
        <div class="modal-box">
            <h3 class="text-lg font-bold items-center">Edit Articles</h3>
            <form wire:submit='editForm'>
                <div class="mb-4">
                    <label for="title" class="block text-gray-700 text-sm font-bold mb-2">Title</label>
                    <input type="text" wire:model='edit.title' id="title"
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                </div>
                <div class="mb-4">
                    <label for="content" class="block text-gray-700 text-sm font-bold mb-2">Content</label>
                    <textarea wire:model='edit.content' id="content"
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"></textarea>
                </div>
                <button type="submit"
                    class="bg-blue-500 modal-backdrop hover:bg-blue-700 text-white font-bold py-2 px-4 rounded hover:underline cursor-pointer transition"
                    for="editModal">Submit</button>
            </form>
        </div>
        <label class="modal-backdrop" for="editModal">Close</label>
    </div>
</div>
