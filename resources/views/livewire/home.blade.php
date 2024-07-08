<div>
    @foreach ($articles as $item)
        <div class="m-6">
            <a href="/articles/{{ $item->slug }}" class="text-2xl font-bold hover:underline">{{ $item->title }}</a>
            <div class="">
                <span class="text-gray-600">By: <a href="#" class="text-blue-500 hover:underline">{{ $item->user->name }}</a></span>
                <span class="text-gray-600"> - {{ $item->created_at->diffForHumans() }}</span>
            </div>
            <p class="text-gray-600">{{ $item->description }}</p>
        </div>
        <hr>
    @endforeach
</div>
