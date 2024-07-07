<div>
    <livewire:articles.create :articles="$articles" wire:key='{{ $articles->id }}'/>
    <div class="m-4">
        <livewire:articles.listcomment :articles="$articles" wire:key='{{ $articles->id }}'/>
    </div>
</div>
