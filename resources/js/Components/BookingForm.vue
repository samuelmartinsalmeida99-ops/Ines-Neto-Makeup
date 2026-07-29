<template>
    <form @submit.prevent="submitBooking" class="space-y-6 text-left">

        <!-- 1. DADOS DO CLIENTE -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div>
                <label class="block text-xs uppercase tracking-wider text-gray-300 font-medium mb-2">Nome
                    Completo</label>
                <input v-model="form.name" type="text" required placeholder="O teu nome"
                    class="w-full bg-[#141010] border border-white/10 rounded-xl px-4 py-3 text-white placeholder-gray-500 focus:outline-none focus:border-pink-400 text-sm" />
            </div>

            <div>
                <label class="block text-xs uppercase tracking-wider text-gray-300 font-medium mb-2">Contacto /
                    WhatsApp</label>
                <input v-model="form.phone" type="tel" required placeholder="912 345 678"
                    class="w-full bg-[#141010] border border-white/10 rounded-xl px-4 py-3 text-white placeholder-gray-500 focus:outline-none focus:border-pink-400 text-sm" />
            </div>
        </div>

        <!-- 2. SERVIÇO -->
        <div>
            <label class="block text-xs uppercase tracking-wider text-gray-300 font-medium mb-2">Tipo de Serviço</label>
            <select v-model="form.service" required
                class="w-full bg-[#141010] border border-white/10 rounded-xl px-4 py-3 text-white focus:outline-none focus:border-pink-400 text-sm">
                <option value="" disabled>Seleciona o serviço...</option>
                <option value="Maquilhagem Noiva">Maquilhagem Noiva</option>
                <option value="Maquilhagem Social">Maquilhagem Social / Festa</option>
                <option value="Maquilhagem Editorial">Maquilhagem Editorial / Foto</option>
            </select>
        </div>

        <!-- 3. SELEÇÃO DE DATA (CALENDÁRIO) -->
        <div>
            <label class="block text-xs uppercase tracking-wider text-gray-300 font-medium mb-2">Escolhe a Data</label>
            <input v-model="form.date" type="date" :min="minDate" @change="fetchBookedSlots" required
                class="w-full bg-[#141010] border border-white/10 rounded-xl px-4 py-3 text-white focus:outline-none focus:border-pink-400 text-sm color-scheme-dark" />
        </div>

        <!-- 4. SELEÇÃO DE HORÁRIO (00:00 às 23:00) -->
        <div v-if="form.date">
            <div class="flex items-center justify-between mb-3">
                <label class="block text-xs uppercase tracking-wider text-gray-300 font-medium">Horários
                    Disponíveis</label>
                <div class="flex items-center gap-4 text-xs">
                    <span class="flex items-center gap-1.5 text-gray-400"><span
                            class="w-2.5 h-2.5 rounded-full bg-pink-500/20 border border-pink-400"></span> Livre</span>
                    <span class="flex items-center gap-1.5 text-gray-500"><span
                            class="w-2.5 h-2.5 rounded-full bg-red-950/60 border border-red-800"></span> Ocupado</span>
                </div>
            </div>

            <!-- Grelha das Horas -->
            <div
                class="grid grid-cols-4 sm:grid-cols-6 md:grid-cols-8 gap-2 max-h-56 overflow-y-auto pr-1 custom-scrollbar">
                <button v-for="hour in allHours" :key="hour" type="button" :disabled="isBooked(hour)"
                    @click="selectTime(hour)" :class="[
                        'py-2 px-1 text-xs rounded-lg font-medium border transition-all duration-200 text-center',
                        isBooked(hour)
                            ? 'bg-red-950/20 border-red-900/40 text-red-500/50 cursor-not-allowed line-through'
                            : form.time === hour
                                ? 'bg-pink-500 text-white border-pink-400 shadow-md shadow-pink-500/30 font-bold scale-105'
                                : 'bg-[#141010] border-white/10 text-gray-300 hover:border-pink-400 hover:text-white'
                    ]">
                    {{ hour }}
                </button>
            </div>
        </div>

        <!-- BOTÃO DE SUBMISSÃO -->
        <button type="submit" :disabled="!form.date || !form.time || isSubmitting"
            class="w-full py-4 bg-gradient-to-r from-pink-500 to-rose-400 text-white font-medium rounded-xl shadow-lg shadow-pink-500/20 hover:scale-[1.01] active:scale-95 transition-all duration-200 disabled:opacity-40 disabled:cursor-not-allowed disabled:hover:scale-100">
            <span v-if="!isSubmitting">Confirmar Marcação</span>
            <span v-else>A processar...</span>
        </button>
    </form>
</template>

<script setup>
import { ref, computed } from 'vue';

// Formulário
const form = ref({
    name: '',
    phone: '',
    service: '',
    date: '',
    time: ''
});

const isSubmitting = ref(false);

// Data mínima (Hoje)
const minDate = computed(() => {
    return new Date().toISOString().split('T')[0];
});

// Gera a lista de horas das 00:00 às 23:00
const allHours = Array.from({ length: 24 }, (_, i) => {
    const h = i.toString().padStart(2, '0');
    return `${h}:00`;
});

// Lista de horas ocupadas para a data selecionada (Simulado/Vindo do Laravel)
const bookedSlots = ref([]);

// Quando escolhe a data, procura as horas ocupadas nessa data
const fetchBookedSlots = async () => {
    form.value.time = ''; // Limpa a hora selecionada ao mudar a data

    // Podes ligar isto ao teu Backend Laravel via axios/Inertia se já tiveres rota de verificação:
    // const response = await axios.get(`/api/booked-slots?date=${form.value.date}`);
    // bookedSlots.value = response.data;

    // Exemplo de horas ocupadas para testes (simulação):
    if (form.value.date) {
        bookedSlots.value = ['09:00', '11:00', '15:00', '16:00'];
    }
};

// Verifica se uma hora específica já está ocupada
const isBooked = (hour) => {
    return bookedSlots.value.includes(hour);
};

// Seleciona a hora se não estiver ocupada
const selectTime = (hour) => {
    if (!isBooked(hour)) {
        form.value.time = hour;
    }
};

// Submissão do formulário
const submitBooking = () => {
    isSubmitting.value = true;

    // Aqui envias os dados para o Laravel
    console.log("Marcação criada:", form.value);

    setTimeout(() => {
        alert(`Marcação agendada com sucesso para ${form.value.date} às ${form.value.time}!`);
        isSubmitting.value = false;
    }, 1000);
};
</script>

<style scoped>
/* Garante que o input date fica com tema escuro elegante */
.color-scheme-dark {
    color-scheme: dark;
}

/* Scrollbar personalizada para a grelha de horas */
.custom-scrollbar::-webkit-scrollbar {
    width: 5px;
}

.custom-scrollbar::-webkit-scrollbar-track {
    background: #141010;
    border-radius: 10px;
}

.custom-scrollbar::-webkit-scrollbar-thumb {
    background: #332625;
    border-radius: 10px;
}

.custom-scrollbar::-webkit-scrollbar-thumb:hover {
    background: #ec4899;
}
</style>