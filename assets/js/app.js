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
                $('select[name="linka"]').prop('disabled', false);
                break;
            case 'linka':
                $('select[name="uep"]').prop('disabled', false);
                break;
            case 'uep':
                $('select[name="zmena"]').prop('disabled', false);
                break;
            case 'zmena':
                $('input[name="nadcas"]').prop('disabled', false);
                getData();
                break;
            default:
                break;
        }

        $('.selectpicker').selectpicker('refresh');
    });

    $('#horna-tab-form').submit(function (e) {
        e.preventDefault();

        var zaznamId = $(e.currentTarget).data('zaznam-id');
        var formData = new FormData(e.currentTarget);

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
        $.get('/zaznamy', {
            den: $('select[name="den"]').val(),
            linka: $('select[name="linka"]').val(),
            zmena: $('select[name="zmena"]').val(),
            uep: $('select[name="uep"]').val()
        }).then((data) => {
            $('#horna-tab-form').data('zaznam-id', data.zaznamId);

            $('#nadcas').val(data.zaznamData.nadcas);
            $('input[name="suma_pracovnikov_monitor"]').val(data.zaznamData.suma_pracovnikov_m);
            $('input[name="suma_pracovnikov_operator"]').val(data.zaznamData.suma_pracovnikov_o);
            $('input[name="pn_lekar_monitor"]').val(data.zaznamData.pn_lekar_m);
            $('input[name="pn_lekar_operator"]').val(data.zaznamData.pn_lekar_o);
            $('input[name="dovolenka_nv_monitor"]').val(data.zaznamData.dovolenka_nv_m);
            $('input[name="dovolenka_nv_operator"]').val(data.zaznamData.dovolenka_nv_o);
            $('input[name="ine_monitor"]').val(data.zaznamData.ine_m);
            $('input[name="ine_operator"]').val(data.zaznamData.ine_o);
            $('input[name="skolenie_monitor"]').val(data.zaznamData.skolenie_m);
            $('input[name="skolenie_operator"]').val(data.zaznamData.skolenie_o);
            $('input[name="pozicany_monitor"]').val(data.zaznamData.pozicany_m);
            $('input[name="pozicany_operator"]').val(data.zaznamData.pozicany_o);
            $('input[name="vypozicany_monitor"]').val(data.zaznamData.vypozicany_m);
            $('input[name="vypozicany_operator"]').val(data.zaznamData.vypozicany_o);
            $('input[name="nadcas_2_zmeny_monitor"]').val(data.zaznamData.nadcas_2_zmeny_m);
            $('input[name="nadcas_2_zmeny_operator"]').val(data.zaznamData.nadcas_2_zmeny_o);
            $('input[name="zastavenia_text_fab"]').val(data.zaznamData.zastavenia_text_f);
            $('input[name="zastavenia_int_fab"]').val(data.zaznamData.zastavenia_int_f);
            $('input[name="udrzba_text"]').val(data.zaznamData.udrzba_t);
            $('input[name="udrzba_int"]').val(data.zaznamData.udrzba_i);
            $('input[name="logistika_text"]').val(data.zaznamData.logistika_t);
            $('input[name="logistika_int"]').val(data.zaznamData.logistika_i);
            $('input[name="saturacia_text"]').val(data.zaznamData.saturacia_t);
            $('input[name="saturacia_int"]').val(data.zaznamData.saturacia_i);
            $('input[name="nedostatok_text"]').val(data.zaznamData.nedostatok_t);
            $('input[name="nedostatok_int"]').val(data.zaznamData.nedostatok_i);
        }).fail(() => {
            swal({
                type: 'error',
                title: 'Chyba pri sťahovaní záznamu!'
            });
        });
    }
});
