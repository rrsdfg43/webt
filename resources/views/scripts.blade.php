{{-- JS --}}
<script>
    var o = @json($capitulos->tiempoL + $capitulos->tiempoLS);
    var n = @json($capitulos->tiempoO + $capitulos->tiempoOS);
    var s = @json($capitulos->tiempoN + $capitulos->tiempoNS);
    var sig2 = @json($animes->url.'-'.$capitulos->capituloN + 1);
    var m = @json($animes->capitulosM);
    var c = @json($capitulos->capituloN);
    var v = document.getElementById('player');

    function sigcap() {
        location.href = sig2;
        
    };

    function acireiniciar() {
            v.play();
            v.currentTime=(n);
};
</script>
<script src="https://cdn.plyr.io/3.6.12/plyr.js"></script>