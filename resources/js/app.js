
import './bootstrap';

import { createApp } from 'vue/dist/vue.esm-bundler.js';

const componentContext = import.meta.globEager('./components/**/*.vue');

const app = createApp({});

for (const path in componentContext) {
    const componentModule = componentContext[path];
    const fileName = path.split('/').pop().replace(/\.\w+$/, '');
  
    const component = componentModule.default;
    app.component(fileName, component);
  };
  
  app.mount('#app');
