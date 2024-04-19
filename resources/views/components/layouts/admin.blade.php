<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>

        <meta name="csrf-token" content="{{ csrf_token() }}">

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
        <script src="{{url('/sweetalert2-11.10.1')}}/dist/sweetalert2.all.min.js"></script>
        <link href="{{url('/sweetalert2-11.10.1')}}/dist/sweetalert2.min.css" rel="stylesheet">
     

        <!-- Styles -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <meta name="description" content="Responsive HTML Admin Dashboard Template based on Bootstrap 5">
        <meta name="author" content="NobleUI">
        <meta name="keywords" content="nobleui, bootstrap, bootstrap 5, bootstrap5, admin, dashboard, template, responsive, css, sass, html, theme, front-end, ui kit, web">

	    <title>Admin- UPRESS</title>

        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="../assets/vendors/core/core.css">
        <link rel="stylesheet" href="../assets/vendors/flatpickr/flatpickr.min.css">
        <link rel="stylesheet" href="../assets/fonts/feather-font/css/iconfont.css">
        <link rel="stylesheet" href="../assets/vendors/flag-icon-css/css/flag-icon.min.css">
        <link rel="stylesheet" href="../assets/css/demo2/style.css">
        <link rel="shortcut icon" href="../assets/logo/upress-logo.png" />

        <script src="../assets/vendors/core/core.js"></script>
        <script src="../assets/vendors/flatpickr/flatpickr.min.js"></script>
        <script src="../assets/vendors/apexcharts/apexcharts.min.js"></script>
        <script src="../assets/vendors/feather-icons/feather.min.js"></script>
        <script src="../assets/js/template.js"></script>

    </head>
    <body>
        <div class="main-wrapper">
            @livewire('components.admin-sidebar.admin-sidebar')
            <div class="page-wrapper">
                @livewire('components.admin-header.admin-header')
                {{ $slot }}
            </div>
        </div>
        <script>
            window.addEventListener('refresh-page', event => {
                window.location.reload(false); 
            })
            window.addEventListener('swal:message', event => {
                Swal.fire({
                    position: event.detail.position,
                    icon: event.detail.icon,
                    title: event.detail.title,
                    text: event.detail.text,
                    showConfirmButton: false,
                    timer: event.detail.timer,
                    timerProgressBar: true,
                    allowOutsideClick: false,
                    allowEscapeKey: false
                })
            });

            window.addEventListener('swal:redirect', event => {
                Swal.fire({
                        position: event.detail.position,
                        icon: event.detail.icon,
                        title: event.detail.title,
                        text: event.detail.text,
                        showConfirmButton: false,
                        timer: event.detail.timer,
                        timerProgressBar: true,
                        allowOutsideClick: false,
                        allowEscapeKey: false
                        })
                    .then(function() {
                        window.location.href = `${event.detail.link}`
                    });
            });

            window.addEventListener('swal:confirm', event => {
                Swal.fire({
                        position: event.detail.position,
                        icon: event.detail.icon,
                        title: event.detail.title,
                        text: event.detail.text,
                        showConfirmButton: true,
                        })
                    .then(function() {
                        window.location.href = `${event.detail.link}`
                    });
            });

            window.addEventListener('swal:accessrole', event => {
                Swal.fire({
                    position: event.detail.position,
                    icon: event.detail.icon,
                    title: event.detail.title,
                    html: event.detail.html,
                    timer: event.detail.timer
                })
            });

            window.addEventListener('swal:redirect-link', event => {
                Swal.fire({
                        position: event.detail.position,
                        icon: event.detail.icon,
                        title: event.detail.title,
                        html: event.detail.html,
                        timer: event.detail.timer
                    })
                    .then(function() {
                        window.location.href = `${event.detail.link}`
                    });
            });

            window.addEventListener('swal:refresh', event => {
                Swal.fire({
                        position: event.detail.position,
                        icon: event.detail.icon,
                        title: event.detail.title,
                        text: event.detail.text,
                        showConfirmButton: false,
                        timer: event.detail.timer,
                        timerProgressBar: true,
                        allowOutsideClick: false,
                        allowEscapeKey: false
                    })
                    .then(function() {
                        location.reload();
                    });
            });


            window.addEventListener('swal:confirmation', event => {
                Swal.fire({
                    position: event.detail.position,
                    icon: event.detail.icon,
                    title: event.detail.title,
                    text: event.detail.text,
                    showDenyButton: event.detail.showDenyButton,
                    showCancelButton: event.detail.showCancelButton,
                    confirmButtonText: event.detail.confirmButtonText,
                    denyButtonText: event.detail.denyButtonText
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.livewire.emit('confirm');
                    } else if (result.isDenied) {
                        Swal.fire(event.detail.fail_message);
                    }
                })
            });

            window.addEventListener('swal:close-current-tab', event => {
                Swal.fire({
                    position: event.detail.position,
                    icon: event.detail.icon,
                    title: event.detail.title,
                    timer: event.detail.timer
                }).then(function() {
                    window.close();
                });
            });
            window.addEventListener('openModal', function(modal_id){
                $('#'+modal_id.detail).click();
            }); 
            window.addEventListener('closeModal', function(modal_id){
                $('#'+modal_id.detail).click();
            }); 
        </script>
    </body>
</html>
