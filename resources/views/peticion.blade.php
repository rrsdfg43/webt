@extends('layout')

@section('title', 'peticiones | Anikawa')

@section('content')

<h1>sadas</h1>
<div class="container">
    <div class="row">
        <div class="col-12">
            <form action="#" class="subscribe">
                <h4 class="subscribe__title">Peticiones</h4>
                <p class="subscribe__text">En esta pagina podras sugerir animes que te gustan o quieres ver para que los agregemos</p>
                <button type="button" class="sign__btn"><i class="fa-brands fa-discord"></i></button>
            </form>
        </div>
    </div>
    <div id="disqus_thread"></div>
<script>
/**
*  RECOMMENDED CONFIGURATION VARIABLES: EDIT AND UNCOMMENT THE SECTION BELOW TO INSERT DYNAMIC VALUES FROM YOUR PLATFORM OR CMS.
*  LEARN WHY DEFINING THESE VARIABLES IS IMPORTANT: https://disqus.com/admin/universalcode/#configuration-variables    */
/*
var disqus_config = function () {
this.page.url = PAGE_URL;  // Replace PAGE_URL with your page's canonical URL variable
this.page.identifier = PAGE_IDENTIFIER; // Replace PAGE_IDENTIFIER with your page's unique identifier variable
};
*/
(function() { // DON'T EDIT BELOW THIS LINE
var d = document, s = d.createElement('script');
s.src = 'https://anikawa.disqus.com/embed.js';
s.setAttribute('data-timestamp', +new Date());
(d.head || d.body).appendChild(s);
})();
</script>
<noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>
                    </div>
</div>