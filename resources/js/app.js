import './bootstrap';

import { createApp } from 'vue'
import Counter from './components/Counter.vue'
import VoteComponent from './components/VoteComponent.vue'
const app = createApp({})

app.component('counter', Counter)
app.component('vote', VoteComponent)
app.mount('#app')
