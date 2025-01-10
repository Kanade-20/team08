@if ($paginator->hasPages())
    <div class="pagination">
        {{-- 頁碼按鈕 --}}
        @if ($paginator->onFirstPage())
            <span class="page-button disabled">上一頁</span>
        @else
            <a class="page-button" href="{{ $paginator->previousPageUrl() }}">上一頁</a>
        @endif

        {{-- 顯示頁碼 --}}
        @foreach ($paginator->getUrlRange(1, $paginator->lastPage()) as $page => $url)
            <a class="page-button" href="{{ $url }}">{{ $page }}</a>
        @endforeach

        {{-- 下一頁按鈕 --}}
        @if ($paginator->hasMorePages())
            <a class="page-button" href="{{ $paginator->nextPageUrl() }}">下一頁</a>
        @else
            <span class="page-button disabled">下一頁</span>
        @endif
    </div>
@endif
