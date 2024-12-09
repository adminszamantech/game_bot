<script setup>
import { reactive } from 'vue';
import { Link, router } from '@inertiajs/vue3';

const form = reactive({
  otp: '',
  password: '',
});

const resetPassword = () => {
    if (form.password.length < 4) return iziToast.error({ title: 'Error', message: 'Password must be at least 4 characters long', position: 'topRight' });
  router.post('/reset-password', form, {
    onSuccess: () => {
      iziToast.success({
        title: 'Success',
        message: 'Password Reset Successfully',
        position: 'topRight',
      });
    },
    onError: (errors) => {
      iziToast.error({
        title: 'Error',
        message: errors.opt,
        position: 'topRight',
      });
    },
  });
};
</script>

<template>
  <div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
      <div class="row w-100 m-0">
        <div class="content-wrapper full-page-wrapper d-flex align-items-center auth login-bg">
          <div class="card col-lg-4 mx-auto">
            <div class="card-body px-5 py-5">
              <h3 class="card-title text-center mb-3">Admin Reset Password</h3>
              <form @submit.prevent="resetPassword">
                <div class="form-group">
                  <label>OTP *</label>
                  <input type="number" v-model="form.otp" class="form-control p_input text-white" placeholder="Enter OTP" required>
                </div>
                <div class="form-group">
                  <label>Reset Password *</label>
                  <input type="password" v-model="form.password" class="form-control p_input text-white" placeholder="Enter Reset Password" minlength="4" required>
                </div>
                <div class="form-group d-flex align-items-center justify-content-between">
                  <div>
                    <Link :href="route('forgotPassword')" class="forgot-pass text-danger">Goto Reset Page?</Link>
                    </div>
                  <div class="text-center">
                    <button type="submit" class="btn btn-primary py-2">Reset Password</button>
                    </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>
