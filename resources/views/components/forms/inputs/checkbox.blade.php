<div>
    @if ($title)
        <p class="text-base text-gray-800 dark:text-white mb-2.5">{{ $title }}</p>
    @endif
    <div
        class="relative flex items-center py-2.5 px-5 bg-white border border-gray-300 rounded-md dark:bg-slate-900 dark:border-gray-700">
        <label for="{{ $id }}"
            class="flex-1 min-w-0 text-sm font-medium text-gray-400 w-full hover:cursor-pointer">
            {{ $label }}
        </label>
        <div class="ml-3 flex items-center h-5">
            <input id="{{ $id }}" name="{{ $name }}" type="checkbox" @checked($checked)
                class="focus:ring-emerald-400 h-4 w-4 text-emerald-400 border-gray-300 rounded" />
        </div>
    </div>
</div>
