$(document).ready(function() {


    // $(window).on('load', function() {
    //     this.document.getElementById("carregando").style.display = "none";
    // });
    // document.getElementById("corpo").style.display = "block";

    // var intervalo = setInterval(function() {
    //         clearInterval(intervalo);

    //         document.getElementById("carregando").style.display = "none";

    //         document.getElementById("corpo").style.display = "block";
    //     }, 1000

    // );

    function block() {


        $.blockUI({

            message: 'Aguarde...',
            css: {
                border: 'none',
                padding: '15px',
                backgroundColor: '#000',
                '-webkit-border-radius': '10px',
                '-moz-border-radius': '10px',
                opacity: .5,
                color: '#fff',
                'font-size': '16px',
                'font-weight': 'bold'
            }
        });

    }

    block();

    var intervalo = setInterval(function() {
            clearInterval(intervalo);

            //document.getElementById("carregando").style.display = "none";

            document.getElementById("corpo").style.display = "block";
            $.unblockUI();
        }, 1000

    );




});