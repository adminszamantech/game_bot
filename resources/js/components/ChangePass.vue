<script setup>
    // import & export
    import { reactive } from 'vue';
    import { router } from '@inertiajs/vue3';

    // variables
    const form = reactive({
        currentPassword: "",
        newPassword: ""
    })

    // methods
    const changePassword = () => {
        if (form.newPassword.length < 4) return iziToast.error({ title: 'Error', message: 'Password must be at least 4 characters long', position: 'topRight' });
        router.post('/change-password',form, {
            onSuccess: () => {
                iziToast.success({
                    title: 'Success',
                    message: 'Password Changed Successfully!',
                    position: 'topRight',
                });
                form.currentPassword = "";
                form.newPassword = "";
            },
            onError: (errors) => {
                iziToast.error({
                    title: 'Error',
                    message: errors.password,
                    position: 'topRight',
                });
                form.currentPassword = "";
                form.newPassword = "";
            },
        });
    }

    const formReset = () => {
        form.currentPassword = "";
        form.newPassword = "";
    }

</script>
<template>
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                  <div class="card-body">
                    <h4 class="card-title text-center">Change Password</h4>
                    <form @submit.prevent="changePassword" class="forms-sample">
                      <div class="form-group">
                        <label for="exampleInputPassword1">Current Password</label>
                        <input type="password" v-model="form.currentPassword" class="form-control text-white" id="exampleInputPassword1" placeholder="Current Password" required>
                      </div>
                      <div class="form-group">
                        <label for="exampleInputConfirmPassword1">New Password</label>
                        <input type="password" v-model="form.newPassword" class="form-control text-white" id="exampleInputConfirmPassword1" placeholder="New Password" minLength="4" required>
                      </div>
                      <button type="submit" class="btn btn-primary me-2">Change Password</button>
                      <button class="btn btn-dark" @click="formReset">Cancel</button>
                    </form>
                </div>

            </div>
        </div>
    </div>
</template>
