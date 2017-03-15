import Vue from 'vue'
import App from './App.vue'
import VueResource from 'vue-resource';
import VueRouter from 'vue-router'
import Home from './components/Home.vue';
import Catalog from './components/Catalog.vue';
import News from './components/News.vue';
import Service from './components/Service.vue';
import Aboutme from './components/Aboutme.vue';
import Test from './components/Test.vue';
import Classify from './components/Classify.vue';
import Foo from './Foo.vue';
import Bar from './Bar.vue';
require("!style-loader!css-loader!sass-loader!../static/App.scss");
require("!style-loader!css-loader!../static/style.css");
Vue.use(VueRouter)
Vue.use(VueResource)
const router = new VueRouter({
    routes: [
      { path: '/home', component: Home },
      { path: '/aboutme', component: Aboutme },
      { path: '/service', component: Service },
      { path: '/news', component: News },
      { path: '/catalog', component: Catalog },
      { path: '/foo', component: Foo },
      { path: '/bar', component: Bar },
      { path: '/test',component: Test },
      { path: '/classify',component:Classify}
    ]
})
new Vue({
  el: '#app',
  router,
  render: h => h(App)
})
