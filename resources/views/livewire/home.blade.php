<div>
    @livewire('home-index', ['articles' => $articles])
    <div class="fixed bottom-0 right-0 m-4">
        <label for="my_modal_7"
            class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded hover:underline cursor-pointer transition">
            Tambah Post
        </label>
    </div>
    <input type="checkbox" id="my_modal_7" class="modal-toggle" />
    <div class="modal" role="dialog">
        <div class="modal-box">
            <h3 class="text-lg font-bold items-center">Articles</h3>
            <form wire:submit='save'>
                <div class="mb-4">
                    <label for="title" class="block text-gray-700 text-sm font-bold mb-2">Title</label>
                    <input type="text" wire:model='title' id="title"
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                </div>
                <div class="mb-4">
                    <label for="content" class="block text-gray-700 text-sm font-bold mb-2">Content</label>
                    <textarea wire:model='content' id="content"
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"></textarea>
                </div>
                {{ $errors }}
                <button type="submit"
                    class="bg-blue-500 modal-backdrop hover:bg-blue-700 text-white font-bold py-2 px-4 rounded hover:underline cursor-pointer transition"
                    for="my_modal_7">Submit</button>
            </form>
        </div>
        <label class="modal-backdrop" for="my_modal_7">Close</label>
    </div>
</div>
