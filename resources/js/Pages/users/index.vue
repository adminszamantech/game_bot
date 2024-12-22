
<script setup>
    // import & export
    import { onMounted, defineProps, ref } from 'vue';
    import { router } from '@inertiajs/vue3';
    import Swal from 'sweetalert2';
    import App from '@/Layouts/App.vue';
    import $ from 'jquery';
    import 'datatables.net-bs5';


    // variables
    const props = defineProps({
        users: Array,
    });


    // methods
    const userStatusUpdate = (id) => {
        if(id){
            Swal.fire({
                title: "Are you sure?",
                text: "Do You won’t to status update!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Yes, update it!"
                }).then((result) => {
                if (result.isConfirmed) {
                    router.get(`users-status/${id}`)
                }
            });
        }
    };

    const userKYC = (id) => {
        alert(id);
    }

    const userDeposit = (id) => {
        alert(id);
    }

    const userWithdraw = (id) => {
        alert(id);
    }

    const userRefferal = (id) => {
        alert(id);
    }

    onMounted(() => {
        const tooltipTriggerList = Array.from(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
        tooltipTriggerList.forEach((tooltipTriggerEl) => {
            new bootstrap.Tooltip(tooltipTriggerEl);
        });
        $('#userTable').DataTable({
            language: {
                searchPlaceholder: 'Search here...'
            }
        });
    });
</script>

<template>
    <App>
        <div class="row">
            <div class="col-sm-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">User Lists</h4>
                    <div class="table-responsive">
                      <table id="userTable" class="table table-bordered text-center">
                        <thead class="bg-dark">
                          <tr>
                            <th> SL </th>
                            <th> Name </th>
                            <th> Email </th>
                            <th> Phone </th>
                            <th> Reffer Code </th>
                            <th> Reffer By </th>
                            <th> Joining </th>
                            <th> Is Active </th>
                            <th> Action </th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr v-for="(user, index) in users" :key="user.id">
                            <td> {{ index + 1 }} </td>
                            <td> {{ user.name ?? '-' }} </td>
                            <td>
                              {{ user.email ?? '-' }}
                            </td>
                            <td> {{ user.phone ?? '-' }} </td>
                            <td> {{ user.reffer_code ?? '-' }} </td>
                            <td> {{ user.reffer_code ?? '-' }} </td>
                            <td>
                                <p>{{ $formatDate(user.created_at) }}</p>
                                <p>{{ $formatTime(user.created_at) }}</p>
                             </td>
                            <td>
                                <h5 v-if="user.is_active == true">
                                    <span class="badge badge-success">Active</span>
                                </h5>
                                <h5 v-else="user.is_active == false">
                                    <span class="badge badge-danger">Inactive</span>
                                </h5>
                            </td>
                            <td class="">
                                <button type="button" @click="userKYC(user.id)" class="btn btn-info btn-rounded btn-icon mx-2" data-bs-toggle="tooltip" data-bs-placement="left" title="User KYC Information!">
                                    <i class="mdi mdi-file-document"></i>
                                </button>
                                <button type="button" @click="userDeposit(user.id)" class="btn btn-primary btn-rounded btn-icon mx-2" data-bs-toggle="tooltip" data-bs-placement="left" title="User Deposit Information!">
                                    <i class="mdi mdi-coin"></i>
                                </button>
                                <button type="button" @click="userWithdraw(user.id)" class="btn btn-secondary btn-rounded btn-icon mx-2" data-bs-toggle="tooltip" data-bs-placement="left" title="User Withdraw Information!">
                                    <i class="mdi mdi-coin"></i>
                                </button>
                                <button type="button" @click="userRefferal(user.id)" class="btn btn-success btn-rounded btn-icon mx-2" data-bs-toggle="tooltip" data-bs-placement="left" title="User Refferals History!">
                                    <i class="mdi mdi-file-tree"></i>
                                </button>
                                <button type="button" @click="userStatusUpdate(user.id)" class="btn btn-warning btn-rounded btn-icon mx-2" data-bs-toggle="tooltip" data-bs-placement="left" title="User Active/Inactive Status!">
                                    <i class="mdi mdi-account-key"></i>
                                </button>
                            </td>
                          </tr>

                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
        </div>
    </App>
</template>

<style>
.form-select{
    background-color: #191C24;
    color: white;
}
.dt-length label {
  display: none;
}
#dt-search-0 {
    color: white;
}
.dt-paging .pagination .page-link {
  color: inherit;
  background-color: inherit;
  border-color: inherit;
}
.dt-paging .pagination .page-link.disabled {
  color: inherit !important;
  background-color: transparent;
  border-color: transparent;
  pointer-events: none;
}
.dt-paging .pagination .active {
  color: black;
  background-color: white;
}
.swal2-popup{
    padding: 20px;
}
</style>
