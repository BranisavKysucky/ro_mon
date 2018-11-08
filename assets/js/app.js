'use strict';

$(() => {
    $('[data-toggle="tooltip"]').tooltip();
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
                $('.data-in-control').prop('disabled', false);
                break;
            default:
                break;
        }

        if ($('select[name="linka_uep"]').val() !== '-1' && $('select[name="zmena"]').val() !== '-1') {
            getData();
            getCiele();
        }

        $('.selectpicker').selectpicker('refresh');
    });

    $('.ro-calc-control').keyup(() => {
        calcRo();
    });

    $('#nadcas').keyup((e) => {
        let nadcas = 0;
        let jElem = $(e.currentTarget);
        if (jElem.val().length !== 0) {
            nadcas = parseInt(jElem.val());
        } else {
            jElem.val(0);
        }

        let hodinovka = parseFloat($('#ro').data('hodinova-produkcia'));
        let cielRo = parseFloat($('#ro').data('ro-ciel'));
        let maxVyroba = $('#max-vyroba');
        let planVyroby = $('#ciel-vyroba');

        let maxVyroby = Math.round((7.5 + (nadcas / 60)) * hodinovka);

        maxVyroba.val(maxVyroby);
        planVyroby.val(Math.round(maxVyroby * cielRo));

        calcRo();
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

        $.get(`/ueps/${uepId}/ciel`)
            .then((data) => {
                let roCard = $('#ro');
                let rozdielPlanVyroba = $('#rozdiel-plan-vyroba');

                roCard.data('hodinova-produkcia', data['ciel_hodinova_vyroba']);
                roCard.data('ro-ciel', data['ciel_ro']);
                roCard.data('efektivita-ciel', data['ciel_efektivita']);

                let nadcas = parseInt($('#nadcas').val());
                // 7.5 = 7h 30min vyroby
                let maxVyroby = Math.round((7.5 + (nadcas / 60)) * data['ciel_hodinova_vyroba']);
                let cielVyroby = Math.floor(maxVyroby * data['ciel_ro']);
                let vyrobenych = parseInt($('#pocet-vyrobenych').val());

                $('#max-vyroba').val(maxVyroby);
                $('#ciel-vyroba').val(cielVyroby);

                rozdielPlanVyroba.text(vyrobenych - cielVyroby);
                if ((vyrobenych - cielVyroby) < 0) {
                    rozdielPlanVyroba.css({color: 'red'});
                } else {
                    rozdielPlanVyroba.css({color: 'white'});
                }
            })
            .fail(() => {
                swal({
                    type: 'error',
                    title: 'Chyba pri sťahovaní cieľov!'
                });
            });
    }

    function calcRo() {
        let roCard = $('#ro');
        let roVal = $('#roVal');
        let nonRoVal = $('#nonRoVal');
        let cielVyroba = $('#ciel-vyroba');
        let rozdielPlanVyroba = $('#rozdiel-plan-vyroba');
        let maxVyroba = parseInt($('#max-vyroba').val());
        let vyrobenych = parseInt($('#pocet-vyrobenych').val());

        if (isNaN(vyrobenych) || isNaN(maxVyroba)) {
            return;
        }

        let ro = vyrobenych / maxVyroba;
        let roCiel = parseFloat(roCard.data('ro-ciel'));
        let roPerc = Math.round(ro * 100);

        roVal.text(roPerc + ' %');
        nonRoVal.text((100 - roPerc) + ' %');
        rozdielPlanVyroba.text(vyrobenych - parseInt(cielVyroba.val()));

        rozdielPlanVyroba.css({color: 'black'});
        let cssObj = {color: 'white'};
        if (ro < roCiel) {
            cssObj.color = 'red';
            rozdielPlanVyroba.css({color: 'red'});
        }

        roVal.css(cssObj);
        nonRoVal.css(cssObj);
    }
});
