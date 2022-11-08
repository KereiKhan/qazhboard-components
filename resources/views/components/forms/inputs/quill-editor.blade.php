<div>
    <p class="text-base text-gray-800 dark:text-white mb-2.5">
        {{ $label }}
    </p>
    <textarea class="hidden" name="{{ $name }}" id="{{ $id }}"></textarea>
    <div id="editor"></div>
</div>

<script>
    const hiddenEditor = document.getElementById('{{ $id }}')
    const toolbarOptions = [
        [{ 'font': [] }, 'bold', 'italic', 'underline', 'strike'],        // toggled buttons
        ['blockquote', 'code-block'],

        [{ 'header': 1 }, { 'header': 2 }],               // custom button values
        [{ 'list': 'ordered' }, { 'list': 'bullet' }],
        [{ 'indent': '-1' }, { 'indent': '+1' }],          // outdent/indent

        [{ 'color': [] }, { 'background': [] }],          // dropdown with defaults from theme
        [{ 'align': [] }],
        ['image', 'link'],

        ['clean']
    ];

    const quill = new Quill("#editor", {
        modules: {
            toolbar: toolbarOptions
        },
        theme: "snow",
    });

    @if($value)
        quill.root.innerHTML = '{!! $value !!}'
        hiddenEditor.innerHTML = '{!! $value !!}'
    @endif

    quill.on('text-change', function () {
        hiddenEditor.innerHTML = quill.root.innerHTML
    })

</script>
