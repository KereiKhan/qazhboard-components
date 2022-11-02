<div>
    <div class="flex flex-row-reverse bg-white rounded-md">
        <input
            class="flex-1 px-4 rounded-r-md peer focus:outline-none focus:border-emerald-400 border-y border-r border-gray-300 text-gray-900 dark:bg-slate-900 dark:border-gray-700 dark:focus:border-emerald-400 dark:text-white"
            type="{{ $type }}" name="{{ $name }}" id="{{ $id }}" />
        <label
            class="py-2 px-4 rounded-l-md peer-focus:border-emerald-400 peer-focus:text-emerald-400 text-gray-400 border border-gray-300 dark:bg-slate-900 dark:border-gray-700"
            for="{{ $id }}">
            {{ $label }}
        </label>
    </div>
</div>
