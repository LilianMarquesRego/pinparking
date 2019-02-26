<template>
  <div>
    <div class="d-flex p-2 justify-content-end">
      <label for="filter" class="p-2">Sort by</label>
      <select
        class="form-control"
        id="filter"
        style="width: 170px"
        @change="changed"
        v-model="selected"
      >
        <option value="created_at.desc">newest</option>
        <option value="price.asc">price: low to high</option>
        <option value="price.desc">price: high to low</option>
      </select>
    </div>

    <div class="row">
      <div v-for="space in spaces" :key="space.id" class="col-md-4">
        <div class="item-preview mb-5">
          <a class="item-preview-img box-shadow-lg d-block mb-3" :href="'/ads/' + space.id">
            <img class="img-fluid" :src="'/small/' + space.image" alt="parking slot">
          </a>
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
      spaces: this.data,
      selected: "created_at.desc"
    };
  },

  methods: {
    changed() {
      console.log(this.selected);

      axios
        .get("/ads", {
          params: {
            orderBy: this.selected
          }
        })
        .then(this.refresh);
    },

    refresh(response) {
      this.spaces = response.data;
    }
  }
};
</script>