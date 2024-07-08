//variable

var sig = 100000;

var v = document.getElementById('player');

if(v){  
    v.ontimeupdate = function(){
        if (v.currentTime < (o)) {
            $("#reiniciar").css('opacity','0');
            $("#reiniciar").css('visibility','hidden');
        };
        if (v.currentTime < (n)){
            if(v.currentTime > (o)){
                $("#reiniciar").css('opacity','1');
                $("#reiniciar").css('visibility','visible');
            };
        };  
        if(v.currentTime > (n)){
            $("#reiniciar").css('opacity','0');
            $("#reiniciar").css('visibility','hidden');
        };
        
        if(v.currentTime < (s - 5)){
            $("#sigcapi").css('opacity','0');
            $("#sigcapi").css('visibility','hidden');
        };
        if(c < m){
            if(v.currentTime > (s - 5)){
                $("#sigcapi").css('opacity','1');
                $("#sigcapi").css('visibility','visible');
            };
        };
        $("#spinner").css('display','none');
    };
};