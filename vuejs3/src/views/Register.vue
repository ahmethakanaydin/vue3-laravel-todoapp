<template>
  <main class="form-signin container card mt-5 form-area">
    <form>
      <div v-if="error" class="alert alert-danger mt-3" role="alert">
        {{ error }}
      </div>
      <h1 class="h3 mb-3 fw-normal mt-4">Kayıt Ol</h1>

      <div class="form-floating ">
        <input
          v-model="user.name"
          type="text"
          class="form-control mb-2"
          placeholder="Ahmet Aydın"
          required
        />
        <label for="floatingInput">Ad Soyad</label>
      </div>
      <div class="form-floating ">
        <input
          v-model="user.email"
          type="email"
          class="form-control mb-2"
          placeholder="isim@mail.com"
          required
        />
        <label for="floatingInput">E-Posta</label>
      </div>
      <div class="form-floating">
        <input
          v-model="user.password"
          type="password"
          class="form-control"
          placeholder="Şifre"
          required
        />
        <label for="floatingPassword">Şifre</label>
      </div>

      <button
        v-on:click.prevent="register"
        class="w-100 btn btn-lg btn-primary mt-3"
        type="submit"
      >
        Kayıt Ol
      </button>
      <div className="w-100 text-center mt-2 mb-4">
        <router-link to="/">Hesabım yok</router-link>
      </div>
    </form>
  </main>
</template>

<script>
import axios from "axios";
export default {
  name: "Register",

  data() {
    return {
      user: {
        name: "",
        email: "",
        password: "",
      },
      error: "",
    };
  },

  methods: {
    register() {
      try {
        axios
          .post("http://localhost:8000/api/register", this.user)
          .then((save_response) => {
            console.log(save_response);
            this.$router.push("/");
          });
      } catch (err) {
        console.log(err);
        this.error = `Bir Hata Oluştu! ${err.message}`;
      }
    },
  },
};
</script>

<style scoped>
.form-area {
  max-width: 400px !important;
  margin-top: 200px !important;
}
</style>
