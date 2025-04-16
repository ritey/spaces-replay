<div>
    <div class="flex items-center gap-4 mb-4">
        <input type="text" wire:model.debounce.300ms="query" placeholder="Search Spaces..." class="border px-4 py-2 rounded w-full">

        <select wire:model="state" class="border px-4 py-2 rounded">
            <option value="">All States</option>
            <option value="live">Live</option>
            <option value="scheduled">Scheduled</option>
            <option value="ended">Ended</option>
        </select>
    </div>

    <div class="space-y-4">
        @forelse ($spaces as $space)
            <div class="border rounded p-4">
                <h2 class="text-lg font-semibold">{{ $space->title }}</h2>
                <p class="text-sm text-gray-500">State: {{ ucfirst($space->state) }}</p>
            </div>
        @empty
            <p>No spaces found.</p>
        @endforelse
    </div>

    @if (is_object($spaces))
    <div class="mt-6">
        {{ $spaces->links() }}
    </div>
    @endif
</div>
