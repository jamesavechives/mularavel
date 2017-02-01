<!DOCTYPE html>
<html lang="en-US">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>@yield('pageTitle')</title>
<meta name='robots' content='noindex,follow' />
		<script type="text/javascript">
			window._wpemojiSettings = {"baseUrl":"https:\/\/s.w.org\/images\/core\/emoji\/2.2.1\/72x72\/","ext":".png","svgUrl":"https:\/\/s.w.org\/images\/core\/emoji\/2.2.1\/svg\/","svgExt":".svg","source":{"concatemoji":"http:\/\/localhost\/ccca\/wordpress\/2\/wp-includes\/js\/wp-emoji-release.min.js?ver=4.7.2"}};
			!function(a,b,c){function d(a){var b,c,d,e,f=String.fromCharCode;if(!k||!k.fillText)return!1;switch(k.clearRect(0,0,j.width,j.height),k.textBaseline="top",k.font="600 32px Arial",a){case"flag":return k.fillText(f(55356,56826,55356,56819),0,0),!(j.toDataURL().length<3e3)&&(k.clearRect(0,0,j.width,j.height),k.fillText(f(55356,57331,65039,8205,55356,57096),0,0),b=j.toDataURL(),k.clearRect(0,0,j.width,j.height),k.fillText(f(55356,57331,55356,57096),0,0),c=j.toDataURL(),b!==c);case"emoji4":return k.fillText(f(55357,56425,55356,57341,8205,55357,56507),0,0),d=j.toDataURL(),k.clearRect(0,0,j.width,j.height),k.fillText(f(55357,56425,55356,57341,55357,56507),0,0),e=j.toDataURL(),d!==e}return!1}function e(a){var c=b.createElement("script");c.src=a,c.defer=c.type="text/javascript",b.getElementsByTagName("head")[0].appendChild(c)}var f,g,h,i,j=b.createElement("canvas"),k=j.getContext&&j.getContext("2d");for(i=Array("flag","emoji4"),c.supports={everything:!0,everythingExceptFlag:!0},h=0;h<i.length;h++)c.supports[i[h]]=d(i[h]),c.supports.everything=c.supports.everything&&c.supports[i[h]],"flag"!==i[h]&&(c.supports.everythingExceptFlag=c.supports.everythingExceptFlag&&c.supports[i[h]]);c.supports.everythingExceptFlag=c.supports.everythingExceptFlag&&!c.supports.flag,c.DOMReady=!1,c.readyCallback=function(){c.DOMReady=!0},c.supports.everything||(g=function(){c.readyCallback()},b.addEventListener?(b.addEventListener("DOMContentLoaded",g,!1),a.addEventListener("load",g,!1)):(a.attachEvent("onload",g),b.attachEvent("onreadystatechange",function(){"complete"===b.readyState&&c.readyCallback()})),f=c.source||{},f.concatemoji?e(f.concatemoji):f.wpemoji&&f.twemoji&&(e(f.twemoji),e(f.wpemoji)))}(window,document,window._wpemojiSettings);
		</script>
		<style type="text/css">
img.wp-smiley,
img.emoji {
	display: inline !important;
	border: none !important;
	box-shadow: none !important;
	height: 1em !important;
	width: 1em !important;
	margin: 0 .07em !important;
	vertical-align: -0.1em !important;
	background: none !important;
	padding: 0 !important;
}
</style>
<link rel='stylesheet' id='jquery-ui-smoothness-css'  href='{{url('themes/yellow/css/jquery-ui.min.css')}}?ver=all' type='text/css' media='all' />
<link rel='stylesheet' id='vmmc-style-css'  href='{{url('themes/yellow/style.css')}}?ver=4.7.2' type='text/css' media='all' />
<link rel='stylesheet' id='vmmc-custom-temp-css'  href='{{url('themes/yellow/css/custom.css')}}?ver=all' type='text/css' media='all' />
<script type='text/javascript' src='{{url('js/wp/jquery/jquery.js')}}?ver=1.12.4'></script>
<script type='text/javascript' src='{{url('js/wp/jquery/jquery-migrate.min.js')}}?ver=1.4.1'></script>
<script type='text/javascript' src='{{url('js/wp/jquery/ui/core.min.js')}}?ver=1.11.4'></script>
<script type='text/javascript' src='{{url('js/wp/jquery/ui//widget.min.js')}}?ver=1.11.4'></script>
<script type='text/javascript' src='{{url('js/wp/jquery/ui//mouse.min.js')}}?ver=1.11.4'></script>
<script type='text/javascript' src='{{url('js/wp/jquery/ui//slider.min.js')}}?ver=1.11.4'></script>
<script type='text/javascript' src='{{url('js/wp/jquery/ui//resizable.min.js')}}?ver=1.11.4'></script>
<script type='text/javascript' src='{{url('js/wp/jquery/ui//draggable.min.js')}}?ver=1.11.4'></script>
<script type='text/javascript' src='{{url('js/wp/jquery/ui//button.min.js')}}?ver=1.11.4'></script>
<script type='text/javascript' src='{{url('js/wp/jquery/ui//position.min.js')}}?ver=1.11.4'></script>
<script type='text/javascript' src='{{url('js/wp/jquery/ui//dialog.min.js')}}?ver=1.11.4'></script>

<script type='text/javascript' src='{{url('themes/yellow/js/jquery-ui.min.js')}}?ver=1.12.1'></script>
<style type="text/css">.recentcomments a{display:inline !important;padding:0 !important;margin:0 !important;}</style>
		    </head>

    <body class="home page-template-default page page-id-3 logged-in">
        <div id="page" class="site">

            <header id="masthead" class="site-header" role="banner">
                <div class="header-logo">
                                            <a href="#" onclick="getHome();return false;" rel="home"><img src="{{url('themes/yellow/images/logo-vm.png')}}" width="" height=""/></a>
                                    </div><!-- .site-branding -->

                <div class="header-newsfeed">
                                    </div><!--#Display News Feed -->

                <div class="header-status">
                    
                    <span class="home_time"><div id="clock"></div></span>
                    <span class=""><img src="{{url('themes/yellow/images/wifi-icon.png')}}" /></span>
                    <span class="">February, 01 2017</span>

                </div><!--#Display Status-->

                <div class="header-login">
                                    </div>
            </header><!-- #masthead -->

            <div id="content" class="site-content">
	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			
<article id="post-3" class="post-3 page type-page status-publish hentry">
    <header class="entry-header">
        <h1 class="entry-title">Welcome</h1>    </header><!-- .entry-header -->

    <div class="entry-content">
                            <div class="padding-wrapper">
                @yield('content')
                <div id="show_content" style="float: left;width:100%;"></div>
            </div>
            </div><!-- .entry-content -->


</article><!-- #post-## -->

		</main><!-- #main -->
	</div><!-- #primary -->



</div><!-- #content -->
<div id="popup-msg">
    <div id="msg_type"></div>
    
</div>
<script type='text/javascript' src='{{url('themes/yellow/js/custom.js')}}?ver=1.12.1'></script>
<script type='text/javascript' src='{{url('themes/yellow/js/hammer.min.js')}}?ver=2.0.8'></script>
<script type='text/javascript' src='{{url('themes/yellow/js/hammer-time.min.js')}}?ver=1.1.0'></script>
<script type='text/javascript' src='{{url('themes/yellow/js/jquery.hammer.js')}}?ver=1.0'></script>
        <script type="text/javascript">
                    function getHome()
                    {
                        var fullLink=window.location.href;
                        var host=fullLink.substring(0,fullLink.indexOf("agency"));
                        var rest=fullLink.substring(fullLink.indexOf("agency")+7);
                        if(rest.indexOf('/')!=-1)
                        {
                        var id=rest.substring(0,rest.indexOf('/'));
                        }
                        else
                        {
                            id=rest;
                        }
                        window.location=host+"agency/"+id;
                    }
         </script>
</body>
</html>
