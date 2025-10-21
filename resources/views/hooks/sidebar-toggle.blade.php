<div x-data class="rounded-md bg-gray-100 p-1 dark:bg-gray-700">
    <x-filament::icon-button
        icon="lucide-panel-left"
        icon-size="md"
        color="white"
        @click="$store.sidebar.isOpen = !$store.sidebar.isOpen"
    ></x-filament::icon-button>
</div>

