<script lang="ts">
import { backendApi } from '@/utils/BackendApi'
export default {
  name: 'LoginView',
  data() {
    return {
      email: '',
      password: '',
      classButtonSubmit: 'disable' // disable, active
    }
  },
  methods: {
    onSubmit() {
      backendApi
        .post('login', { email: this.email, password: this.password })
        .then((res) => console.log(res))
    }
  },
  beforeUpdate() {
    if (this.email && this.password) {
      this.classButtonSubmit = 'active'
    } else {
      this.classButtonSubmit = 'disable'
    }
  }
}
</script>

<template>
  <div class="login">
    <div class="form-groups">
      <div class="title">Login</div>
      <div class="input-wrapper">
        <input placeholder="Enter Email" v-model="email" type="text" />
      </div>
      <div class="input-wrapper">
        <input class="input" placeholder="Enter Password" type="password" v-model="password" />
      </div>
    </div>
    <div class="button">
      <div :class="classButtonSubmit" @click="onSubmit">Login</div>
    </div>
    <div class="question">
      No account?
      <span class="link"> Register here</span>
    </div>
  </div>
</template>

<style lang="scss">
.register,
.login {
  width: 100%;
  display: flex;
  margin: auto;
  flex-direction: column;
  padding: 1.2rem;

  .form-groups {
    display: flex;
    justify-content: center;
    flex-direction: column;
    width: 320px;
    gap: 0.8rem;
    margin: auto;
    margin-bottom: 1.4rem;
    .title {
      width: fit-content;
      font-size: 24px;
      font-weight: 700;
      line-height: 29.05px;
      text-align: left;
      color: #ffffff;
      margin-bottom: 1rem;
      margin-left: 1rem;
    }
    .input-wrapper {
      width: 100%;
      display: flex;
      border-radius: 9px;
      background: rgba(255, 255, 255, 0.06);
      align-items: center;
      overflow: hidden;
      input {
        width: 100%;
        border-radius: 9px;
        border: none;
        padding: 0.5rem;
        background: rgba(255, 255, 255, 0.06);

        color: rgba(255, 255, 255, 1);
        font-size: 13px;
        font-weight: 500;
        line-height: 16px;
      }
      input:focus {
        border: none;
        outline: none;
      }
      input::placeholder {
        color: rgba(255, 255, 255, 0.4);
      }
    }
  }

  .button {
    display: flex;
    justify-content: center;
    margin: auto;
    width: 320px;
    div {
      width: 100%;
      padding: 0.8rem;
      border-radius: 0.5rem;
      cursor: pointer;

      font-size: 16px;
      font-weight: 700;
      line-height: 19.36px;
      letter-spacing: -0.23281481862068176px;
      text-align: center;
      &.disable {
        background: linear-gradient(
          108.32deg,
          rgba(98, 205, 203, 0.5) 24.88%,
          rgba(69, 153, 219, 0.5) 78.49%
        );
        color: rgba(255, 255, 255, 0.5);
      }
      &.active {
        background: linear-gradient(108.32deg, #62cdcb 24.88%, #4599db 78.49%);
        color: rgba(255, 255, 255, 1);
      }
    }
  }

  .question {
    margin-top: 2rem;
    font-size: 13px;
    font-weight: 500;
    line-height: 15.73px;
    text-align: center;
    color: rgba(255, 255, 255, 1);
    .link {
      color: #94783e;
    }
  }
}
</style>
