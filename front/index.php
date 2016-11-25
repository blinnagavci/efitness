<?php require('parts/header.php'); ?>

<div class="main-left">
    <h2>Main navigation</h2>
    <ul>
        <li>
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
        </li>
    </ul>
</div>
</div>
<div class="main-right">
    <h1>Manage Member</h1>
    <div class="main-box">
        <form id="member-form">
            <div class="left-form-content">
                <label>First Name</label>
                <input type="text" id="member_firstname" placeholder="First Name"/> 
                <label>Last Name</label>
                <input type="text" id="member_surname" placeholder="Last Name"/> 
                <label>Residential Address</label>
                <input type="text" id="member_name" placeholder="Enter Residential Address"/> 
                <label>City</label>
                <input type="text" id="member_city" placeholder="Enter City"/> 
                <label>Telephone No.</label>
                <span class="telephone">
                    <input type="text" id="member_telephone" placeholder="Enter Telephone Number"/>
                </span>
                <label>Mobile No.</label>
                <span class="telephone">
                    <input type="text" id="member_mobile" placeholder="Enter Mobile Number"/>
                </span>
                <label>E-mail</label>
                <span class="email">
                    <input type="email" id="member_email" placeholder="Enter Email"/>
                </span>
                <label>Birth Date</label>
<!--                <input class="date-picker" type="date" id="member_date"/>-->
            </div>
            <div class="right-form-content">
                <label>Member Photo</label>
                <img class="member-photo" src="repository/no_image.png" alt="Photo"/>
                <label>Upload from Computer</label>
                <input type="file" id="member_upload"/>
                <label>Membership Type</label>
                <select>
                    <option value="select">Select</option>
                    <option value="yearly">Yearly</option>
                    <option value="monthly">Monthly</option>
                    <option value="weekly">Weekly</option>
                </select>
            </div>
        </form>
    </div>
</div>
<?php
require('parts/footer.php');
