<div class="relative rounded-lg bg-gray-800">
    @isset($path)<span class="select-none absolute font-bold px-4 pt-1 right-0 text-gray-500 text-sm hidden md:block">{{ e($path) }}</span>@endisset
    @isset($file)
    <span class="select-none absolute font-bold px-4 pt-1 right-0 text-gray-500 text-sm hidden md:block">{{ str_replace('\\', '/', $file) }}</span>
    <pre @isset($lineHighlight) data-line="{{ $lineHighlight }}" @endisset class="scrollbar-none rounded-lg"><code class="scrolling-touch language-{{ $lang ?? 'php' }}">{{ file_get_contents(base_path($file)) }}</code></pre>
    @else
    <pre @isset($lineHighlight) data-line="{{ $lineHighlight }}" @endisset class="scrollbar-none rounded-lg"><code class="scrolling-touch language-{{ $lang ?? 'html' }}">{{ e($slot) }}</code></pre>
    @endisset
</div>
