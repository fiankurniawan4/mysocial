<input type="checkbox" id="editModal" class="modal-toggle" />
<div class="modal" role="dialog">
    <div class="modal-box">
        <h3 class="text-lg font-bold items-center">Edit Articles</h3>
        <form wire:submit='editForm'>
            <div class="mb-4">
                <label for="title" class="block text-gray-700 text-sm font-bold mb-2">Title</label>
                <input type="text" wire:model='edit.title2' id="title"
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
            </div>
            <div class="mb-4">
                <label for="content" class="block text-gray-700 text-sm font-bold mb-2">Content</label>
                <textarea wire:model='edit.content2' id="content"
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"></textarea>
            </div>
            <button type="submit"
                class="bg-blue-500 modal-backdrop hover:bg-blue-700 text-white font-bold py-2 px-4 rounded hover:underline cursor-pointer transition"
                for="editModal">Submit</button>
        </form>
    </div>
    <label class="modal-backdrop" for="editModal">Close</label>
</div>
