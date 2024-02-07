// App.vue or main.js

<template>
  <div id="app">
    <ActionsList />
  </div>
</template>

<script>
import ActionsList from './components/ActionsList.vue';

export default {
  components: {
    ActionsList,
  }
}
</script>
