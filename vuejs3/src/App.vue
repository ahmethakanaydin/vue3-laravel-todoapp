<template>
  <nav class="bg-purple-600 text-white">
    <div class="container mx-auto">
      <div class="flex items-center">
        <router-link
          to="/"
          class="inline-block px-16 py-4 transition-colors hover:bg-purple-500 duration-300"
          >Ana Sayfa</router-link
        >
        <router-link
          to="/login"
          class="inline-block px-16 py-4 transition-colors hover:bg-purple-500 duration-300"
          >Çıkış Yap</router-link
        >
      </div>
    </div>
  </nav>
  <router-view />
</template>
