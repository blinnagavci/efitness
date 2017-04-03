<?php
require('inc/database/db_connect.php');
require('inc/database/login.php');
include ('functions.php');
if (!isset($_SESSION['logged_in'])) {
    header('refresh: 0; url=./');
}
?>
<!--<div class="main-left">
    <h2><span class="full-width-text">E-Fitness</span>
        <img class="hidden-img" src="repository/favicon.ico" alt="E-Fitness">
    </h2>
    <div class="welcome-navigation">
        <div class="welcome-wrapper-1">
            <img src="repository/favicon.ico" title="E-Fitness"/>
        </div>
        <div class="welcome-wrapper">
            <p>Howdy, </p>
<?php $username = $_SESSION['username']; ?>
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
        <a class="responsive-logout" href="inc/database/logout.php" title="Log Out">
            <i class="fa log-out-icon"></i>
        </a>
    </div>
</div>-->
<div class="main-left">
    <h2><span class="full-width-text">E-Fitness</span>
        <img class="hidden-img" src="repository/favicon.ico" alt="E-Fitness">
    </h2>
    <div class="welcome-navigation">
        <div class="welcome-wrapper-1">
            <img src="repository/favicon.ico" title="E-Fitness"/>
        </div>
        <div class="welcome-wrapper">
            <p>Howdy, </p>
            <?php $username = $_SESSION['username']; ?>
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
            <a href="dashboard" title="Dashboard" class="<?php active('dashboard') ? 'active' : NULL ?> ">
                <i class="fa dashboard"></i>
                Dashboard
            </a>
        </li>
        <li>
            <a class="<?php active('members') || active('search_members') ? 'active' : NULL ?>" href="javascript:void(0)" title="Members">
                <i class="fa members"></i>
                Members
            </a>
            <ul>
                <li>
                    <a class="<?php active('members') ? 'active' : NULL ?>" href="members" title="Add Member">
                        <i class="fa member"></i>
                        Add Member
                    </a>
                </li>
                <li>
                    <a class="<?php active('search_members') ? 'active' : NULL ?>" href="search_members" title="Search Members">
                        <i class="fa fa-search"></i>
                        Search Members
                    </a>
                </li>
            </ul>
        </li>
        
        <li>
            <a class="<?php active("employees") || active('search_employees') || active('search_employees_field.php?go') ? 'active' : NULL ?>" href="javascript:void(0)" title="Employees">
                <i class="fa employees"></i>
                Employees
            </a>
            <ul>
                <li>
                    <a class="<?php active('employees')?>" href="employees" title="Add Employee">
                        <i class="fa employees"></i>
                        Add Employee
                    </a>
                </li>
                <li>
                    <a class="<?php active('search_employees') || active('search_employees_field.php?go') ?>" href="search_employees" title="Search Employees">
                        <i class="fa fa-search"></i>
                        Search Employees
                    </a>
                </li>
            </ul>
        </li>
        <li>
            <a class="<?php active("inventory") || active('search_inventory') || active('search_inventory_field.php?go') ? 'active' : NULL ?>" href="javascript:void(0)" title="Inventory">
                <i class="fa inventory"></i>
                Inventory
            </a>
            <ul>
                <li>
                    <a class="<?php active('inventory')?>" href="inventory" title="Add Item">
                        <i class="fa add-item"></i>
                        Add Item
                    </a>
                </li>
                <li>
                    <a class="<?php active('search_inventory') || active('search_inventory_field.php?go') ?>" href="search_inventory" title="Search Item">
                        <i class="fa fa-search"></i>
                        Search Item
                    </a>
                </li>
            </ul>
        </li>
        <li>
            <a href="reports" title="Reports" class="<?php active('reports') ? 'active' : NULL ?> ">
                <i class="fa reports"></i>
                Reports
            </a>
        </li>
        <li>
            <a href="javascript:void(0)" title="settings" class="<?php active('other_settings') || active('manage_accounts') || active('add_accounts') ? 'active' : NULL ?>">
                <i class="fa settings"></i>
                Settings
            </a>
            <ul>
                <li>
                    <a class="<?php active('manage_accounts') || active('add_accounts') ? 'active' : NULL ?>" href="manage_accounts" title="Manage Accounts">
                        <i class="fa accounts"></i>
                        Manage Accounts
                    </a>
                </li>
                <li>
                    <a class="<?php active('other_settings') ? 'active' : NULL ?>" href="other_settings" title="Other Settings">
                        <i class="fa cog"></i>
                        Other
                    </a>
                </li>
            </ul>
        </li>
    </ul>
    <div class="log-out">
        <a class="responsive-logout" href="inc/database/logout.php" title="Log Out">
            <i class="fa log-out-icon"></i>
        </a>
    </div>
</div>


