import Vue from 'vue'
import App from './App.vue'
require("!style-loader!css-loader!sass-loader!../static/App.scss");
require("!style-loader!css-loader!../static/style.css");
new Vue({
  el: '#app',
  render: h => h(App)
})
