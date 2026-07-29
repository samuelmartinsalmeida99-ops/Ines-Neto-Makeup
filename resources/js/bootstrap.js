import axios from 'axios';

window.axios = axios;

// Configura o cabeçalho padrão para requisições AJAX do Laravel
window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

// Opcional: Helper para chamadas à API de forma simplificada
window.api = {
    get: (url, config) => window.axios.get(url, config),
    post: (url, data, config) => window.axios.post(url, data, config),
    put: (url, data, config) => window.axios.put(url, data, config),
    delete: (url, config) => window.axios.delete(url, config),
};