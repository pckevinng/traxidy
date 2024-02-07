// src/router/index.js

//import Vue from 'vue';
//import VueRouter from 'vue-router';
import { createRouter, createWebHistory } from 'vue-router';
import AddAction from '../components/AddAction.vue'; // Assuming your component is named AddAction.vue


const routes = [
    {
      path: '/add-action',
      name: 'AddAction',
      component: AddAction
    },
    // Other routes...
  ];
  
  const router = createRouter({
    history: createWebHistory(),
    routes
  });




export default router;
