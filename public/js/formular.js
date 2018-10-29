$(document).ready(function () {


    $("[title='DÁTUM']").prop('disabled', false);

    $("[title='DÁTUM']").change(function(event) {
        $("[title='LINKA']").prop('disabled', false);
    });

    $("[title='LINKA']").click(function(event) {
        $("[title='UEP']").prop('disabled', false);
    });

    $("[title='UEP']").click(function(event) {
        $("[title='Zmena']").prop('disabled', false);
    });

    $("[title='Zmena']").click(function(event) {
        $("[title='Nadcas']").prop('disabled', false);

      //  ajax

       // var mojeData =  { den: "2018-10-28", linka:"MV", zmena:"C",uep:"HC2",nadcas:"55" };

        //     var mojeData =  { den: $('den').val(),linka: $('linka').val(),
         //   zmena: $('zmena').val(),uep: $('uep').val(),nadcas: $('nadcas').val() };

        var mojeData =  { den: $('[name="datum"]').val(),linka: $('[name="linka"]').val(),
            zmena: $('[name="zmena"]').val(),uep: $('[name="uep"]').val(),nadcas: $('nadcas').val() };



        //var mojeData =  { den: $('').val(),linka: $('').val(), zmena: $('').val(),uep: $('').val(),nadcas: $('').val() };

        $.ajax({
            method: "POST",
            url: "/getData",
            data: {data: mojeData}
        })
            .done(function( msg ) {
                $('#nadcas').val(msg.nadcas);
                $('input[name="suma_pracovnikov_monitor"]').val(msg.suma_pracovnikov_m);
                $('input[name="suma_pracovnikov_operator"]').val(msg.suma_pracovnikov_o);
                $('input[name="pn_lekar_monitor"]').val(msg.pn_lekar_m);
                $('input[name="pn_lekar_operator"]').val(msg.pn_lekar_o);
                $('input[name="dovolenka_nv_monitor"]').val(msg.dovolenka_nv_m);
                $('input[name="dovolenka_nv_operator"]').val(msg.dovolenka_nv_o);
                $('input[name="ine_monitor"]').val(msg.ine_m);
                $('input[name="ine_operator"]').val(msg.ine_o);
                $('input[name="skolenie_monitor"]').val(msg.skolenie_m);
                $('input[name="skolenie_operator"]').val(msg.skolenie_o);
                $('input[name="pozicany_monitor"]').val(msg.pozicany_m);
                $('input[name="pozicany_operator"]').val(msg.pozicany_o);
                $('input[name="vypozicany_monitor"]').val(msg.vypozicany_m);
                $('input[name="vypozicany_operator"]').val(msg.vypozicany_o);
                $('input[name="nadcas_2_zmeny_monitor"]').val(msg.nadcas_2_zmeny_m);
                $('input[name="nadcas_2_zmeny_operator"]').val(msg.nadcas_2_zmeny_o);

                $('input[name="zastavenia_text_fab"]').val(msg.zastavenia_text_f);
                $('input[name="zastavenia_int_fab"]').val(msg.zastavenia_int_f);
                $('input[name="udrzba_text"]').val(msg.udrzba_t);
                $('input[name="udrzba_int"]').val(msg.udrzba_i);
                $('input[name="logistika_text"]').val(msg.logistika_t);
                $('input[name="logistika_int"]').val(msg.logistika_i);
                $('input[name="saturacia_text"]').val(msg.saturacia_t);
                $('input[name="saturacia_int"]').val(msg.saturacia_i);
                $('input[name="nedostatok_text"]').val(msg.nedostatok_t);
                $('input[name="nedostatok_int"]').val(msg.nedostatok_i);


            });

    });
    location.reload(forceGet)
});






//$("#formular").submit(function(event){
  //  event.preventDefault();

//    var data=$("#formular").serializeArray();
 //   console.log(data);


//});
