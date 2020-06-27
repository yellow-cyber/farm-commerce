<template>
  <div>
    <!-- hero -->
    <div
      class="hero bg-gray-100 py-20"
      style="background-image: url('/images/cover/vegetables.jpg');
            background-size:cover"
    >
      <!-- container -->
      <div class="container px-4 sm:px-8 lg:px-16 xl:px-20 mx-auto items-center">
        <!-- hero wrapper -->
        <div class="hero-wrapper grid grid-cols-1 md:grid-cols-12 gap-8 items-center">
          <div class="hero-image col-span-6">
            <div class="py-6">
              <div
                class="flex max-w-md bg-white shadow-xl rounded-lg overflow-hidden cursor-pointer transition duration-500 ease-in-out transform hover:-translate-y-1 hover:scale-110"
              >
                <div class="w-1/3 bg-cover">
                  <img
                    class="h-full w-full object-cover"
                    :src="'/images/products/'+featured.img"
                    alt="Product image"
                  />
                </div>
                <div class="w-2/3 p-4">
                  <h1 class="text-gray-900 font-bold text-2xl">{{featured.name}}</h1>
                  <p class="mt-2 text-gray-600 text-sm">{{featured.desc}}</p>

                  <div class="flex item-center justify-between mt-3">
                    <h1 class="text-gray-700 font-bold text-xl">
                      <span>&#8369;</span>
                      {{featured.price}}
                    </h1>
                    <button
                      class="px-3 py-2 bg-gray-800 text-white text-xs font-bold uppercase rounded"
                    >Add to Cart</button>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="hero-text col-span-6">
            <h1
              class="font-bold text-4xl md:text-5xl max-w-xl text-white leading-tight"
            >40% off Farm Supplies</h1>
            <hr class="w-12 h-1 bg-orange-500 rounded-full mt-8" />
            <p class="text-white text-base leading-relaxed mt-8 font-semibold">
              We love organic and we love you! That's why all
              items are 40% off.
              <br />Get your farm supplies now!
            </p>
            <div class="get-app flex space-x-5 mt-10 justify-center md:justify-start"></div>
          </div>

          <!-- hero image -->
        </div>
      </div>
    </div>

    <section class="bg-white py-8">
      <div class="container mx-auto flex items-center flex-wrap pt-4 pb-12">
        <nav id="store" class="w-full z-30 top-0 px-6 py-1">
          <div
            class="w-full container mx-auto flex flex-wrap items-center justify-between mt-0 px-2 py-3"
          >
            <a
              class="uppercase tracking-wide no-underline hover:no-underline font-bold text-gray-800 text-xl"
              href="#"
            >Store</a>

            <div class="flex items-center" id="store-nav-content">
              <div class="relative text-gray-600">
                <input
                  type="search"
                  name="serch"
                  placeholder="Search"
                  v-model="searchText"
                  class="bg-white rounded-pill border h-10 px-5 pr-10 rounded-full text-sm focus:outline-none"
                />
                <button
                  type="submit"
                  class="absolute right-0 mb-5 top-0 mt-0 pt-2 pb-2 mr-4 focus:border-none focus:outline-none"
                >
                  <svg
                    class="h-5 w-5 fill-current"
                    xmlns="http://www.w3.org/2000/svg"
                    xmlns:xlink="http://www.w3.org/1999/xlink"
                    version="1.1"
                    id="Capa_1"
                    x="0px"
                    y="0px"
                    viewBox="0 0 56.966 56.966"
                    style="enable-background:new 0 0 56.966 56.966;"
                    xml:space="preserve"
                    width="512px"
                    height="512px"
                  >
                    <path
                      d="M55.146,51.887L41.588,37.786c3.486-4.144,5.396-9.358,5.396-14.786c0-12.682-10.318-23-23-23s-23,10.318-23,23  s10.318,23,23,23c4.761,0,9.298-1.436,13.177-4.162l13.661,14.208c0.571,0.593,1.339,0.92,2.162,0.92  c0.779,0,1.518-0.297,2.079-0.837C56.255,54.982,56.293,53.08,55.146,51.887z M23.984,6c9.374,0,17,7.626,17,17s-7.626,17-17,17  s-17-7.626-17-17S14.61,6,23.984,6z"
                    />
                  </svg>
                </button>
              </div>
            </div>
          </div>
        </nav>

        <!-- card -->
        <div
          v-for="model in models"
          :key="model.id"
          class="w-full md:w-1/3 xl:w-1/4 p-6 flex flex-col cursor-pointer transition duration-500 ease-in-out transform"
        >
          <div class="max-w-xs bg-white-100 border shadow-sm rounded-lg overflow-hidden my-10">
            <div class="px-4 py-2">
              <h1 class="text-gray-900 font-bold text-3xl uppercase">{{model.name}}</h1>
              <p class="text-gray-600 text-sm mt-1">{{model.desc}}</p>
            </div>
            <img
              class="h-56 w-full object-cover mt-2"
              :src="'/images/products/'+model.img"
              alt="Product image"
            />
            <div class="flex items-center justify-between px-4 py-2 bg-gray-900">
              <h1 class="text-gray-200 font-bold text-xl">
                <span>&#8369;</span>
                {{model.price}}
              </h1>
              <button
                @click="addToCart(model.id)"
                :class="model.selected?buttonAdded:buttonNotAdded"
              >{{model.selected?"Added to cart":"Add to cart"}}</button>
            </div>
          </div>
        </div>
        <!-- end card -->
      </div>
    </section>

    <footer class="container mx-auto bg-white py-8 border-t border-gray-400">
      <div class="container flex px-3 py-8">
        <div class="w-full mx-auto flex flex-wrap">
          <div class="flex w-full lg:w-1/2">
            <div class="px-3 md:px-0">
              <h3 class="font-bold text-gray-900">About</h3>
              <p
                class="py-4"
              >Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas vel mi ut felis tempus commodo nec id erat. Suspendisse consectetur dapibus velit ut lacinia.</p>
            </div>
          </div>
          <div class="flex w-full lg:w-1/2 lg:justify-end lg:text-right">
            <div class="px-3 md:px-0">
              <h3 class="font-bold text-gray-900">Social</h3>
              <ul class="list-reset items-center pt-3">
                <li>
                  <a
                    class="inline-block no-underline hover:text-black hover:underline py-1"
                    href="#"
                  >Add social links</a>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </footer>
  </div>
</template>

<script>
export default {
  data() {
    return {
      modelName: "products",
      models: [],
      featured: {
        name: "",
        desc: "",
        img: "product"
      },
      productsWithSelected: [],
      searchText: "",
      addedToCart: false,
      buttonAdded:
        "px-3 py-1 bg-green-600 text-sm text-gray-200 font-semibold rounded transition duration-500 ease-in-out transform hover:scale-110  focus:outline-none ",
      buttonNotAdded:
        "px-3 py-1 bg-gray-200 text-sm text-gray-900 font-semibold rounded transition duration-500 ease-in-out transform hover:scale-110 focus:outline-none"
    };
  },
  mounted() {
    this.loadUserCart();
  },
  methods: {
    async addToCart(id) {
      const res = await axios.put("/api/cart/" + id);
      this.loadUserCart();
    },
    async loadUserCart() {
      const res = await axios.get("api/cart");
      let cart_products = res.data;

      const res2 = await axios.get("api/products");
      let products = res2.data;

      products.forEach(product => {
        product["selected"] = false;
        cart_products.forEach(cart_product => {
          if (product.id == cart_product.id) product["selected"] = true;
        });
      });

      this.models = products;
      this.featured = this.models[
        Math.floor(Math.random() * this.models.length)
      ];
    }
  },
  computed: {
    filteredModels() {
      return this.models.filter(model => {
        return model.name.toLowerCase().includes(this.searchText.toLowerCase());
      });
    }
  }
};
</script>
