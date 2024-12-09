<script setup>
import { reactive } from 'vue';
import { Link, router } from '@inertiajs/vue3';


const form = reactive({
  email: '',
});

const otpSend = () => {
  router.post('/forgot-password', form, {
    onSuccess: () => {
      iziToast.success({
        title: 'Success',
        message: 'OTP Sent to Your Email.',
        position: 'topRight',
      });
    },
    onError: (errors) => {
        console.log(errors);
      iziToast.error({
        title: 'Error',
        message: errors.otp,
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
              <h3 class="card-title text-center mb-3">Admin Forgot Password OTP</h3>
              <form @submit.prevent="otpSend">
                <div class="form-group">
                  <label>Email *</label>
                  <input type="email" v-model="form.email" class="form-control p_input text-white" placeholder="Enter Email Address" required>
                </div>
                <div class="form-group d-flex align-items-center justify-content-between">
                  <div>
                    <Link :href="route('login')" class="forgot-pass text-danger">Goto Login Page?</Link>
                    </div>
                  <div class="text-center">
                    <button type="submit" class="btn btn-primary py-2">Send OTP</button>
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
