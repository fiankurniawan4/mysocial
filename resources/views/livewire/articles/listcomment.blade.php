<div class="flex flex-col gap-4">
    @foreach ($comments as $item)
    <div class="flex flex-col">
        <div class="flex flex-row gap-4">
            <h1 class="text-lg font-medium">{{ $item->user->name }}</h1>
            <p class="text-lg font-medium">({{ $item->created_at->diffForHumans() }})</p>
        </div>
        <p class="text-md">{{ $item->comment }}</p>
        <div class="flex flex-row gap-2 mt-2">
            <button class="btn btn-warning">Edit</button>
            <button class="btn btn-error">Delete</button>
        </div>
    </div>
    <hr class="bg-gray-400">
    @endforeach
</div>
