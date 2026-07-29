<template>
  <section
    class="relative min-h-screen flex items-center justify-between px-8 md:px-16 overflow-hidden bg-gradient-to-r from-[#211a19] via-[#2d2220] to-[#3a2826]">

    <!-- Imagem de Fundo Dinâmica com Overlay Suave -->
    <transition name="fade" mode="out-in">
      <div :key="currentSlide"
        class="absolute inset-0 bg-cover bg-center transition-all duration-1000 transform scale-105"
        :style="{ backgroundImage: `url(${slides[currentSlide].image})` }">
        <div class="absolute inset-0 bg-black/40 backdrop-blur-[2px]"></div>
      </div>
    </transition>

    <!-- Conteúdo do Hero -->
    <div class="relative z-10 max-w-2xl mt-12">
      <!-- Tag de Categoria -->
      <div class="flex items-center gap-2 mb-4">
        <span class="w-8 h-[1px] bg-pink-300"></span>
        <span class="text-xs uppercase tracking-widest text-pink-200 font-medium">
          {{ slides[currentSlide].subtitle }}
        </span>
      </div>

      <!-- Título Serifado Grande -->
      <h1 class="text-5xl md:text-6xl font-serif leading-tight text-white mb-6">
        {{ slides[currentSlide].titlePart1 }}
        <span class="italic font-serif text-pink-300 font-light"> {{ slides[currentSlide].highlight1 }}</span>,
        <br />
        {{ slides[currentSlide].titlePart2 }}
        <span class="italic font-serif text-[#f2d096] font-light"> {{ slides[currentSlide].highlight2 }}</span>
      </h1>

      <!-- Descrição -->
      <p class="text-gray-300 text-sm md:text-base mb-8 max-w-lg leading-relaxed font-light">
        {{ slides[currentSlide].description }}
      </p>

      <!-- Botões de Ação (Agendar + WhatsApp) -->
      <div class="flex flex-wrap items-center gap-4 mb-12">
        <router-link to="/agendamento"
          class="px-8 py-3.5 bg-gradient-to-r from-pink-500 to-rose-400 text-white font-medium rounded-full shadow-lg shadow-pink-500/30 hover:shadow-pink-500/50 hover:scale-105 active:scale-95 transition-all duration-300 flex items-center gap-2">
          Agendar Agora &rarr;
        </router-link>

        <a href="https://wa.me/351912345678?text=Olá!%20Gostava%20de%20saber%20mais%20sobre%20os%20serviços%20de%20maquilhagem."
          target="_blank"
          class="px-6 py-3.5 border border-white/30 backdrop-blur-md text-white font-medium rounded-full hover:bg-white/10 hover:border-white/60 transition-all duration-300 flex items-center gap-2 text-sm">
          <svg class="w-4 h-4 fill-current" viewBox="0 0 24 24">
            <path
              d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.893 11.892-1.99-.001-3.951-.5-5.688-1.448l-6.305 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.462-4.415-9.89-9.881-9.892-5.452 0-9.887 4.434-9.889 9.884-.001 2.225.651 3.891 1.746 5.634l-.999 3.648 3.742-.981z" />
          </svg>
          Contactar WhatsApp
        </a>
      </div>

      <!-- Estatísticas Inferiores -->
      <div class="grid grid-cols-3 gap-6 pt-6 border-t border-white/10 max-w-md">
        <div>
          <h4 class="text-xl font-bold text-white">500+</h4>
          <p class="text-xs text-gray-400">Clientes Felizes</p>
        </div>
        <div>
          <h4 class="text-xl font-bold text-white">99%</h4>
          <p class="text-xs text-gray-400">Satisfação</p>
        </div>
        <div>
          <h4 class="text-xl font-bold text-white">100%</h4>
          <p class="text-xs text-gray-400">Produtos Premium</p>
        </div>
      </div>
    </div>

    <!-- Controlos do Slider (Setas) -->
    <button @click="prevSlide"
      class="absolute left-6 top-1/2 -translate-y-1/2 z-20 w-10 h-10 rounded-full border border-white/20 bg-black/20 backdrop-blur-sm text-white flex items-center justify-center hover:bg-white/20 transition-all">
      &#10094;
    </button>
    <button @click="nextSlide"
      class="absolute right-6 top-1/2 -translate-y-1/2 z-20 w-10 h-10 rounded-full border border-white/20 bg-black/20 backdrop-blur-sm text-white flex items-center justify-center hover:bg-white/20 transition-all">
      &#10095;
    </button>
  </section>
</template>

<script setup>
import { ref, onMounted, onUnmounted } from 'vue';

const currentSlide = ref(0);
let timer = null;

const slides = [
  {
    subtitle: "SERVIÇOS DE MAQUILHAGEM EXCLUSIVA",
    titlePart1: "Eleva O Teu",
    highlight1: "Brilho",
    titlePart2: "Define A Tua",
    highlight2: "Beleza",
    description: "Maquilhagem profissional para noivas, eventos e sessões fotográficas. Realça a tua beleza natural com produtos de alta durabilidade e acabamento impecável.",
    image: "https://images.unsplash.com/photo-1487412720507-e7ab37603c6f?q=80&w=1600&auto=format&fit=crop"
  },
  {
    subtitle: "MAQUILHAGEM DE NOIVAS & EVENTOS",
    titlePart1: "O Teu Dia",
    highlight1: "Especial",
    titlePart2: "Com Um Toque",
    highlight2: "Inesquecível",
    description: "Serviço personalizado ao domicílio ou no estúdio. Garantia de um look elegante e resistente a todas as emoções.",
    image: "https://images.unsplash.com/photo-1522337360788-8b13dee7a37e?q=80&w=1600&auto=format&fit=crop"
  }
];

const nextSlide = () => {
  currentSlide.value = (currentSlide.value + 1) % slides.length;
};

const prevSlide = () => {
  currentSlide.value = (currentSlide.value - 1 + slides.length) % slides.length;
};

onMounted(() => {
  timer = setInterval(nextSlide, 6000); // Muda automaticamente de 6 em 6 segundos
});

onUnmounted(() => {
  clearInterval(timer);
});
</script>

<style scoped>
.fade-enter-active,
.fade-leave-active {
  transition: opacity 1s ease;
}

.fade-enter-from,
.fade-leave-to {
  opacity: 0;
}
</style>