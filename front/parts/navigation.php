<?php
require('inc/database/db_connect.php');
require('inc/database/login.php');
include ('functions.php');
if (!isset($_SESSION['logged_in'])) {
    header('refresh: 0; url=./');
}
?>
<div class="main-left">
    <h2><span class="full-width-text">E-Fitness</span>
        <img class="hidden-img" src="repository/favicon.ico" alt="E-Fitness">
    </h2>
    <div class="welcome-navigation">
        <div class="welcome-wrapper">
        <img src="repository/favicon.ico" title="E-Fitness"/>
        </div>
        <div class="welcome-wrapper">
        <p>Howdy, </p>
        <?php $username = $_SESSION['username'];?>
        <p style="font-weight: bold;"><?php echo $username; ?></p>
        </div>
        <div class="welcome-wrapper">
            <a href="inc/database/logout.php" title="Log Out">
                <i class="fa log-out-icon"></i>
            </a>
        </div>
    </div>
    <h2 class="navigation-text"><span class="full-width-text">Navigation</span></h2>
    <ul>
        <li>
            <a class="<?php active('dashboard') ? 'active' : NULL ?>" href="./" title="Dashboard">
                <i class="fa dashboard"></i><span class="full-width-text">Dashboard</span>
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
                <i class="fa members"></i><span class="full-width-text">Members</span>
            </a>
            <ul>
                <li>
                    <a class="<?php active('members') ? 'active' : NULL ?>" href="members" title="Add Members">
                        <i class="fa member"></i>
                        <span class="full-width-text">Add Member</span>
                    </a>
                </li>
                <li>
                    <a class="<?php (active('search_members') || active('search_members_field.php?go')) ? 'active' : NULL ?>" href="search_members" title="Search Members">
                        <i class="fa fa-search"></i>
                        <span class="full-width-text">Search Members</span>
                    </a>
                </li>
            </ul>
        </li>
        <li>
            <?php
            $url = startsWith(getLastURLPart(), 'employee');
            ?>
            <a class="<?php
            if ($url) {
                active($url);
            } active('search_employees') || active('search_employees_field.php?go') ? 'active' : NULL
            ?>" href="employees" title="Employees">
                <i class="fa employees"></i><span class="full-width-text">Employees</span>
            </a>
            <ul>
                <li>
                    <a class="<?php active('employees') ? 'active' : NULL ?>" href="employees" title="Add Employees">
                        <i class="fa employee"></i>
                        <span class="full-width-text">Add Employee</span>
                    </a>
                </li>
                <li>
                    <a class="<?php (active('search_employees') || active('search_employees_field.php?go')) ? 'active' : NULL ?>" href="search_employees" title="Search Employees">
                        <i class="fa fa-search"></i>
                        <span class="full-width-text">Search Employees</span>
                    </a>
                </li>
            </ul>
        </li>
        <?php if ($_SESSION['admin_status'] == 0) { ?>
            <li>
                <?php
                $url = startsWith(getLastURLPart(), 'settings');
                ?>
                <a class="<?php
                if ($url) {
                    active($url);
                } active('other_settings') || active('manage_accounts') || active('add_account') ? 'active' : NULL
                ?>" href="manage_accounts" title="Settings">
                    <i class = "fa settings"></i><span class="full-width-text">Settings</span>
                </a>
                <ul>
                    <li>
                        <a class = "<?php active('manage_accounts') ? 'active' : NULL ?>" href = "manage_accounts" title="Manage Accounts">
                            <i class = "fa accounts"></i><span class="full-width-text">Manage Accounts</span>
                        </a>
                    </li>
                    <li>
                        <a class = "<?php active('other_settings') ? 'active' : NULL ?>" href = "other_settings" title="Other Settings">
                            <i class = "fa cog"></i><span class="full-width-text">Other</span>
                        </a>
                    </li>
                </ul>
            </li>
            <?php
        }
        ?>
    </ul>
    <div class="log-out">

    </div>
</div>

