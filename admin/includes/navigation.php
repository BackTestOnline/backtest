<section id="admin_menu">
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
                <a href="#">
                    <h3>LINK 1</h3>
                    <p>Feugiat tempus veroeros dolor</p>
                </a>
            </li>
            <li>
                <a href="#">
                    <h3>Dolor sit amet</h3>
                    <p>Sed vitae justo condimentum</p>
                </a>
            </li>
            <li>
                <a href="#">
                    <h3>Feugiat veroeros</h3>
                    <p>Phasellus sed ultricies mi congue</p>
                </a>
            </li>
            <li>
                <a href="#">
                    <h3>Etiam sed consequat</h3>
                    <p>Porta lectus amet ultricies</p>
                </a>
            </li>
        </ul>
    </section>
    <!-- Actions -->
    <section>
        <ul class='actions stacked' >
            <li ><a href = 'login.php' class='button large fit' > Log In </a ></li >
        <!--</ul >
        <ul class='actions stacked' >-->
            <li ><a href = 'logout.php' class='button large fit' > Log Out </a ></li >
        </ul >
    </section>
    <?php
    $user_ip = $_SERVER['REMOTE_ADDR'];
    if($user_ip == "::1" || $user_ip == "127.0.0.1"){
        echo "
        <ul class='actions stacked' >echo
            <li ><a href = 'debug.php' class='button large fit' > Session Debugging </a ></li >
        </ul>";
    }
    ?>
</section>