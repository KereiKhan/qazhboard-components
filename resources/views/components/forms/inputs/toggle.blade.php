<div x-data="{ enabled: {{ $checked ? 'true' : 'false' }} }">
    @if ($title)
        <p class="text-base text-gray-800 dark:text-white mb-2.5">{{ $title }}</p>
    @endif
    <label
        class="relative flex items-center py-2.5 px-5 bg-white border border-gray-300 rounded-md dark:bg-slate-900 dark:border-gray-700"
        for="{{ $id }}">
        <span
            class="flex-1 min-w-0 text-sm font-medium text-gray-400 w-full hover:cursor-pointer">{{ $label }}</span>
        <button type="button" :class="enabled ? 'bg-emerald-400' : 'bg-gray-200'"
            class="relative inline-flex flex-shrink-0 h-6 w-11 border-2 border-transparent rounded-full cursor-pointer transition-colors ease-in-out duration-200 focus:outline-none"
            role="switch" aria-checked="false">
            <span class="sr-only">Use setting</span>
            <!-- Enabled: "translate-x-5", Not Enabled: "translate-x-0" -->
            <span aria-hidden="true" :class="enabled ? 'translate-x-5' : 'translate-x-0'"
                class="pointer-events-none inline-block h-5 w-5 rounded-full bg-white shadow transform ring-0 transition ease-in-out duration-200"></span>
        </button>
    </label>
    <input type="checkbox" name="{{ $name }}" class="hidden" id="{{ $id }}" x-model="enabled">
</div>
