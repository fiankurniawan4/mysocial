<div>
    <div class="">
        <livewire:articles.create :articles="$articles" wire:key='{{ $articles->id }}'/>
    </div>
    <div class="m-4">
        <livewire:articles.listcomment :articles="$articles"/>
    </div>
</div>
