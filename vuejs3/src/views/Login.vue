<template>
  <main class="form-signin container card mt-5 form-area">
    <form>
      <div v-if="error" class="alert alert-danger mt-3" role="alert">
        {{ error }}
      </div>
      <div v-if="success" class="alert alert-success mt-3" role="alert">
        {{ success }}
      </div>
      <h1 class="h3 mb-3 fw-normal mt-4">Giriş Yap</h1>
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
        v-on:click.prevent="login"
        class="w-100 btn btn-lg btn-primary mt-3"
        type="submit"
      >
        Giriş Yap
      </button>
      <div className="w-100 text-center mt-2 mb-4">
        <router-link to="/register">Hesabım yok</router-link>
      </div>
    </form>
  </main>
</template>

<script>
import axios from "axios";
export default {
  name: "Login",
  data() {
    return {
      user: {
        email: "",
        password: "",
      },
      error: "",
      success: "",
    };
  },
  methods: {
    async login() {
      try {
        await axios
          .post("http://localhost:8000/api/login", this.user)
          .then((save_response) => {
            console.log(save_response.data.status);
            this.$router.push("/todos");
            this.success = "Başarı İle Giriş Yapıldı..";
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

.bd-placeholder-img {
  font-size: 1.125rem;
  text-anchor: middle;
  -webkit-user-select: none;
  -moz-user-select: none;
  user-select: none;
}

@media (min-width: 768px) {
  .bd-placeholder-img-lg {
    font-size: 3.5rem;
  }
}
</style>
