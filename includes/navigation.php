<section id="menu">
    <!-- Search -->
    <section>
        <form class="search" method="get" action="#">
            <input type="text" name="query" placeholder="Search" />
        </form>
    </section>
    <!-- Links -->
    <section>
        <ul class="links">
            <li>
                <a href="/">
                    <h3>Home</h3>
                </a>
            </li>
            <li>
                <a href="about.php">
                    <h3>About</h3>
                </a>
            </li>
            <li>
                <a href="admin/">
                    <h3>Admin</h3>
                </a>
            </li>
            <li>
                <a href="#">
                    <h3>Etiam sed consequat</h3>
                </a>
            </li>
            <?php
            //include "links.php";
            ?>
        </ul>
    </section>
    <!-- Actions -->
    <section>
        <ul class='actions stacked' >
            <?php if(!isset($_SESSION['email'])){?>
            <li ><a href = 'login.php' class='button large fit' > Log In </a ></li >
        <!--</ul >
        <ul class='actions stacked' >-->
            <?php }else{ ?>
            <li ><a href = 'logout.php' class='button large fit' > Log Out </a ></li >
            <?php }?>
        </ul >
    </section>
    <?php
    $user_ip = $_SERVER['REMOTE_ADDR'];
    if($user_ip == "::1" || $user_ip == "127.0.0.1"){
        echo "
        <ul class='actions stacked' >
            <li ><a href = 'debug.php' class='button large fit' > Session Debugging </a ></li >
        </ul>";
    }
    ?>
</section>