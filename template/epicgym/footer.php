<footer>
        <div class="container">

            <?php
                wp_nav_menu( array( 
                    'theme_location' => 'bottom-menu', 
                    'menu_id' => 'bottom-nav',
                    'container' => '')); 
            ?>
        
            <div id="social">
                <ul id="social-links">
                    <li class="facebook"><a href="https://www.facebook.com"><i class="fa-brands fa-facebook"></i></a></li>
                    <li class="instagram"><a href="https://www.instagram.com"><i class="fa-brands fa-instagram-square"></i></a></li>
                    <li class="youtube"><a href="https://www.youtube.com"><i class="fa-brands fa-youtube"></i></a></li>
                    <li class="youtube"><a href="https://www.twitter.com"><i class="fa-brands fa-twitter"></i></a></li>
                </ul>
            </div>
            <div id="copyright">
                <p>&copy; Copyrights 2022. Epic Gym. All rights reserved.</p>
            </div>
        </div>   
    </footer>
<!--    <script src="--><?php //bloginfo('stylesheet_directory');?><!--/js/app.js"></script>-->
    <?php wp_footer(); ?>
</body>
</html>