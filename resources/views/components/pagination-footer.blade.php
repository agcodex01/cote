@if (!$collection->isEmpty())
    <div class="d-flex justify-content-between align-items-center">
        Showing {{ $collection->firstItem() }} to {{ $collection->lastItem() }} of total {{ $collection->total() }}
        entries
        {{ $collection->appends(request()->query())->onEachSide(1)->links("pagination::bootstrap-4") }}
    </div>
@endif
