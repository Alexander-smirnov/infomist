<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package Infomist
 */

?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer" role="contentinfo">
        <ul class="footcontent">
            <li>
                <a href="<?php echo esc_url( home_url( '/' ) ); ?>"><img src="<?php echo get_stylesheet_directory_uri() ?>/images/logo_foot.png" alt="logo"/></a>
                <p class="copypast">Копіювання будь-яких матеріалів сайту можливе тільки із зазначенням джерела інформації та з гіперпосиланням на «ІнфоМІСТ», згідно із положеннями Закону України “Про авторське право та суміжні права”.
                </p>
                <p class="copyright">© 2015 “ІнфоМІСТ”</p>

            </li>
            <li>
                <h3 class="contacts"><span>Зв'язатися з нами</span></h3>
                <ul class="address">
                    <li class="adr">
                        <span class="fa fa-map-marker"></span>
                        <p>вул. Б. Вишневецького, 47, к. 404</p>
                    </li>
                    <li class="tel">
                        <span class="fa fa-phone"></span>

                        <p>+38 (097) 452 43 64</p>

                        <p> (0472) 50-11-20</p>
                    </li>
                    <li class="email">
                        <span class="fa fa-envelope-o"></span>
                        <p>infomist@ukr.net</p>
                    </li>
                </ul>
                <!--bigmir)net TOP 100-->
                <script type="text/javascript" language="javascript"><!--
                    function BM_Draw(oBM_STAT){
                        document.write('<table cellpadding="0" cellspacing="0" border="0" style="display:inline-block;margin-right:4px;"><tr><td><div style="font-family:Tahoma;font-size:10px;padding:0px;margin:0px;"><div style="width:7px;float:left;background:url(\'//i.bigmir.net/cnt/samples/default/b52_left.gif\');height:17px;padding-top:2px;background-repeat:no-repeat;"></div><div style="float:left;background:url(\'//i.bigmir.net/cnt/samples/default/b52_center.gif\');text-align:left;height:17px;padding-top:2px;background-repeat:repeat-x;"><a href="http://www.bigmir.net/" target="_blank" style="color:#0000ab;text-decoration:none;">bigmir<span style="color:#ff0000;">)</span>net</a>  <span style="color:#797979;">хиты</span> <span style="color:#003596;font:10px Tahoma;">'+oBM_STAT.hits+'</span> <span style="color:#797979;">хосты</span> <span style="color:#003596;font:10px Tahoma;">'+oBM_STAT.hosts+'</span></div><div style="width:7px;float: left;background:url(\'//i.bigmir.net/cnt/samples/default/b52_right.gif\');height:17px;padding-top:2px;background-repeat:no-repeat;"></div></div></td></tr></table>');
                    }
                    //-->
                </script>
                <script type="text/javascript" language="javascript"><!--
                    bmN=navigator,bmD=document,bmD.cookie='b=b',i=0,bs=[],bm={o:1,v:16941353,s:16941353,t:0,c:bmD.cookie?1:0,n:Math.round((Math.random()* 1000000)),w:0};
                    for(var f=self;f!=f.parent;f=f.parent)bm.w++;
                    try{if(bmN.plugins&&bmN.mimeTypes.length&&(x=bmN.plugins['Shockwave Flash']))bm.m=parseInt(x.description.replace(/([a-zA-Z]|\s)+/,''));
                    else for(var f=3;f<20;f++)if(eval('new ActiveXObject("ShockwaveFlash.ShockwaveFlash.'+f+'")'))bm.m=f}catch(e){;}
                    try{bm.y=bmN.javaEnabled()?1:0}catch(e){;}
                    try{bmS=screen;bm.v^=bm.d=bmS.colorDepth||bmS.pixelDepth;bm.v^=bm.r=bmS.width}catch(e){;}
                    r=bmD.referrer.replace(/^w+:\/\//,'');if(r&&r.split('/')[0]!=window.location.host){bm.f=escape(r).slice(0,400);bm.v^=r.length}
                    bm.v^=window.location.href.length;for(var x in bm) if(/^[ovstcnwmydrf]$/.test(x)) bs[i++]=x+bm[x];
                    bmD.write('<sc'+'ript type="text/javascript" language="javascript" src="//c.bigmir.net/?'+bs.join('&')+'"></sc'+'ript>');
                    //-->
                </script>
                <noscript>
                    <a href="http://www.bigmir.net/" target="_blank"><img src="//c.bigmir.net/?v16941353&s16941353&t2" width="88" height="31" alt="bigmir)net TOP 100" title="bigmir)net TOP 100" border="0" /></a>
                </noscript>
                <!--bigmir)net TOP 100-->
            </li>
            <li>
                <h3 class="contacts">
                    <?php $kitchen = get_permalink(12); ?>
                    <a href="<?php echo $kitchen ?>">Редакційна кухня</a>
                </h3>
                <ul class="right-foter-content">
                    <li>
                        <ul class="social">
                            <li class="facebook">
                                <a href="https://www.facebook.com/infomist.ck.ua">
                                    <span class="fa fa-facebook"></span>
                                </a>
                            </li>
                            <li class="vk">
                                <a href="https://vk.com/public97238909">
                                    <span class="fa fa-bold"></span>
                                </a>
                            </li>
                            <li class="youtube">
                                <a href="https://www.youtube.com/channel/UCie5GwjAmKUzPeeAJeU4ZNw">
                                    <span class="fa fa-youtube"></span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <p><span>Developed by </span>A.Smirnov</p>
                    </li>
                    <li>
                        <p><span>Designed by </span>K.Polishchuk</p>
                    </li>
                </ul>
            </li>
        </ul>
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
        <script type="text/javascript">
            $(document).ready(function() {
                $(window).load(function() {
                    $('.flexslider').flexslider({
                        animation: "slide",
                        directionNav: true,
                        animationLoop: true,
                        controlNav: "thumbnails",
                        start: function(slider){
                            $('.flexslider').resize();
                        }
                    });
                });
            });
        </script>
        <script type="text/javascript">
            $(document).ready(function() {
                $('.fancybox').fancybox();
            });
        </script>
	</footer><!-- #colophon -->
</div><!-- .wrapper -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
