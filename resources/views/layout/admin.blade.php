<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ env('APP_NAME') }} | @yield('title')</title>

    <link rel="stylesheet" href="{{ asset('css/admin.min.css') }}">
</head>
<body>

    @include('admin._partials._menu')

    @yield('content')

    @include('admin._partials._delete_confirmation')

    <script src="{{ asset('js/admin.min.js') }}"></script>
    <script type="text/javascript">
        $(function () {
            initConfirmDeleteModal();
        });

        function initConfirmDeleteModal() {
            let modal = $('#confirm-delete-modal');
            var form;

            $('.confirm-delete').click(function () {
                form = $(this).parent();

                modal.find('.entity').html( $(this).data('entity') );
                modal.modal('show');
            });

            $('#confirm-delete-button').click(function () {
                form.submit();
            });
        }
    </script>

</body>
</html>
