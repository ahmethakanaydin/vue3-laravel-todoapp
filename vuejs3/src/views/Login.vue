<template>
  <main class="form-signin container card mt-5 form-area">
    <form>
      <h1 class="h3 mb-3 fw-normal mt-4">Giriş Yap</h1>

      <div class="form-floating ">
        <input
          type="email"
          class="form-control mb-2"
          placeholder="isim@örnek.com"
          required
        />
        <label for="floatingInput">E-Posta</label>
      </div>
      <div class="form-floating">
        <input
          type="password"
          class="form-control"
          placeholder="Şifre"
          required
        />
        <label for="floatingPassword">Şifre</label>
      </div>

      <button class="w-100 btn btn-lg btn-primary mt-3" type="submit">
        Giriş Yap
      </button>
      <div className="w-100 text-center mt-2 mb-4">
        <router-link to="/register">Hesabım yok</router-link>
      </div>
    </form>
  </main>
</template>

<script>
export default {
  name: "Login",
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
