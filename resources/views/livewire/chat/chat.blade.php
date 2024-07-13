<div>
    <!-- component -->
    <div class="flex h-screen overflow-hidden">
        <!-- Main Chat Area -->
        <div class="flex-1">
            <!-- Chat Header -->
            <header class="bg-white p-4 text-gray-700">
                <h1 class="text-2xl font-semibold">{{ $user->name }}</h1>
            </header>

            <!-- Chat Messages -->
            <div class="h-screen overflow-y-auto p-4 pb-36">
                <!-- Incoming Message -->
                @foreach ($messages as $message)
                    @if ($message['sender'] != auth()->user()->name)
                        <div class="flex mb-4 cursor-pointer">
                            <div class="w-9 h-9 rounded-full flex items-center justify-center mr-2">
                                <img src="https://placehold.co/200x/ffa8e4/ffffff.svg?text=ʕ•́ᴥ•̀ʔ&font=Lato"
                                    alt="{{ $message['sender'] }}" class="w-8 h-8 rounded-full">
                            </div>
                            <div class="flex max-w-96 bg-white rounded-lg p-3 gap-3">
                                <div class="flex flex-col">
                                    <h1>{{ $message['sender'] }}</h1>
                                    <p>{{ $message['message'] }}</p>
                                </div>
                            </div>
                        </div>
                    @else
                        <!-- Outgoing Message -->
                        <div class="flex justify-end mb-4">
                            <div class="flex max-w-96 bg-indigo-500 text-white rounded-lg p-3 gap-3">
                                <div class="flex flex-col">
                                    <h1>{{ auth()->user()->name }}</h1>
                                    <p>{{ $message['message'] }}</p>
                                </div>
                            </div>
                            <div class="w-9 h-9 rounded-full flex items-center justify-center ml-2">
                                <img src="https://placehold.co/200x/b7a8ff/ffffff.svg?text=ʕ•́ᴥ•̀ʔ&font=Lato"
                                    alt="My Avatar" class="w-8 h-8 rounded-full">
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>

            <!-- Chat Input -->
            <footer class="bg-white border-t border-gray-300 p-4 fixed bottom-0 w-full">
                <div class="flex items-center">
                    <form wire:submit='sendMessage()' class="flex w-full">
                        <input wire:model='message' type="text" placeholder="Type a message..."
                            class="w-full p-2 rounded-md border border-gray-400 focus:outline-none focus:border-blue-500">
                        <button type="submit" class="bg-indigo-500 text-white px-4 py-2 rounded-md ml-2">Send</button>
                    </form>
                </div>
            </footer>
        </div>
    </div>
</div>
