<template>

    <Head title="Maquilhagem Profissional" />

    <div class="min-h-screen bg-[#1c1817] text-white font-sans selection:bg-pink-500 selection:text-white">

        <!-- NAVBAR FIXA -->
        <nav
            class="fixed top-0 left-0 right-0 z-50 bg-[#1c1817]/80 backdrop-blur-md border-b border-white/10 px-6 py-4 flex items-center justify-between">
            <div class="text-xl font-serif font-bold tracking-wider font-light text-yellow-100">
                INÊS NETO <span class="text-xs font-sans tracking-widest text-gray-400 block uppercase">Makeup
                    Artist</span>
            </div>

            <div class="hidden md:flex items-center gap-8 text-sm font-medium text-gray-300">
                <a href="#hero" class="hover:text-pink-300 transition-colors">Início</a>
                <a href="#portfolio" class="hover:text-pink-300 transition-colors">Portefólio</a>
                <a href="#orcamento" class="hover:text-pink-300 transition-colors">Orçamentos</a>
                <a href="#booking" class="hover:text-pink-300 transition-colors">Marcações</a>
            </div>

            <a href="#orcamento"
                class="px-5 py-2.5 bg-gradient-to-r from-pink-500 to-rose-400 text-white text-sm font-medium rounded-full shadow-lg shadow-pink-500/20 hover:scale-105 active:scale-95 transition-all">
                Solicitar Orçamento
            </a>

            <a href="#booking"
                class="px-5 py-2.5 bg-gradient-to-r from-pink-500 to-rose-400 text-white text-sm font-medium rounded-full shadow-lg shadow-pink-500/20 hover:scale-105 active:scale-95 transition-all">
                Agendar Vaga
            </a>
        </nav>

        <!-- 1. HERO SECTION COM SLIDER E ESTILO LUXUOSO -->
        <section id="hero" class="relative min-h-screen flex items-center bg-[#1c1817] overflow-hidden pt-20">
            <div class="container mx-auto px-6 md:px-12 grid md:grid-cols-2 gap-12 items-center z-10">
                <!-- COLUNA DA ESQUERDA: CONTEÚDO (TEXTO E BOTÕES) -->
                <div class="max-w-2xl py-12">
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
                        <span class="italic font-serif text-pink-300 font-light"> {{ slides[currentSlide].highlight1
                        }}</span>,
                        <br />
                        {{ slides[currentSlide].titlePart2 }}
                        <span class="italic font-serif text-[#f2d096] font-light"> {{ slides[currentSlide].highlight2
                        }}</span>
                    </h1>

                    <!-- Descrição -->
                    <p class="text-gray-300 text-sm md:text-base mb-8 max-w-lg leading-relaxed font-light">
                        {{ slides[currentSlide].description }}
                    </p>

                    <!-- Botões de Ação (Agendar + WhatsApp) -->
                    <div class="flex flex-wrap items-center gap-4 mb-12">
                        <a href="#booking"
                            class="px-8 py-3.5 bg-gradient-to-r from-pink-500 to-rose-400 text-white font-medium rounded-full shadow-lg shadow-pink-500/30 hover:shadow-pink-500/50 hover:scale-105 active:scale-95 transition-all duration-300 flex items-center gap-2">
                            Agendar Agora &rarr;
                        </a>

                        <a :href="whatsappUrl" target="_blank"
                            class="px-6 py-3.5 border border-white/30 backdrop-blur-md text-white font-medium rounded-full hover:bg-white/10 hover:border-white/60 transition-all duration-300 flex items-center gap-2 text-sm">
                            <svg class="w-4 h-4 fill-current text-green-400" viewBox="0 0 24 24">
                                <path
                                    d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.893 11.892-1.99-.001-3.951-.5-5.688-1.448l-6.305 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.462-4.415-9.89-9.881-9.892-5.452 0-9.887 4.434-9.889 9.884-.001 2.225.651 3.891 1.746 5.634l-.999 3.648 3.742-.981z" />
                            </svg>
                            Contactar WhatsApp
                        </a>
                    </div>

                    <!-- Destaques dos Tipos de Maquilhagem -->
                    <div class="grid grid-cols-3 gap-4 pt-6 border-t border-white/10 max-w-md">
                        <div>
                            <h4 class="text-sm font-bold text-pink-300 uppercase tracking-wider">Noivas</h4>
                            <p class="text-xs text-gray-400 mt-0.5">Atendimento Exclusivo</p>
                        </div>
                        <div>
                            <h4 class="text-sm font-bold text-pink-300 uppercase tracking-wider">Social</h4>
                            <p class="text-xs text-gray-400 mt-0.5">Eventos & Festas</p>
                        </div>
                        <div>
                            <h4 class="text-sm font-bold text-pink-300 uppercase tracking-wider">Editorial</h4>
                            <p class="text-xs text-gray-400 mt-0.5">Sessões & Fotos</p>
                        </div>
                    </div>
                </div>

                <div class="relative h-[400px] md:h-[600px] w-full flex items-center justify-center">
                    <transition name="fade-slide-lg" mode="out-in">
                        <div :key="currentSlide"
                            class="absolute inset-0 w-full h-full rounded-3xl overflow-hidden shadow-2xl shadow-black/50 border border-white/10">
                            <!-- Usamos tag <img> para maior controlo de foco com object-cover -->
                            <img :src="slides[currentSlide].image" class="w-full h-full object-cover"
                                :class="slides[currentSlide].position || 'object-center'"
                                :alt="slides[currentSlide].titlePart1" />
                            <!-- Overlay muito mais suave para não escurecer a foto -->
                            <div class="absolute inset-0 bg-black/10"></div>
                        </div>
                    </transition>
                </div>
            </div>

            <!-- Controlos do Slider -->
            <button @click="prevSlide"
                class="absolute left-4 top-1/2 -translate-y-1/2 z-20 w-10 h-10 rounded-full border border-white/10 bg-black/30 backdrop-blur-sm text-white flex items-center justify-center hover:bg-pink-500/20 transition-all">
                &#10094;
            </button>
            <button @click="nextSlide"
                class="absolute right-4 top-1/2 -translate-y-1/2 z-20 w-10 h-10 rounded-full border border-white/10 bg-black/30 backdrop-blur-sm text-white flex items-center justify-center hover:bg-pink-500/20 transition-all">
                &#10095;
            </button>
        </section>

        <!-- NOVA SECÇÃO 2: ORÇAMENTOS E PDFs -->
        <section id="orcamento" class="py-20 px-6 bg-[#1c1817] border-t border-white/5">
            <div class="max-w-6xl mx-auto">
                <!-- Cabeçalho da Secção -->
                <div class="text-center mb-14">
                    <span class="text-xs uppercase tracking-widest text-pink-300 font-medium">Tabelas & Pacotes</span>
                    <h2 class="text-3xl md:text-4xl font-serif font-bold text-white mt-2">Orçamentos & Serviços</h2>
                    <p class="text-gray-400 text-sm mt-2 max-w-lg mx-auto">
                        Consulta detalhadamente todas as opções, pacotes para noivas e termos dos nossos serviços.
                    </p>
                </div>

                <!-- Grelha de Documentos PDF -->
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    <div v-for="(doc, index) in documents" :key="index"
                        class="bg-[#251e1d] border border-white/10 rounded-2xl p-6 flex flex-col justify-between hover:border-pink-500/40 transition-all duration-300 group shadow-lg">

                        <div>
                            <!-- Ícone PDF -->
                            <div
                                class="w-12 h-12 rounded-xl bg-pink-500/10 border border-pink-500/20 flex items-center justify-center mb-4 group-hover:scale-110 transition-transform">
                                <svg class="w-6 h-6 text-pink-300" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z" />
                                </svg>
                            </div>

                            <h3 class="text-lg font-serif font-semibold text-white mb-2">{{ doc.title }}</h3>
                            <p class="text-xs text-gray-400 font-light leading-relaxed mb-6">{{ doc.description }}</p>
                        </div>

                        <!-- Botões de Ação -->
                        <div class="flex items-center gap-3 pt-4 border-t border-white/5">
                            <button @click="openPdf(doc.file)"
                                class="flex-1 py-2.5 px-3 bg-white/5 hover:bg-pink-500/20 text-white hover:text-pink-300 border border-white/10 hover:border-pink-500/30 rounded-xl text-xs font-medium transition-all text-center flex items-center justify-center gap-2">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M24 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                                Ler PDF
                            </button>

                            <a :href="doc.file" download
                                class="p-2.5 bg-white/5 hover:bg-white/10 border border-white/10 text-gray-300 hover:text-white rounded-xl transition-all"
                                title="Descarregar PDF">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4" />
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- MODAL / LEITOR DE PDF INTEGRADO -->
            <div v-if="selectedPdf"
                class="fixed inset-0 z-50 bg-black/80 backdrop-blur-md flex items-center justify-center p-4 md:p-8"
                @click.self="closePdf">
                <div
                    class="bg-[#251e1d] border border-white/20 rounded-3xl w-full max-w-5xl h-[85vh] flex flex-col overflow-hidden shadow-2xl">
                    <div class="px-6 py-4 border-b border-white/10 flex items-center justify-between bg-[#1c1817]">
                        <h3 class="text-sm font-medium text-white flex items-center gap-2">
                            <span class="w-2 h-2 rounded-full bg-pink-400"></span>
                            Visualizador de Documentos
                        </h3>
                        <button @click="closePdf"
                            class="text-gray-400 hover:text-white p-1 rounded-lg hover:bg-white/10 transition-all text-sm">
                            ✕ Fechar
                        </button>
                    </div>
                    <div class="flex-1 bg-gray-900">
                        <iframe :src="selectedPdf" class="w-full h-full border-0"></iframe>
                    </div>
                </div>
            </div>
        </section>

        <!-- 3. SECÇÃO DE MARCAÇÕES (INTEGRADA COM O NOSSO BOOKINGFORM) -->
        <section id="booking" class="py-20 px-6 bg-[#251e1d]">
            <div class="max-w-4xl mx-auto">
                <div class="text-center mb-12">
                    <span class="text-xs uppercase tracking-widest text-pink-300 font-medium">Agenda Online</span>
                    <h2 class="text-3xl md:text-4xl font-serif font-bold text-white mt-2">Reserva O Teu Horário</h2>
                    <p class="text-gray-400 text-sm mt-2">Escolhe o serviço e seleciona a hora que melhor se adapta a
                        ti.</p>
                </div>

                <!-- Componente do Formulário de Marcações -->
                <div class="bg-[#1c1817] p-6 md:p-10 rounded-3xl border border-white/10 shadow-2xl">
                    <BookingForm />
                </div>
            </div>
        </section>

        <!-- FOOTER -->
        <footer class="py-8 border-t border-white/10 text-center text-xs text-gray-500 bg-[#1c1817]">
            <p>&copy; {{ new Date().getFullYear() }} Inês Neto Makeup. Todos os direitos reservados.</p>
        </footer>

    </div>
</template>

<script setup>
import { ref, onMounted, onUnmounted } from 'vue';
import BookingForm from '@/Components/BookingForm.vue';
import { Head } from '@inertiajs/vue3';

const whatsappPhone = "351912345678"; // Substituir pelo número real
const whatsappUrl = `https://wa.me/${whatsappPhone}?text=Olá!%20Gostava%20de%20obter%20informações%20sobre%20marcações.`;

const currentSlide = ref(0);
let timer = null;

// === NOVA SECÇÃO DE PDFs ===
const selectedPdf = ref(null);

const documents = ref([
    {
        title: "Pacotes de Noiva 2026",
        description: "Informa-te sobre os serviços de noiva, provas prévias e deslocações.",
        file: "/documents/Orçamento2025Noivas.pdf"
    },
    /*{
        title: "Tabela de Maquilhagem Social",
        description: "Preços individuais e para grupos para eventos, formaturas e festas.",
        file: "/documents/tabela-social.pdf"
    },
    {
        title: "Sessões & Editorial",
        description: "Valores para estúdio, acompanhamento de sessões fotográficas e marcas.",
        file: "/documents/editorial.pdf"
    }*/
]);

const openPdf = (fileUrl) => {
    selectedPdf.value = fileUrl;
};

const closePdf = () => {
    selectedPdf.value = null;
};
// =============================

const slides = [
    {
        subtitle: "SERVIÇOS DE MAQUILHAGEM EXCLUSIVA",
        titlePart1: "Eleva O Teu",
        highlight1: "Brilho",
        titlePart2: "Define A Tua",
        highlight2: "Beleza",
        description: "Maquilhagem profissional para noivas, eventos e sessões fotográficas. Realça a tua beleza natural com acabamento impecável.",
        image: "/images/artista.jpeg",
        position: "object-top" // Foca no topo (ideal para rostos)
    },
    {
        subtitle: "ESTÚDIO & ATENDIMENTO PERSONALIZADO",
        titlePart1: "O Teu Look",
        highlight1: "Único",
        titlePart2: "Para Cada",
        highlight2: "Momento",
        description: "Técnicas avançadas e atendimento exclusivo para garantir que te sentes radiante em qualquer ocasião.",
        image: "/images/ines.png",
        position: "object-top" // 🌸 MUDADO PARA object-top para focar no rosto
    },
    {
        subtitle: "ESPECIAL NOIVAS",
        titlePart1: "O Teu Dia",
        highlight1: "Especial",
        titlePart2: "Com Um Toque",
        highlight2: "Inesquecível",
        description: "Serviço de noivas com teste prévio, produtos de alta durabilidade e acompanhamento para o teu grande dia.",
        image: "/images/MakeNoiva1.jpg",
        position: "object-center" // Centrado
    },
    {
        subtitle: "MAQUILHAGEM SOCIAL & FESTAS",
        titlePart1: "Destaca A Tua",
        highlight1: "Elegância",
        titlePart2: "Com Qualidade",
        highlight2: "Premium",
        description: "Looks sofisticados e duradouros adaptados ao teu estilo pessoal e ao tipo de evento.",
        image: "/images/MakeNoive.jpg",
        position: "object-top" // Foca no topo
    },
];

const nextSlide = () => { currentSlide.value = (currentSlide.value + 1) % slides.length; };
const prevSlide = () => { currentSlide.value = (currentSlide.value - 1 + slides.length) % slides.length; };

onMounted(() => { timer = setInterval(nextSlide, 10000); });
onUnmounted(() => { clearInterval(timer); });
</script>

<style scoped>
/* Transição suave de fade e slide para a imagem */
.fade-slide-lg-enter-active,
.fade-slide-lg-leave-active {
    transition: opacity 0.8s ease, transform 0.8s ease-out;
}

.fade-slide-lg-enter-from {
    opacity: 0;
    transform: translateX(40px) scale(0.95);
}

.fade-slide-lg-leave-to {
    opacity: 0;
    transform: translateX(-20px) scale(1.05);
}
</style>