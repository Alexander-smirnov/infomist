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
        <nav>
            <?php wp_nav_menu( array( 'Footer Menu' => 'infomist   ' ) ); ?>
        </nav>
        <ul class="social">
            <li class="facebook">
                <a href="#">
                    <span class="fa fa-facebook"></span>
                </a>
            </li>
            <li class="vk">
                <a href="#">
                    <span class="fa fa-bold"></span>
                </a>
            </li>
            <li class="youtube">
                <a href="#">
                    <span class="fa fa-youtube"></span>
                </a>
            </li>
        </ul>
	</footer><!-- #colophon -->
</div><!-- .wrapper -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
