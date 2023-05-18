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
            initOrderSupplierSelect();
            initOrderItems();
            initOrderItemPricesParser();
            initOrderPriceVatParser();
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

        function initOrderSupplierSelect() {
            $('.order-supplier-select').change(function () {
                let option = $(this).find('option:selected');
                $('#supplier-name').val( option.data('name') );
                $('#supplier-business-id').val( option.data('business-id') );
                $('#supplier-iban').val( option.data('iban') );
            });
        }

        function initOrderItems() {
            $('#order-items-add').click(function () {
                let copy = $('#order-items-pattern').children().first().clone();
                let order_items = $('#order-items');

                let index = order_items.children().length ? order_items.children().last().data('index') + 1 : 0;

                copy.attr('data-index', index);
                copy.find(`label[for="items[][name]"]`).attr('for', `items[${index}][name]`);
                copy.find(`input[id="items[][name]"]`).attr('name', `items[${index}][name]`).attr('id', `items[${index}][name]`);
                copy.find(`label[for="items[][price]"]`).attr('for', `items[${index}][price]`);
                copy.find(`input[id="items[][price]"]`).attr('name', `items[${index}][price]`).attr('id', `items[${index}][price]`).attr('data-index', index);
                copy.find(`label[for="items[][quantity]"]`).attr('for', `items[${index}][quantity]`);
                copy.find(`input[id="items[][quantity]"]`).attr('name', `items[${index}][quantity]`).attr('id', `items[${index}][quantity]`).attr('data-index', index);
                copy.find(`label[for="items[][full_price]"]`).attr('for', `items[${index}][full_price]`);
                copy.find(`input[id="items[][full_price]"]`).attr('name', `items[${index}][full_price]`).attr('id', `items[${index}][full_price]`);

                order_items.append(copy);
                initOrderItemPricesParser();
            });

            $('#order-items-remove').click(function () {
                let items = $('#order-items').children();

                if (items.length > 1) items.last().remove();
            });
        }

        function initOrderItemPricesParser() {
            $(document).find('.order-item-price-parse').change(function () {
                let index = $(this).data('index');

                let price = $(`input[name="items[${index}][price]"]`).val();
                let quantity = $(`input[name="items[${index}][quantity]"]`).val();

                let full_price = price == "" ? "" : Number(price * quantity).toFixed(2);

                $(`input[name="items[${index}][full_price]"]`).val(full_price);
                calculatePrices();
            });
        }

        function initOrderPriceVatParser() {
            $('.order-prices input[name="has_vat"]').change(calculatePrices);
        }

        function calculatePrices() {
            let prices = $('.order-prices');
            let price = 0;
            $('.order-item-full-price').each( (_,e) => price += Number($(e).val()) );
            prices.find('input[name="price"]').val( Number(price).toFixed(2) );

            let vat_checked = prices.find('input[name="has_vat"]').is(':checked');

            let vat = vat_checked ? Number(price * 0.2).toFixed(2) : '';
            let price_vat = vat_checked ? Number(1 * price + 1 * vat).toFixed(2) : '';

            prices.find('input[name="vat"]').val(vat);
            prices.find('input[name="price_vat"]').val(price_vat);
        }
    </script>

</body>
</html>
