<script setup >
    import { Link} from '@inertiajs/inertia-vue3';
</script>

<template>
    <nav class="sidebar sidebar-offcanvas"  id="sidebar">
    <div class="sidebar-brand-wrapper d-none d-lg-flex align-items-center justify-content-center fixed-top">
        <Link class="sidebar-brand brand-logo" :href="route('dashboard')"><img src="/public/storage/assets/images/logo.svg" alt="logo" /></Link>
        <Link class="sidebar-brand brand-logo-mini" :href="route('dashboard')"><img src="/public/storage/assets/images/logo-mini.svg" alt="logo" /></Link>
    </div>
    <ul class="nav">
        <li class="nav-item profile">
        <div class="profile-desc">
            <div class="profile-pic">
            <div class="profile-name">
                <h5 class="mb-0 font-weight-normal">Saurov Saha</h5>
            </div>
            </div>
            <a href="#" id="profile-dropdown" data-bs-toggle="dropdown"><i class="mdi mdi-dots-vertical"></i></a>
            <div class="dropdown-menu dropdown-menu-right sidebar-dropdown preview-list" aria-labelledby="profile-dropdown">
            <a href="#" class="dropdown-item preview-item">
                <div class="preview-thumbnail">
                <div class="preview-icon bg-dark rounded-circle">
                    <i class="mdi mdi-settings text-primary"></i>
                </div>
                </div>
                <div class="preview-item-content">
                <p class="preview-subject ellipsis mb-1 text-small">Account settings</p>
                </div>
            </a>
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item preview-item">
                <div class="preview-thumbnail">
                <div class="preview-icon bg-dark rounded-circle">
                    <i class="mdi mdi-onepassword  text-info"></i>
                </div>
                </div>
                <div class="preview-item-content">
                <p class="preview-subject ellipsis mb-1 text-small">Change Password</p>
                </div>
            </a>
            <div class="dropdown-divider"></div>
            <Link :href="route('logout')" class="dropdown-item preview-item">
                <div class="preview-thumbnail">
                <div class="preview-icon bg-dark rounded-circle">
                    <i class="mdi mdi-calendar-today text-success"></i>
                </div>
                </div>
                <div class="preview-item-content">
                <p class="preview-subject ellipsis mb-1 text-small">Logout</p>
                </div>
            </Link>
            </div>
        </div>
        </li>
        <li class="nav-item menu-items">
        <a class="nav-link" href="index.html">
            <span class="menu-icon">
            <i class="mdi mdi-speedometer"></i>
            </span>
            <span class="menu-title">Dashboard</span>
        </a>
        </li>
        <li class="nav-item menu-items">
        <a class="nav-link" data-bs-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
            <span class="menu-icon">
            <i class="mdi mdi-laptop"></i>
            </span>
            <span class="menu-title">Basic UI Elements</span>
            <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="ui-basic">
            <ul class="nav flex-column sub-menu">
            <li class="nav-item"> <a class="nav-link" href="pages/ui-features/buttons.html">Buttons</a></li>
            <li class="nav-item"> <a class="nav-link" href="pages/ui-features/dropdowns.html">Dropdowns</a></li>
            <li class="nav-item"> <a class="nav-link" href="pages/ui-features/typography.html">Typography</a></li>
            </ul>
        </div>
        </li>
    </ul>
    </nav>
</template>