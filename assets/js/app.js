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
        }

        let hodinovka = parseFloat($('#ro').data('hodinova-produkcia'));
        let cielRo = parseFloat($('#ro').data('ro-ciel'));
        let maxVyroba = $('#max-vyroba');
        let planVyroby = $('#ciel-vyroba');

        let maxVyroby = Math.floor((7.5 + (nadcas / 60)) * hodinovka);

        maxVyroba.val(maxVyroby);
        planVyroby.val(Math.floor(maxVyroby * cielRo));

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
        })
            .then((data) => {
                let form = $('#horna-tab-form');
                form.data('zaznam-id', data.id);

                $.each(data, function (key, value) {
                    let ctrl = $(`input[name='${key}'], textarea[name='${key}']`, form);

                    if (ctrl.length !== 0) {
                        ctrl.val(value);
                    }
                });

                $('#moduly-monitora-text').text(`[${data.uep.pocet_modulov_monitor}]`);
            })
            .then(() => {
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
                        let maxVyroby = Math.floor((7.5 + (nadcas / 60)) * data['ciel_hodinova_vyroba']);
                        let cielVyroby = Math.floor(maxVyroby * data['ciel_ro']);
                        let vyrobenych = parseInt($('#pocet-vyrobenych').val());

                        $('#max-vyroba').val(maxVyroby);
                        $('#ciel-vyroba').val(cielVyroby);

                        rozdielPlanVyroba.text('Neznáme: ' + (maxVyroby - cielVyroby));
                        if ((vyrobenych - maxVyroby) < 0) {
                            rozdielPlanVyroba.css({color: 'red'});
                        } else {
                            rozdielPlanVyroba.css({color: 'white'});
                        }

                        calcRo();
                    })
                    .fail(() => {
                        swal({
                            type: 'error',
                            title: 'Chyba pri sťahovaní cieľov!'
                        });
                    });
            })
            .fail(() => {
                swal({
                    type: 'error',
                    title: 'Chyba pri sťahovaní záznamu!'
                });
            });
    }

    function calcRo() {
        let roCard = $('#ro');
        let roVal = $('#roVal');
        let efektivitaVal = $('#efektivitaVal');
        let nonRoVal = $('#nonRoVal');
        let rozdielPlanVyroba = $('#rozdiel-plan-vyroba');
        let maxVyroba = parseInt($('#max-vyroba').val());
        let vyrobenych = parseInt($('#pocet-vyrobenych').val());

        if (isNaN(vyrobenych) || isNaN(maxVyroba)) {
            return;
        }

        let ro = vyrobenych / maxVyroba;
        let roCiel = parseFloat(roCard.data('ro-ciel'));
        let roPerc = (ro * 100).toFixed(1);

        roVal.text(`${roPerc} %`);
        nonRoVal.text(`${(100 - parseFloat(roPerc)).toFixed(1)} %`);

        let vsetkyStraty = 0;
        $.each($('input.ro-calc-data'), (i, elem) => {
            if ($(elem).attr('name') === 'pocet_zastaveni') {
                vsetkyStraty += Math.round(parseInt($(elem).val()) * 0.05);
            } else {
                vsetkyStraty += parseInt($(elem).val());
            }
        });


        let rozdiel = (vyrobenych - maxVyroba) + vsetkyStraty;
        rozdielPlanVyroba.text('Neznáme: ' + rozdiel);

        if (rozdiel < 0) {
            rozdielPlanVyroba.css({color: 'red'});
        } else {
            rozdielPlanVyroba.css({color: 'black'});
        }


        let hodinovka = parseFloat($('#ro').data('hodinova-produkcia'));
        let autaZaSekundu = hodinovka / 3600;

        let strataNaZastavenia = Math.round((parseInt($('#pocet-zastaveni').val()) * 3) * autaZaSekundu); // 3s == 0.05
        let straty = parseInt($('#strata-logistika').val()) + parseInt($('#strata-saturacia').val())
            + parseInt($('#strata-nedostatok').val()) + strataNaZastavenia;

        let efektivita = vyrobenych / (maxVyroba - straty);
        let efektivitaPerc = (efektivita * 100).toFixed(1);
        let efektivitaCiel = parseFloat(roCard.data('efektivita-ciel'));

        efektivitaVal.text(`${efektivitaPerc} %`);

        let cssObj = {color: 'white'};
        if (ro < roCiel) {
            cssObj.color = 'red';
        }

        roVal.css(cssObj);
        nonRoVal.css(cssObj);

        if (efektivita < efektivitaCiel) {
            efektivitaVal.css({color: 'red'});
        } else {
            efektivitaVal.css({color: 'white'});
        }
    }
});
