<?php
require('inc/database/db_connect.php');
require('inc/database/login.php');
include ('functions.php');
if (!isset($_SESSION['logged_in'])) {
    header('refresh: 0; url=./');
}
?>
<div class="main-left">
    <h2>E-Fitness</h2>
    <ul>
        <li>
            <a class="<?php active('dashboard') ? 'active' : NULL ?>" href="./" title="Dashboard">
                <i class="fa dashboard"></i>Dashboard
            </a>
        </li>
        <li>
            <?php
            $url = startsWith(getLastURLPart(), 'member');
            ?>
            <a class="<?php
            if ($url) {
                active($url);
            } active('search_members') || active('search_members_field.php?go') || active('members_settings') ? 'active' : NULL
            ?>" href="members" title="Members">
                <i class="fa members"></i>Members
            </a>
            <ul>
                <li>
                    <a class="<?php active('members') ? 'active' : NULL ?>" href="members" title="Add Members">
                        <i class="fa member"></i>
                        Add Members
                    </a>
                </li>
                <li>
                    <a class="<?php (active('search_members') || active('search_members_field.php?go')) ? 'active' : NULL ?>" href="search_members" title="Search Members">
                        <i class="fa fa-search"></i>
                        Search Members
                    </a>
                </li>
            </ul>
        </li>
        <li>
            <a class="<?php active('settings') ? 'active' : NULL ?>" href="settings">
                <i class="fa settings"></i>Settings
            </a>
        </li>
    </ul>
    <div class="log-out">
        <a href="inc/database/logout.php" title="Log Out"><i class="fa log-out-icon"></i>Log Out
        </a>
    </div>
</div>

