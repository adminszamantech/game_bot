<script setup>
import { Link, usePage } from '@inertiajs/vue3';
import { ref } from 'vue';
import Footer from './Footer_admin.vue';
import Sidebar from './Sidebar_admin.vue';
import Navbar from './Navbar_admin.vue';

const sidebarActive = ref(false);
const user = usePage().props.user;

const toggleSidebar = () => {
  sidebarActive.value = !sidebarActive.value;
  document.body.classList.toggle('sidebar-icon-only', sidebarActive.value);
};

const toggleMiniSidebar = () => {
  document.getElementById('sidebar')?.classList.toggle('active');
};
</script>


<template>
    <div class="container-scroller">
    <Sidebar :user="user"/>
    <div class="container-fluid page-body-wrapper">

      <Navbar :user="user" :toggle-sidebar="toggleSidebar" />
        <div class="main-panel">
          <div class="content-wrapper">
            <main>
                <slot />
            </main>
          </div>
          <Footer/>
        </div>
      </div>
    </div>
</template>
