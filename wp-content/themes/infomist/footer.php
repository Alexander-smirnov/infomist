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
                        <p>бул. Шевченка, 242/1, каб. 206.</p>
                    </li>
                    <li class="tel">
                        <span class="fa fa-phone"></span>

                        <p><a href="tel:0974524364">+38 (097) 452 43 64</a></p>

                        <p><a href="tel:0472501120"> (0472) 50-11-20</a></p>
                    </li>
                    <li class="email">
                        <span class="fa fa-envelope-o"></span>
                        <p><a href="mailto:infomist@ukr.net">infomist@ukr.net</a></p>
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
                    <li>
                        <a href="http://www.i.ua/" target="_blank" onclick="this.href='http://i.ua/r.php?196461';" title="Rated by I.UA">
                            <script type="text/javascript"><!--
                                iS='http'+(window.location.protocol=='https:'?'s':'')+
                                    '://r.i.ua/s?u196461&p66&n'+Math.random();
                                iD=document;if(!iD.cookie)iD.cookie="b=b; path=/";if(iD.cookie)iS+='&c1';
                                iS+='&d'+(screen.colorDepth?screen.colorDepth:screen.pixelDepth)
                                    +"&w"+screen.width+'&h'+screen.height;
                                iT=iR=iD.referrer.replace(iP=/^[a-z]*:\/\//,'');iH=window.location.href.replace(iP,'');
                                ((iI=iT.indexOf('/'))!=-1)?(iT=iT.substring(0,iI)):(iI=iT.length);
                                if(iT!=iH.substring(0,iI))iS+='&f'+escape(iR);
                                iS+='&r'+escape(iH);
                                iD.write('<img src="'+iS+'" border="0" width="88" height="31" />');
                                //--></script></a>
                    </li>
                </ul>
            </li>
        </ul>
	</footer><!-- #colophon -->
</div><!-- .wrapper -->
</div><!-- #page -->
<style>
    .widget.widget_sp_image .widget-title {
        color: #252525;
        font-size: 8px;
        text-align: center;
        line-height: 8px;
    }
    .widget.widget_sp_image img {width: 100%;}
</style>
<?php wp_footer(); ?>

</body>
</html>
