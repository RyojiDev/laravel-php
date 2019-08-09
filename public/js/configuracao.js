$(document).ready(function() {


    // $(window).on('load', function() {
    //     this.document.getElementById("carregando").style.display = "none";
    // });
    // document.getElementById("corpo").style.display = "block";

    var intervalo = setInterval(function() {
            clearInterval(intervalo);

            document.getElementById("carregando").style.display = "none";

            document.getElementById("corpo").style.display = "block";
        }, 1000

    );



});