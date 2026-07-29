<script setup>
import ApplicationLogo from '@/Components/ApplicationLogo.vue';
import { Link } from '@inertiajs/vue3';
</script>

<template>
    <div class="min-h-screen bg-[#1c1817] text-white">
        <!-- Navbar / Header fixo aqui -->

        <!-- Conteúdo com Transição Suave ao mudar de página -->
        <main>
            <transition name="fade-slide" mode="out-in">
                <slot />
            </transition>
        </main>

        <!-- Footer aqui -->
    </div>
</template>
