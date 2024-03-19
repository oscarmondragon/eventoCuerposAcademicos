@props(['formAction' => false])

<div>
    @if ($formAction)
        <form wire:submit.prevent="{{ $formAction }}">
    @endif
    <div class="bg-verde">
        <!-- bg-red-300 p-4 sm:px-6 sm:py-4 border-b border-gray-150 -->
        @if (isset($title))
            <h3 class="text-lg leading-6 font-medium text-white pl-6 py-2">
                {{ $title }}
            </h3>
        @endif
    </div>
    <div class="bg-white px-4 sm:p-6">
        <div class="space-y-6">
            {{ $content }}
        </div>
    </div>

    <div class="text-right px-4 pb-5 sm:px-4">
        {{ $buttons }}
    </div>
    @if ($formAction)
        </form>
    @endif
</div>
