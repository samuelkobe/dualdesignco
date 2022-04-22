Vue.createApp({
    data() {
    return {
        menuOpen: false,
    }
    },
    methods: {
        toggle() {
            this.menuOpen = !this.menuOpen
        }
    }
}).mount('#app')