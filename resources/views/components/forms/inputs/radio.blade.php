<div>
    <label class="text-base font-medium text-gray-900">{{ $label }}</label>
    @if(!is_null($description))
        <p class="text-sm leading-5 text-gray-500">{{ $description }}</p>
    @endif
    <fieldset class="mt-4">
        <div class="space-y-4">
            @foreach($items as $item)
                <div class="flex items-center">
                    <input id="{{ $id }}[{{ $item['title'] }}]" name="{{ $name }}" type="radio" @if (key_exists('checked', $item) && $item['checked']) checked @endif
                           class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300">
                    <label for="{{ $id }}[{{ $item['title'] }}]" class="ml-3 block text-sm font-medium text-gray-700"> {{ $item['title'] }} </label>
                </div>
            @endforeach
        </div>
    </fieldset>
</div>
