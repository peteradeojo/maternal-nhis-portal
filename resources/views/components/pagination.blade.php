{{-- @dd($paginator) --}}
<p>Showing {{ $paginator->count() }} of {{ $paginator->total() }} items</p>
<div class="row">
    @foreach ($paginator->linkCollection()->toArray() as $l)
        <a @if ($l['url']) href="{{ $l['url'] }}" @endif
            class="btn @if ($l['active']) bg-theme @endif ">{!! $l['label'] !!}</a>
    @endforeach
</div>
