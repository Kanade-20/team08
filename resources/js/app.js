require('./bootstrap');

import { createApp } from 'vue';
import ChartComponent from './components/Chart.vue';
import axios from 'axios';

// 创建 Vue 应用实例并挂载 ChartComponent
const app = createApp(ChartComponent);

// 配置全局的 axios 实例
app.config.globalProperties.$axios = axios;

// 挂载 Vue 实例到#app容器
app.mount('#app');