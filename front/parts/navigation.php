<?php include ('functions.php'); ?>
<div class="main-left">
    <h2>E-Fitness</h2>
    <ul>
        <li>
            <a class="<?php active('') ? 'active' : NULL ?>" href="./" title="Dashboard">
                <i class="fa dashboard"></i>Dashboard
            </a>
        </li>
        <li>
            <a class="<?php active('members') || active('members_settings') ? 'active' : NULL ?>" href="members" title="Members">
                <i class="fa members"></i>Members
            </a>
            <ul>
                <li>
                    <a class="<?php active('members') ? 'active' : NULL ?>" href="members" title="Manage Members">
                        <i class="fa member"></i>
                        Manage Members
                    </a>
                </li>
                <li>
                    <a class="<?php active('members_settings') ? 'active' : NULL ?>" href="members_settings" title="Member Settings">
                        <i class="fa settings"></i>
                        Settings
                    </a>
                </li>
            </ul>
        </li>
        <li>
            <a class="<?php active('settings') ? 'active' : NULL ?>" href="settings">
                <i class="fa settings"></i>Settings
            </a>
        </li>
<!--        <li><a class="<?php $current_page == 'custom.php' ? 'active' : NULL ?>" href="custom.php">Beauty Lounge</a></li>
        <li><a class="<?php $current_page == 'feiertage.php' ? 'active' : NULL ?>" href="feiertage.php">Feiertage</a></li>-->
        <!--        <li>
                    <a href="javascript:void(0)" title="Dashboard" class="active">
                        <i class="fa dashboard"></i>
                        Dashboard
                    </a>
                </li>
                <li>
                    <a href="javascript:void(0)" title="Members">
                        <i class="fa members"></i>
                        Members
                    </a>
                    <ul>
                        <li>
                            <a href="javascript:void(0)" title="Manage Members">
                                <i class="fa member"></i>
                                Manage Members
                            </a>
                        </li>
                        <li>
                            <a href="javascript:void(0)" title="Member Settings">
                                <i class="fa settings"></i>
                                Settings
                            </a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="javascript:void(0)" title="settings">
                        <i class="fa settings"></i>
                        Settings
                    </a>
                </li>-->
    </ul>
</div>
