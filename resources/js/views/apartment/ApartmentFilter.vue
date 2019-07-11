<template>
  <div class="row">
    <div class="col-sm-9">
      <table class="table">
        <tr>
          <th>id</th>
          <th>name</th>
          <th>price</th>
          <th>bedrooms</th>
          <th>bathrooms</th>
          <th>storeys</th>
          <th>garages</th>
        </tr>
        <tr v-for="apartment in apartments">
          <td>{{ apartment.id }}</td>
          <td>{{ apartment.name }}</td>
          <td>{{ apartment.price }}</td>
          <td>{{ apartment.bedrooms }}</td>
          <td>{{ apartment.bathrooms }}</td>
          <td>{{ apartment.storeys }}</td>
          <td>{{ apartment.garages }}</td>
        </tr>
      </table>
    </div>
    <div class="col-sm-3">
      <form class="js-search-form">
        <div class="form-group">
          <label for="name">name</label>
          <input type="text" id="name" v-model="search_name">
        </div>
        <div class="form-group">
          <label for="min-price">min price</label>
          <input type="text" id="min-price" v-model="search_min_price">
        </div>
        <div class="form-group">
          <label for="max-price">max price</label>
          <input type="text" id="max-price" v-model="search_max_price">
        </div>
        <div class="form-group">
          <label for="bedrooms">bedrooms</label>
          <input type="text" id="bedrooms" v-model="search_bedrooms">
        </div>
        <div class="form-group">
          <label for="bathrooms">bathrooms</label>
          <input type="text" id="bathrooms" v-model="search_bathrooms">
        </div>
        <div class="form-group">
          <label for="storeys">storeys</label>
          <input type="text" id="storeys" v-model="search_storeys">
        </div>
        <div class="form-group">
          <label for="garages">garages</label>
          <input type="text" id="garages" v-model="search_garages">
        </div>
        <button
        @click.prevent="fetchApartments"
        >
          <span class="js-button-text">
            Search
          </span>
          <span class="js-loader">
          </span>
        </button>
      </form>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      apartments: [],

      search_name: '',
      search_min_price: '',
      search_max_price: '',
      search_bedrooms: '',
      search_bathrooms: '',
      search_storeys: '',
      search_garages: '',
    };
  },
  methods: {
    fetchApartments() {
      $(".js-loader").addClass("spinner-border");
      $(".js-button-text").hide();
      axios.post('apiFilter/search',
          {
            name: this.search_name,
            min_price: this.search_min_price,
            max_price: this.search_max_price,
            bedrooms: this.search_bedrooms,
            bathrooms: this.search_bathrooms,
            storeys: this.search_storeys,
            garages: this.search_garages,
          }).then(response => {
        return response.data;
      }).then(data => {
        if (data.length) {
          $('.js-apartment-not-found').addClass('d-none');
          this.apartments = data;
        } else {
          $('.js-apartment-not-found').removeClass('d-none');
        }
        $(".js-loader").removeClass("spinner-border");
        $(".js-button-text").show();
      });
    },

  },
  beforeMount() {
    axios.post('apiFilter/getAll').then(response => {
      return response.data;
    }).then(data => {
      this.apartments = data;
    });
  },
};
</script>
