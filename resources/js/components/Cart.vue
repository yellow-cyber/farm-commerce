<template>
  <div class="container">
    <div class="flex flex-col mt-4">
      <div class="row pb-3">
        <div class="h5 font-weight-bold col-6 pt-3">My Cart</div>
      </div>

      <div class="-my-2 border-bottom pb-3 py-2 overflow-x-auto sm:-mx-6 sm:px-6 lg:-mx-8 lg:px-8">
        <div
          class="align-middle inline-block min-w-full shadow overflow-hidden sm:rounded-lg border-b border-gray-200"
        >
          <table class="min-w-full">
            <thead>
              <tr>
                <th
                  class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-900 uppercase tracking-wider"
                >Product</th>
                <th
                  class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-900 uppercase tracking-wider"
                >Quantity</th>

                <th
                  class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-900 uppercase tracking-wider"
                >Unit Price</th>
                <th
                  class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-900 uppercase tracking-wider"
                >Total Price</th>
                <th
                  class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-900 uppercase tracking-wider"
                >Remove</th>
              </tr>
            </thead>

            <tbody class="bg-white">
              <tr v-for="(model,index) in models" :key="model.id">
                <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                  <div class="flex items-center">
                    <div class="flex-shrink-0 h-10 w-16">
                      <img
                        class="h-10 w-16"
                        :src="
                                                    '/images/products/' +
                                                        model.img
                                                "
                        alt
                      />
                    </div>
                    <div class="ml-4">
                      <div class="text-sm leading-5 font-medium text-gray-900">{{ model.name }}</div>
                      <div class="text-sm leading-5 text-gray-500">Item #{{ model.id }}</div>
                    </div>
                  </div>
                </td>
                <td
                  class="px-6 py-4 whitespace-no-wrap border-b border-gray-200 text-sm leading-5 text-gray-900"
                >
                  <input
                    @change="changeQty($event,index,model)"
                    type="number"
                    min="1"
                    class="form-control w-20"
                    value="1"
                  />
                </td>

                <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                  <div class="text-sm leading-5 text-gray-900">
                    <span>&#8369;</span>
                    {{ model.price }}
                  </div>
                </td>
                <td
                  class="px-6 py-4 whitespace-no-wrap border-b border-gray-200 text-sm leading-5 text-gray-900"
                >
                  <span>&#8369;</span>
                  {{totalPrice[index]}}
                </td>

                <td
                  class="px-6 py-4 whitespace-no-wrap border-b text-center border-gray-200 text-sm leading-5 font-medium"
                >
                  <svg
                    @click="removeToCart(model.id,index)"
                    class="bi fill-red text-center bi-trash cursor-pointer transition duration-500 ease-in-out hover:fill-red transform hover:scale-150"
                    width="2em"
                    height="1.3em"
                    viewBox="0 0 16 16"
                    fill="red"
                    xmlns="http://www.w3.org/2000/svg"
                  >
                    <path
                      d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"
                    />
                    <path
                      fill-rule="evenodd"
                      d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4L4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"
                    />
                  </svg>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>

      <div class="row py-5">
        <div class="col-6"></div>

        <div class="col-6 text-right">
          <div class="col-12 font-weight-bold h5">
            Total Price:
            <span>&#8369;</span>
            {{overallPrice}}
          </div>
          <div class="col-12 pt-2">
            <button
              @click="checkout"
              class="bg-white shadow satext-gray-800 font-bold rounded border-b-2 border-green-500 hover:border-green-600 hover:text-green-500 focus:outline-none shadow-md py-2 px-6 inline-flex items-center"
            >
              <span class="mr-2">PROCEED TO CHECKOUT</span>
              <svg
                class="bi bi-handbag-fill"
                width="1em"
                height="1em"
                viewBox="0 0 16 16"
                fill="currentColor"
                xmlns="http://www.w3.org/2000/svg"
              >
                <path d="M8 1a2 2 0 0 0-2 2v2H5V3a3 3 0 1 1 6 0v2h-1V3a2 2 0 0 0-2-2z" />
                <path
                  d="M3.405 5a1.5 1.5 0 0 0-1.493 1.35L1 13.252A2.5 2.5 0 0 0 3.488 16h9.024A2.5 2.5 0 0 0 15 13.251l-.912-6.9A1.5 1.5 0 0 0 12.595 5H11v2.5a.5.5 0 1 1-1 0V5H6v2.5a.5.5 0 0 1-1 0V5H3.405z"
                />
              </svg>
            </button>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import Footer from "./Footer.vue";
export default {
  components: {
    "v-footer": Footer
  },
  data() {
    return {
      models: [],
      totalPrice: [],
      cartQty: [],
      overallPrice: 0
    };
  },
  mounted() {
    this.loadModels(1);

    this.$set(this, "models", [
      {
        property: "setLater OBJ1 Prop"
      },
      {
        property: "setLater OBJ2 Prop"
      }
    ]);
  },
  methods: {
    async loadModels(qty) {
      const res = await axios.get("/api/cart");
      this.models = res.data;
      this.models.forEach((model, i) => {
        this.$set(this.cartQty, i, qty);
        this.$set(this.totalPrice, i, qty * model.price);
        this.overallPrice += qty * model.price;
      });
    },
    computeOverallPrice() {
      this.overallPrice = 0;
      this.totalPrice.forEach((price, i) => {
        this.overallPrice += price;
      });
    },
    changeQty(e, index, model) {
      this.$set(this.cartQty, index, e.target.value);
      this.$set(this.totalPrice, index, e.target.value * model.price);
      this.computeOverallPrice();
    },
    removeToCart(id, index) {
      Swal.fire({
        title: "Are you sure?",
        text: "You won't be able to revert this!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Yes, remove it!"
      }).then(result => {
        if (result.value) {
          this.$Progress.start();
          axios.put("/api/cart/" + id).then(({ data }) => {
            Toast.fire({
              icon: "success",
              title: "Product removed from cart"
            });
            this.totalPrice.splice(index, 1);
            this.cartQty.splice(index, 1);
            this.models.splice(index, 1);
            this.computeOverallPrice();
            this.$Progress.finish();
          });
        }
      });
    },
    async checkout() {
      const ans = await Swal.fire({
        title: "Are you sure?",
        text: "You won't be able to revert this!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Yes, proceed to checkout!"
      });
      Swal.mixin({
        input: "text",
        confirmButtonText: "Next &rarr;",
        showCancelButton: true,
        progressSteps: ["1", "2", "3"]
      })
        .queue([
          {
            title: "Where will we ship the item?",
            text: "Enter your billing address"
          },
          {
            title: "Phone",
            text: "Please enter your phone number for verification"
          }
        ])
        .then(async result => {
          if (result.value) {
            const checkRes = await axios.post("/api/cart/checkout");
            this.totalPrice = [];
            this.cartQty = [];

            this.computeOverallPrice();
            this.loadModels();

            const answers = JSON.stringify(result.value[0]);
            Swal.fire({
              title: "Thank you for choosing farmerce!",
              html: `Your item is on its way!`,
              confirmButtonText: "Lovely!"
            });
          }
        });
    }
  }
};
</script>
