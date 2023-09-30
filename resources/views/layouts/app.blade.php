<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script src="https://kit.fontawesome.com/8ef4a8399d.js" crossorigin="anonymous"></script>
    {{-- tinyMCE ReachTexe --}}
    <script src="https://cdn.tiny.cloud/1/ts2n2z1jjcpjehb6x88oyn1481w4soeo7jr8cgluhu59qlup/tinymce/5/tinymce.min.js"
        referrerpolicy="origin"></script>
<style>
    .mce-toc {
  border: 1px solid gray;
}

.mce-toc h2 {
  margin: 4px;
}

.mce-toc li {
  list-style-type: none;
}
</style>
    <script type="text/javascript">
        tinymce.init({
            selector: '#refrence',
            width: 575,
            height: 160,
            plugins: [
                'link'
            ],
            menubar: 'insert format',

        });

        tinymce.init({
            selector: '#content',
            width: 575,
            height: 300,
            plugins: 'image',
            image_title: true,
            /* enable automatic uploads of images represented by blob or data URIs*/
            automatic_uploads: true,
            /*
              URL of our upload handler (for more details check: https://www.tiny.cloud/docs/configure/file-image-upload/#images_upload_url)
              images_upload_url: 'postAcceptor.php',
              here we add custom filepicker only to Image dialog
            */
            images_upload_url: '/upload-image',
            file_picker_types: 'image',

            /* and here's our custom image picker*/
            file_picker_callback: (cb, value, meta) => {
                const input = document.createElement('input');
                input.setAttribute('type', 'file');
                input.setAttribute('accept', 'image/*');

                input.onchange = function() {
                    var file= this.files[0];

                    var reader = new FileReader();
                    reader.readAsDataURL(file);
                    reader.onload= function ()  {
                        var id = 'blobid' + (new Date()).getTime();
                        var blobCache = tinymce.activeEditor.editorUpload.blobCache;
                        var base64 = reader.result.split(',')[1];
                        var blobInfo = blobCache.create(id, file, base64);
                        blobCache.add(blobInfo);

                        /* call the callback and populate the Title field with the file name */
                        cb(blobInfo.blobUri(), {
                            title: file.name
                        });
                    };
                };

            input.click();
        },

        style_formats: [{
                title: 'Heading',
                block: 'h2'
            },
            {
                title: 'Subheading',
                block: 'h4'
            },
            {
                title: 'Paragraph',
                block: 'p'
            },

        ],
        plugins: [
            'advlist autolink link image lists toc charmap print preview hr anchor pagebreak',
            'searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime nonbreaking',
            'table emoticons template paste help',

        ],
        toolbar: 'toc |undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | ' +
        'bullist numlist outdent indent | link image fullscreen | print preview ' +
        'forecolor backcolor emoticons | help |tocbutton ',
        menu: {
            favs: {
                title: 'My Favorites',
                items: 'code visualaid | searchreplace | emoticons'
            }
        },
        menubar: 'favs file edit view insert format tools table help',


        });




    </script>
</head>

<body class="font-sans antialiased">
    <div class="min-h-screen bg-gray-100">
        @include('layouts.navigation')

        <!-- Page Heading -->
        @if (isset($header))
            <header class="bg-white shadow">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    {{ $header }}
                </div>
            </header>
        @endif
        <!-- Page Content -->
        <main>
            {{ $slot }}
        </main>
    </div>
</body>
</html>
