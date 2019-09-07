</div>

<?php
//test
global $logo;
$user_ip = $_SERVER['REMOTE_ADDR'];
if($user_ip == "::1" || $user_ip == "127.0.0.1") {
    if (isset($_SESSION['status'])) {
        $user_status = $_SESSION['status'];
        $user_role = $_SESSION['role'];
        //echo $user_status;
        if ($user_status == "Premium" || $user_role == "admin") {
            $logo = "images/BacktestOnline_premium.png";
        } else if ($user_status == "Free") {
            $logo = "images/BacktestOnline_free.png";
        }
    } else {
        $logo = "images/BacktestOnline_web.png";
    }
}else{
    if (isset($_SESSION['status'])) {
        $user_status = $_SESSION['status'];
        $user_role = $_SESSION['role'];
        //echo $user_status;
        if ($user_status == "Premium" || $user_role == "admin") {
            $logo = "../images/BacktestOnline_premium.png";
        } else if ($user_status == "Free") {
            $logo = "../images/BacktestOnline_free.png";
        }
    } else {
        $logo = "../images/BacktestOnline_web.png";
    }
}

//echo $logo
?>

<!-- Sidebar -->
<section id="sidebar">

    <!-- Intro -->
    <section id="intro">
        <a href="#"><img src="<?php echo $logo;?>" class="logo" alt="Backtest Logo" style=""></a>
        <header>
<!--            <h2>Backtest Online</h2>-->
            <h3>Home of the B.O.S.S. Software</h3>
        </header>
    </section>

    <!-- Mini Posts -->
    <!--<section>
        <div class="mini-posts">


            <article class="mini-post">
                <header>
                    <h3><a href="single.html">Vitae sed condimentum</a></h3>
                    <time class="published" datetime="2015-10-20">October 20, 2015</time>
                    <a href="#" class="author"><img src="images/avatar.jpg" alt="" /></a>
                </header>
                <a href="single.html" class="image"><img src="images/pic04.jpg" alt="" /></a>
            </article>

            <article class="mini-post">
                <header>
                    <h3><a href="single.html">Rutrum neque accumsan</a></h3>
                    <time class="published" datetime="2015-10-19">October 19, 2015</time>
                    <a href="#" class="author"><img src="images/avatar.jpg" alt="" /></a>
                </header>
                <a href="single.html" class="image"><img src="images/pic05.jpg" alt="" /></a>
            </article>


            <article class="mini-post">
                <header>
                    <h3><a href="single.html">Odio congue mattis</a></h3>
                    <time class="published" datetime="2015-10-18">October 18, 2015</time>
                    <a href="#" class="author"><img src="images/avatar.jpg" alt="" /></a>
                </header>
                <a href="single.html" class="image"><img src="images/pic06.jpg" alt="" /></a>
            </article>


            <article class="mini-post">
                <header>
                    <h3><a href="single.html">Enim nisl veroeros</a></h3>
                    <time class="published" datetime="2015-10-17">October 17, 2015</time>
                    <a href="#" class="author"><img src="images/avatar.jpg" alt="" /></a>
                </header>
                <a href="single.html" class="image"><img src="images/pic07.jpg" alt="" /></a>
            </article>

        </div>
    </section>

    <section>
        <ul class="posts">
            <li>
                <article>
                    <header>
                        <h3><a href="single.html">Lorem ipsum fermentum ut nisl vitae</a></h3>
                        <time class="published" datetime="2015-10-20">October 20, 2015</time>
                    </header>
                    <a href="single.html" class="image"><img src="images/pic08.jpg" alt="" /></a>
                </article>
            </li>
            <li>
                <article>
                    <header>
                        <h3><a href="single.html">Convallis maximus nisl mattis nunc id lorem</a></h3>
                        <time class="published" datetime="2015-10-15">October 15, 2015</time>
                    </header>
                    <a href="single.html" class="image"><img src="images/pic09.jpg" alt="" /></a>
                </article>
            </li>
            <li>
                <article>
                    <header>
                        <h3><a href="single.html">Euismod amet placerat vivamus porttitor</a></h3>
                        <time class="published" datetime="2015-10-10">October 10, 2015</time>
                    </header>
                    <a href="single.html" class="image"><img src="images/pic10.jpg" alt="" /></a>
                </article>
            </li>
            <li>
                <article>
                    <header>
                        <h3><a href="single.html">Magna enim accumsan tortor cursus ultricies</a></h3>
                        <time class="published" datetime="2015-10-08">October 8, 2015</time>
                    </header>
                    <a href="single.html" class="image"><img src="images/pic11.jpg" alt="" /></a>
                </article>
            </li>
            <li>
                <article>
                    <header>
                        <h3><a href="single.html">Congue ullam corper lorem ipsum dolor</a></h3>
                        <time class="published" datetime="2015-10-06">October 7, 2015</time>
                    </header>
                    <a href="single.html" class="image"><img src="images/pic12.jpg" alt="" /></a>
                </article>
            </li>
        </ul>
    </section>-->

    <!-- About -->
    <section class="blurb">
        <h2>About</h2>
        <p>BacktestOnline is a family home run company project. <a href="about.php">Read more about us here....</a></p>
        <ul class="actions">
            <li><a href="about.php" class="button">Learn More</a></li>
        </ul>
    </section>

    <!-- Footer -->
    <section id="footer">
        <ul class="icons">
            <li><a href="#" class="icon brands fa-twitter"><span class="label">Twitter</span></a></li>
            <li><a href="#" class="icon brands fa-facebook-f"><span class="label">Facebook</span></a></li>
            <li><a href="#" class="icon brands fa-instagram"><span class="label">Instagram</span></a></li>
            <li><a href="#" class="icon solid fa-rss"><span class="label">RSS</span></a></li>
            <li><a href="#" class="icon solid fa-envelope"><span class="label">Email</span></a></li>
        </ul>
        <p class="copyright">&copy; Untitled. Design: <a href="http://html5up.net">HTML5 UP</a>. Images: <a href="http://unsplash.com">Unsplash</a>.</p>
    </section>

</section>

</div>

<!-- Scripts -->
<script src="assets/js/jquery.min.js"></script>
<script src="assets/js/browser.min.js"></script>
<script src="assets/js/breakpoints.min.js"></script>
<script src="assets/js/util.js"></script>
<script src="assets/js/main.js"></script>

</body>
</html>