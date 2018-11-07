$(document).ready(function () {

    $('#horna-tab-form').submit(function (e) {
        e.preventDefault();

        var zaznamId = $(e.currentTarget).data('zaznam-id');
        var formData = new FormData(e.currentTarget);

        console.log(zaznamId);
        console.log('/form/' + zaznamId);

        $.ajax({
            url: ('/form/' + zaznamId),
            data: formData,
            processData: false,
            contentType: false,
            type: 'POST'
        }).done(function () {
            alert('Nahrate');
        });
    });




    $("[title='DÁTUM']").prop('disabled', false);


    $("[title='DÁTUM']").change(function(event) {
       if ($(this).val() === '-1') {
            return;
        }


        $("[title='LINKA']").prop('disabled', false);
    });

    $("[title='LINKA']").change(function(event) {
        if ($(this).val() === '-1') {
            return;
        }

        $("[title='UEP']").prop('disabled', false);
    });

    $("[title='UEP']").change(function(event) {
        if ($(this).val() === '-1') {
            return;
        }

        $("[title='Zmena']").prop('disabled', false);
    });

    $("[title='Zmena']").change(function(event) {
        if ($(this).val() === '-1') {
            return;
        }

        $("[title='Nadcas']").prop('disabled', false);

      //  ajax

        var mojeData =  {
            den: $('select[name="den"]').val(),
            linka: $('select[name="linka"]').val(),
            zmena: $('select[name="zmena"]').val(),
            uep: $('select[name="uep"]').val(),
            nadcas: $('#nadcas').val()

        };

        console.log(mojeData);


        $.ajax({
            method: "POST",
            url: "/getData",
            data: {data: mojeData}
        })
            .done(function( data ) {
                $('#horna-tab-form').data('zaznam-id', data.zaznamId);

                // vypise do consoli aktualnu hodnotu datoveho parametra formulara horna-tab-form, tj data-zaznam-id
                console.log($('#horna-tab-form').data('zaznam-id'));

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
            });

    });
    location.reload(forceGet)
});






//$("#formular").submit(function(event){
  //  event.preventDefault();

//    var data=$("#formular").serializeArray();
 //   console.log(data);


//});
