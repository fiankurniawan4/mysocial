<div class="flex  h-[calc(100%-1rem)] justify-center items-center">
    <div class="border border-gray-300 p-6 rounded-lg px-4 py-2">
        <h1 class="text-2xl font-bold mb-4">Profile</h1>
        <p class="">Name: {{ $user->name }}</p>
        <p class="mb-4">Jumlah Articles: {{ $total_articles }}</p>
        <div class="flex flex-row gap-2">
            <button class="btn btn-info text-white">Message</button>
            @if ($user->id == auth()->id())
                <button data-modal-target="default-modal" data-modal-toggle="default-modal"
                    class="btn btn-warning text-white">Edit</button>
            @endif
        </div>
        <div class="">
            @error('name')
                <span class="text-red-500">{{ $message }}</span>
            @enderror
            @error('username')
                <span class="text-red-500">{{ $message }}</span>
            @enderror
            @error('password')
                <span class="text-red-500">{{ $message }}</span>
            @enderror
            @error('password_confirmation')
                <span class="text-red-500">{{ $message }}</span>
            @enderror
        </div>
    </div>
    <div id="default-modal" data-modal-backdrop="static" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative p-4 w-full max-w-2xl max-h-full">
            <!-- Modal content -->
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                <!-- Modal header -->
                <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                    <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                        Edit Form
                    </h3>
                    <button type="button"
                        class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                        data-modal-hide="default-modal">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>
                <!-- Modal body -->
                <div class="p-4 md:p-5 space-y-4">
                    <form wire:submit='profileUpdate'>
                        <div class="mb-4">
                            <label for="name"
                                class="block text-sm font-medium text-gray-700 dark:text-gray-200">Name</label>
                            <input type="text" wire:model='name' id="name" name="name"
                                value="{{ $user->name }}"
                                class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm dark:bg-gray-800 dark:text-white">
                        </div>
                        <div class="mb-4">
                            <label for="username"
                                class="block text-sm font-medium text-gray-700 dark:text-gray-200">Username</label>
                            <input type="text" wire:model='username' id="username" name="username"
                                value="{{ $user->username }}"
                                class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm dark:bg-gray-800 dark:text-white">
                        </div>
                        <div class="mb-4">
                            <label for="password"
                                class="block text-sm font-medium text-gray-700 dark:text-gray-200">Password</label>
                            <input type="password" wire:model='password' id="password" name="password"
                                class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm dark:bg-gray-800 dark:text-white">
                        </div>
                        <div class="mb-4">
                            <label for="password_confirmation"
                                class="block text-sm font-medium text-gray-700 dark:text-gray-200">Password
                                Confirmation</label>
                            <input type="password" wire:model='password_confirmation' id="password_confirmation"
                                name="password_confirmation"
                                class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm dark:bg-gray-800 dark:text-white">
                        </div>
                        <div class="mb-4">
                            <button type="submit"
                                class="py-2.5 px-5 text-sm font-medium text-white focus:outline-none bg-indigo-600 rounded-lg border border-gray-200 hover:bg-indigo-400">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
