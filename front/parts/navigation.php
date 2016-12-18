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
</div>
