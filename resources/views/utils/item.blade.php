<div
    class="p-4 rounded text-xs md:text-base shadow bg-white grid grid-cols-[1fr_auto_auto] item item-{{ $item->id }} mb-4">
    <a href="/{{ $url }}/{{ $item->id }}"
        class="text-slate-700 text-md h-8 leading-8 align-middle w-fit hover:underline">
        {{ $item->name }}
    </a>
    <a href="/{{ $url }}/{{ $item->id }}/edit"
        class="text-blue-500 hover:bg-blue-50 transition-colors duration-200 h-8 leading-8 align-middle rounded px-2 w-min mr-8">
        EDIT
    </a>
    <form method="post" action="/{{ $url }}/{{ $item->id }}">
        @csrf
        @method('DELETE')
        <button type="submit"
            class="text-red-500 hover:bg-red-50 transition-colors duration-200 h-8 leading-8 align-middle rounded px-2 w-min">
            DELETE
        </button>
    </form>
</div>
