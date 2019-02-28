<template>
  <div>
    <div class="row">
      <div v-for="(space, index) in spaces" :key="space.id" class="col-md-4">
        <div class="item-preview mb-5">
          <img
            class="img-fluid"
            :src="'/small/' + space.image"
            alt="parking slot"
            @click="remove(index, space.id)"
          >
          <div class="item-preview-title">{{ space.address }}</div>
          <div class="item-preview-description">$ {{ space.price }}</div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  props: ["data"],

  data() {
    return {
      spaces: this.data
    };
  },

  methods: {
    remove(index, id) {
      axios.delete(`/ads/${id}`).then(() => {
        this.spaces.splice(index, 1);
      });
    }
  }
};
</script>

<style>
</style>
