<!DOCTYPE html>
<html lang="en">

<head>
    @include('backend.layouts.partials.styles')
</head>

<body>
    <div id="app">
        <div class="main-wrapper">
            <div class="navbar-bg"></div>
            @include('backend.layouts.partials.navbar')
            @include('backend.layouts.partials.sidebar')
            <div class="main-content">
                <section class="section">
                    @include('backend.layouts.partials.breadcrumbs')
                    @if (session()->has('error') || session()->has('success'))
                    <div class="container-fluid">
                        @if (session()->has('error'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <strong>Error ! </strong> {{ session()->get('error') }}
                            <button class="btn-close" type="button" data-bs-dismiss="alert"
                                aria-label="Close"></button>
                        </div>
                        @endif
                        @if (session()->has('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong>Yeay ! </strong> {{ session()->get('success') }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        @endif
                    </div>
                    @endif
                    <div class="section-body">
                        @yield('content')
                    </div>
                </section>
            </div>
            @stack('modal')
            @include('backend.layouts.partials.footer')
        </div>
    </div>
    @include('backend.layouts.partials.scripts')
</body>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
<script src="https://cdn.tiny.cloud/1/rxyaslriupalkalxec450lhe8spf5gqkmaj3f67twh1vmxeu/tinymce/7/tinymce.min.js" referrerpolicy="origin"></script>
<script>
    tinymce.init({
        selector: 'textarea#editor', // Pastikan selector ini sesuai
        //plugins: 'anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount checklist casechange export formatpainter pageembed a11ychecker tinymcespellchecker permanentpen powerpaste advtable advcode editimage advtemplate',
        plugins: 'lists table code wordcount',
        toolbar: 'undo redo | blocks | bold italic | alignleft aligncenter alignright | alignjustify | indent outdent | bullist numlist | code | table',
        paste_as_text: true, // Memastikan teks dipaste sebagai teks polos
        paste_remove_styles_if_webkit: true, // Bersihkan format di browser Webkit (Chrome, Safari)
        paste_strip_class_attributes: 'all', // Hilangkan atribut class dari teks yang dipaste
        height: 350, // Atur tinggi editor
        setup: function(editor) {
            editor.on('init', function() {
                console.log("TinyMCE initialized!"); // Log untuk memastikan TinyMCE diinisialisasi
            });
            editor.on('PastePreProcess', function(e) {
                // Membersihkan format tidak diinginkan saat paste
                e.content = e.content.replace(/<[^>]+>/g, ''); // Hilangkan tag HTML yang tidak diperlukan
            });
        }
    });
</script>

</html>