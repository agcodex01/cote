<form action="{{ route($indexRoute) }}" method="GET" class="w-75 d-flex align-items-center">
    <div class="input-group w-50 mr-2">
        <input type="search" class="form-control" placeholder="{{ $placeholder }}" aria-describedby="search" name="search"
            value="{{ Request::query()["search"] ?? "" }}" />
        <div class="input-group-append">
            <button type="submit" class="btn btn-outline-primary"><i class="fa fa-search"></i></button>
        </div>
    </div>
    @if ($hasFilter)
        <button type="button" class="btn btn-outline-primary mr-2" data-toggle="modal" data-target="#filterModal">
            Filter <i class="fa fa-filter"></i></button>
        <a href="{{ route($indexRoute)}}" class="btn btn-outline-danger"> Reser Filter <i class="fa fa-markx"></i></a>
    @endif

</form>
