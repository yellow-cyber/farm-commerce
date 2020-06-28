<template>
  <div class="container">
    <div class="flex flex-col mt-4">
      <div class="row pb-3">
        <div class="h5 font-weight-bold col-6 pt-3">My Orders</div>
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
                  <input disabled type="number" min="1" class="form-control w-20" value="1" />
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
                    @click="claim(model.id,index)"
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
          </div>
          <div class="col-12 pt-2">
            <button
              @click="claimAll"
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
      models: []
    };
  },
  mounted() {
    this.loadModels();
  },
  methods: {
    async loadModels() {
      const res = await axios.get("/api/orders");
      console.log(res);
    },
    claim(id, index) {},
    claimAll() {}
  }
};
</script>
