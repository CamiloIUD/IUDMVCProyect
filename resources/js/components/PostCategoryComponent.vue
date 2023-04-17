<template>
  <div>
    <h2>Posts by Category</h2>
    <select v-model="selectedCategory" @change="getPostsByCategory">
      <option value="">Select a category</option>
      <option v-for="category in categories" :value="category">{{ category }}</option>
    </select>

    <div class="row" v-if="posts.length > 0">
      <div class="col-md-4" v-for="post in posts">
        <div class="card mb-4 box-shadow">
          <div class="card-body">
            <h2>{{ post.title }}</h2>
            <p class="card-text">{{ post.content }}</p>
            <div class="d-flex justify-content-between align-items-center">
              <div class="btn-group">
                <router-link :to="{ name: 'detail', params: { id: post.id } }" class="btn btn-sm btn-outline-secondary">View</router-link>
              </div>
              <small class="text-muted">{{ post.category }}</small>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      categories: [],
      selectedCategory: "",
      posts: [],
    };
  },
  mounted() {
    this.getCategories();
  },
  methods: {
    getCategories() {
      axios.get("http://localhost:8000/api/categories").then((response) => {
        this.categories = response.data;
      });
    },
    getPostsByCategory() {
      if (this.selectedCategory) {
        axios
          .get("http://localhost:8000/api/posts?category=" + this.selectedCategory)
          .then((response) => {
            this.posts = response.data;
          });
      } else {
        this.posts = [];
      }
    },
  },
};
</script>
