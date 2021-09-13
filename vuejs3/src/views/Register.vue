<template>
  <main class="form-signin container card mt-5 form-area">
    <form>
      <h1 class="h3 mb-3 fw-normal mt-4">Kayıt Ol</h1>

      <div class="form-floating ">
        <input
          type="text"
          class="form-control mb-2"
          placeholder="Ahmet Aydın"
          required
        />
        <label for="floatingInput">Ad Soyad</label>
      </div>
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
        Kayıt Ol
      </button>
      <div className="w-100 text-center mt-2 mb-4">
        <router-link to="/login">Hesabım yok</router-link>
      </div>
    </form>
  </main>
</template>

<script>
export default {
  name: "Register",
};
</script>

<style scoped>
.form-area {
  max-width: 400px !important;
  margin-top: 200px !important;
}
</style>
