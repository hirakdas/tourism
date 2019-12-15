<div class="app-sidebar sidebar-shadow">
    <div class="app-header__logo">
        <div class="logo-src"></div>
        <div class="header__pane ml-auto">
            <div>
                <button type="button" class="hamburger close-sidebar-btn hamburger--elastic" data-class="closed-sidebar">
                                    <span class="hamburger-box">
                                        <span class="hamburger-inner"></span>
                                    </span>
                </button>
            </div>
        </div>
    </div>
    <div class="app-header__mobile-menu">
        <div>
            <button type="button" class="hamburger hamburger--elastic mobile-toggle-nav">
                                <span class="hamburger-box">
                                    <span class="hamburger-inner"></span>
                                </span>
            </button>
        </div>
    </div>
    <div class="app-header__menu">
                        <span>
                            <button type="button" class="btn-icon btn-icon-only btn btn-primary btn-sm mobile-toggle-header-nav">
                                <span class="btn-icon-wrapper">
                                    <i class="fa fa-ellipsis-v fa-w-6"></i>
                                </span>
                            </button>
                        </span>
    </div>
    <div class="scrollbar-sidebar">
        <div class="app-sidebar__inner">
            <ul class="vertical-nav-menu">
                <li class="app-sidebar__heading">Bookings</li>
                <li>
                    <a href="index.html" class="mm-active">
                        <i class="metismenu-icon pe-7s-rocket"></i>
                        View Bookings
                    </a>
                </li>
                <li class="app-sidebar__heading">Destination</li>
                <li>
                    <a href="<?= base_url('admin/view_destination');?>">
                        <i class="metismenu-icon pe-7s-display2"></i>
                        View Destination
                    </a>
                </li>
                <li>
                    <a href="<?= base_url('admin/add_destination');?>">
                        <i class="metismenu-icon pe-7s-display2"></i>
                        Add Destination
                    </a>
                </li>
                <li class="app-sidebar__heading">Destination Details</li>
                <li>
                    <a href="<?= base_url('admin/view_destination_details');?>">
                        <i class="metismenu-icon pe-7s-display2"></i>
                        View Destination Details
                    </a>
                </li>
                <li>
                    <a href="<?= base_url('admin/add_destination_details');?>">
                        <i class="metismenu-icon pe-7s-display2"></i>
                        Add Destination Details
                    </a>
                </li>

            </ul>
        </div>
    </div>
</div>