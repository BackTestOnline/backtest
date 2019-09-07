</div>

<?php
global $logo;
$user_ip = $_SERVER['REMOTE_ADDR'];
if($user_ip == "::1" || $user_ip == "127.0.0.1") {
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
}else{
    if (isset($_SESSION['status'])) {
        $user_status = $_SESSION['status'];
        $user_role = $_SESSION['role'];
        if ($user_status == "Premium" || $user_role == "admin") {
            $logo = "../../../images/BacktestOnline_premium.png";
        } else if ($user_status == "Free") {
            $logo = "../../../images/BacktestOnline_free.png";
        }
    } else {
        $logo = "../../../images/BacktestOnline_web.png";
    }
}

?>

<!-- Sidebar -->
<section id="sidebar">

    <!-- Intro -->
    <section id="intro">
        <a href="/"><img src="<?php echo $logo;?>" class="logo" alt="Backtest Logo" style=""></a>
        <header>
<!--            <h2>Backtest Online</h2>-->
            <h3>Home of the B.O.S.S. Software</h3>
        </header>
    </section>

<?php include "includes/admin_side_links.php"?>

    <!-- About -->
    <section class="blurb">
        <h2>About</h2>
        <p>BacktestOnline is a family home run company project. <a href="../about.php">Read more about us here....</a></p>
        <ul class="actions">
            <li><a href="../about.php" class="button">Learn More</a></li>
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