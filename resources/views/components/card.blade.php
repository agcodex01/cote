<div class="card">
    <div class="card-header pt-3  bg-white font-weight-bold text-primary">

        {{ $header }}

    </div>
    <div class="card-body">
        {{ $body ?? $slot }}
    </div>

</div>
