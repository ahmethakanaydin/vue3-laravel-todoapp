<template>
  <nav class="bg-red-600 text-white">
    <div class="container mx-auto">
      <div class="flex items-center">
        <router-link
          to="/"
          class="inline-block px-16 py-4 transition-colors hover:bg-red-500 duration-300"
          >Çıkış Yap</router-link
        >
      </div>
    </div>
  </nav>
</template>

<style scoped>
.router-link-exact-active {
  background-color: #c03f3f;
}
</style>
