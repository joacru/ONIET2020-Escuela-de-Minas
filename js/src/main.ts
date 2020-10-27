import App from './App.svelte';

const app = new App({
  target: document.getElementById('infoDeApi'),
  props: {
    country: (window as any).country,
  },
});

export default app;
