<aside id="left-sidebar-nav">
    <ul id="slide-out" class="side-nav fixed leftside-navigation">
        <li class="user-details cyan darken-2">
            <div class="row">
                <div class="col col s4 m4 l4">
                    <img src="<?= base_url('theme/');?>images/avatar/avatar-7.png" alt="" class="circle responsive-img valign profile-image cyan">
                </div>
                <div class="col col s8 m8 l8">
                    <ul id="profile-dropdown-nav" class="dropdown-content">
                        <li>
                            <a href="#" class="grey-text text-darken-1">
                                <i class="material-icons">face</i> Profile</a>
                        </li>
                        <li>
                            <a href="#" class="grey-text text-darken-1">
                                <i class="material-icons">settings</i> Settings</a>
                        </li>
<!--                        <li>-->
<!--                            <a href="#" class="grey-text text-darken-1">-->
<!--                                <i class="material-icons">live_help</i> Help</a>-->
<!--                        </li>-->
                        <li class="divider"></li>
<!--                        <li>-->
<!--                            <a href="#" class="grey-text text-darken-1">-->
<!--                                <i class="material-icons">lock_outline</i> Lock</a>-->
<!--                        </li>-->
                        <li>
                            <a href="<?= base_url('logout'); ?>" class="grey-text text-darken-1">
                                <i class="material-icons">keyboard_tab</i> Logout</a>
                        </li>
                    </ul>
                    <a class="btn-flat dropdown-button waves-effect waves-light white-text profile-btn" href="#" data-activates="profile-dropdown-nav"><?= $this->session->userdata("username")?><i class="material-icons right">arrow_drop_down</i></a>
                    <p class="user-roal"><?= $this->session->userdata("userroles")?></p>
                </div>
            </div>
        </li>
        <li class="no-padding">
            <ul class="collapsible" data-collapsible="accordion">
                <li class="bold">
                    <a href="<?= base_url();?>" class="waves-effect waves-cyan">
                        <i class="material-icons">pie_chart_outlined</i>
                        <span class="nav-text">แดชบอร์ด</span>
                    </a>
                </li>
                <li class="bold">
                    <a href="<?= base_url('home');?>" class="waves-effect waves-cyan">
                        <i class="material-icons">view_carousel</i>
                        <span class="nav-text">สไลด์ โฮม</span>
                    </a>
                </li>
<!--                <li class="bold">-->
<!--                    <a href="--><?//= base_url();?><!--" class="waves-effect waves-cyan">-->
<!--                        <i class="material-icons">business</i>-->
<!--                        <span class="nav-text">เกี่ยวกับเรา</span>-->
<!--                    </a>-->
<!--                </li>-->

<!--                <li class="bold">-->
<!--                    <a class="waves-effect waves-cyan dropdown-button" data-activates="dropdownService">-->
<!--                        <i class="material-icons">video_call</i>-->
<!--                        <span class="nav-text">CCTV</span>-->
<!--                        <i class="material-icons right">arrow_drop_down</i>-->
<!--                    </a>-->
<!--                    <ul class="dropdown-content" id="dropdownService" style="right: 0px;">-->
<!--                        <li>-->
<!--                            <a href="--><?//= base_url('product'); ?><!--" class="grey-text text-darken-1">สินค้า</a>-->
<!--                        </li>-->
<!--                        <li>-->
<!--                            <a href="--><?//= base_url('promotion'); ?><!--" class="grey-text text-darken-1">โปรโมชั่น</a>-->
<!--                        </li>-->
<!--                    </ul>-->
<!--                </li>-->
                <li class="bold">
                    <a href="<?= base_url('portfolio');?>" class="waves-effect waves-cyan">
                        <i class="material-icons">recent_actors</i>
                        <span class="nav-text">ผลงาน</span>
                    </a>
                </li>
<!--                <li class="bold">-->
<!--                    <a href="--><?//= base_url('theme/');?><!--css-typography.html" class="waves-effect waves-cyan">-->
<!--                        <i class="material-icons">contact_phone</i>-->
<!--                        <span class="nav-text">ติดต่อเรา</span>-->
<!--                    </a>-->
<!--                </li>-->
            </ul>
        </li>
    </ul>
    <a href="#" data-activates="slide-out" class="sidebar-collapse btn-floating btn-medium waves-effect waves-light hide-on-large-only">
        <i class="material-icons">menu</i>
    </a>
</aside>