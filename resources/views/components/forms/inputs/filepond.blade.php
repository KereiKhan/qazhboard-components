<div>
  <label for="filepond" class="text-base text-gray-800 dark:text-white">
    {{ $label }}
  </label>
  <input class="mt-2.5" type="file" name="{{ $name }}" id="{{ $id }}">
  <script>
    const inputFile = document.getElementById('{{ $id }}')
    const pond = FilePond.create(inputFile, {
      {{ $is_multiple ? 'allowMultiple: true,' : '' }}
      server: {
        url: '{{ $uploadUrl }}',
        process: {
          headers: {
            "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').getAttribute('content')
          }
        }
      }
    })
  </script>
</div>
