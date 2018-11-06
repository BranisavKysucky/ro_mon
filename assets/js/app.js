'use strict';

$(() => {
    $('select.selectpicker').selectpicker();

    $('select.search-control').change((e) => {
        let jElem = $(e.currentTarget);

        if (jElem.val() === '-1') {
            return;
        }

        switch (jElem.attr('name')) {
            case 'den':
                $('select[name="linka_uep"]').prop('disabled', false);
                break;
            case 'uep':
                $('select[name="zmena"]').prop('disabled', false);
                break;
            case 'zmena':
                $('#nadcas').prop('disabled', false);
                getData();
                getCiele();
                break;
            default:
                break;
        }

        $('.selectpicker').selectpicker('refresh');
    });

    $('form input').keydown((e) => {
        if (e.keyCode == 13) {
            e.preventDefault();
            return false;
        }
    });

    $('form input').click((e) => {
        let jElem = $(e.currentTarget);

        jElem.select();
    });

    $('#horna-tab-form').submit(function (e) {
        e.preventDefault();

        let zaznamId = $(e.currentTarget).data('zaznam-id');
        let formData = new FormData(e.currentTarget);

        $.ajax({
            url: ('/zaznamy/' + zaznamId),
            data: formData,
            processData: false,
            contentType: false,
            type: 'POST'
        }).done(function () {
            swal({
                type: 'success',
                title: 'Záznam sa uložil!'
            });
        }).fail(() => {
            swal({
                type: 'error',
                title: 'Záznam sa neuložil!'
            });
        });
    });


    function getData() {
        let uepId = $('select[name="uep"]').val();

        $.get('/zaznamy', {
            den: $('select[name="den"]').val(),
            uep: uepId,
            zmena: $('select[name="zmena"]').val()
        }).then((data) => {
            let form = $('#horna-tab-form');
            form.data('zaznam-id', data.id);

            $.each(data, function (key, value) {
                let ctrl = $('input[name=' + key + ']', form);

                if (ctrl !== undefined) {
                    ctrl.val(value);
                }
            });
        }).fail(() => {
            swal({
                type: 'error',
                title: 'Chyba pri sťahovaní záznamu!'
            });
        });
    }

    function getCiele() {
        let uepId = $('select[name="uep"]').val();

        $.get(`/ciel/${uepId}`)
            .then((data) => {
                let roCard = $('#ro');

                roCard.data('ro-ciel', data['ciel_ro']);
                roCard.data('efektivita-ciel', data['ciel_efektivita']);

                $('#teoreticka-vyroba').val(data['ciel_teoreticka_vyroba']);
            })
            .fail(() => {
                swal({
                    type: 'error',
                    title: 'Chyba pri sťahovaní cieľov!'
                });
            });
    }
});
