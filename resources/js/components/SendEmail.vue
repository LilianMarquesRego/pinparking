<template>
  <div class="card-body">
    <textarea v-model="message" class="mb-2 w-100" rows="5"></textarea>
    <a class="btn btn-block btn-primary mb-3 py-3 text-white" @click="sendEmail">Email</a>
  </div>
</template>

<script>
export default {
  props: [],

  data() {
    return {
      message: ""
    };
  },

  methods: {
    sendEmail() {
      console.log((App = { user: { id: 1 } }));

      axios
        .post(`/send-email/${App.user.id}`, {
          message: this.message
        })
        .then(this.refresh);

      this.message = "";
    }
  }
};
</script>