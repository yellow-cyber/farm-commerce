<template>
    <div class="container">
        <div class="flex flex-col mt-4">
            <div class="row pb-3">
                <div class="h5 font-weight-bold col-6 pt-3">My Orders</div>
            </div>

            <div
                v-if="this.models[0]"
                class="-my-2 border-bottom pb-3 py-2 overflow-x-auto sm:-mx-6 sm:px-6 lg:-mx-8 lg:px-8"
            >
                <div
                    class="align-middle inline-block min-w-full shadow overflow-hidden sm:rounded-lg border-b border-gray-200"
                >
                    <table class="min-w-full">
                        <thead>
                            <tr>
                                <th
                                    class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-900 uppercase tracking-wider"
                                >
                                    Product
                                </th>
                                <th
                                    class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-900 uppercase tracking-wider"
                                >
                                    Quantity
                                </th>

                                <th
                                    class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-900 uppercase tracking-wider"
                                >
                                    Unit Price
                                </th>
                                <th
                                    class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-900 uppercase tracking-wider"
                                >
                                    Total Price
                                </th>
                                <th
                                    class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-900 uppercase tracking-wider"
                                >
                                    Claim
                                </th>
                            </tr>
                        </thead>

                        <tbody class="bg-white">
                            <tr v-for="model in models" :key="model.pivot.id">
                                <td
                                    class="px-6 py-4 whitespace-no-wrap border-b border-gray-200"
                                >
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
                                            <div
                                                class="text-sm leading-5 font-medium text-gray-900"
                                            >
                                                {{ model.name }}
                                            </div>
                                            <div
                                                class="text-sm leading-5 text-gray-500"
                                            >
                                                {{
                                                    model.pivot.shipping_address
                                                }}
                                                - {{ model.pivot.phone_number }}
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td
                                    class="px-6 py-4 whitespace-no-wrap border-b border-gray-200"
                                >
                                    <div
                                        class="text-sm leading-5 text-gray-900"
                                    >
                                        {{ model.pivot.qty }}
                                    </div>
                                </td>

                                <td
                                    class="px-6 py-4 whitespace-no-wrap border-b border-gray-200"
                                >
                                    <div
                                        class="text-sm leading-5 text-gray-900"
                                    >
                                        <span>&#8369;</span>
                                        {{ model.price | dec2 }}
                                    </div>
                                </td>
                                <td
                                    class="px-6 py-4 whitespace-no-wrap border-b border-gray-200 text-sm leading-5 text-gray-900"
                                >
                                    <span>&#8369;</span>
                                    {{ model.pivot.total_price | dec2 }}
                                </td>
                                <td
                                    class="px-6 py-4 whitespace-no-wrap border-b border-gray-200 text-sm leading-5 text-gray-900"
                                >
                                    <button
                                        @click="claim(model.id, model)"
                                        class="bg-white shadow satext-gray-800 font-bold rounded border-b-2 border-green-500 hover:border-green-600 hover:text-green-500 focus:outline-none shadow-md py-2 px-6 inline-flex items-center"
                                    >
                                        <span class="mr-2">Claim</span>
                                        <svg
                                            class="bi bi-handbag-fill"
                                            width="1em"
                                            height="1em"
                                            viewBox="0 0 16 16"
                                            fill="blue"
                                            xmlns="http://www.w3.org/2000/svg"
                                        >
                                            <path
                                                d="M8 1a2 2 0 0 0-2 2v2H5V3a3 3 0 1 1 6 0v2h-1V3a2 2 0 0 0-2-2z"
                                            />
                                            <path
                                                d="M3.405 5a1.5 1.5 0 0 0-1.493 1.35L1 13.252A2.5 2.5 0 0 0 3.488 16h9.024A2.5 2.5 0 0 0 15 13.251l-.912-6.9A1.5 1.5 0 0 0 12.595 5H11v2.5a.5.5 0 1 1-1 0V5H6v2.5a.5.5 0 0 1-1 0V5H3.405z"
                                            />
                                        </svg>
                                    </button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <div v-if="this.models[0]" class="row py-5">
                <div class="col-6"></div>

                <div class="col-6 text-right">
                    <div class="col-12 font-weight-bold h5">
                        Total Price:
                        <span>&#8369;</span>
                        {{ overallPrice | dec2 }}
                    </div>
                    <div class="col-12 pt-2">
                        <button
                            @click="claimAll"
                            class="bg-white shadow satext-gray-800 font-bold rounded border-b-2 border-green-500 hover:border-green-600 hover:text-green-500 focus:outline-none shadow-md py-2 px-6 inline-flex items-center"
                        >
                            <span class="mr-2">CLAIM ALL</span>
                            <svg
                                class="bi bi-handbag-fill"
                                width="1em"
                                height="1em"
                                viewBox="0 0 16 16"
                                fill="currentColor"
                                xmlns="http://www.w3.org/2000/svg"
                            >
                                <path
                                    d="M8 1a2 2 0 0 0-2 2v2H5V3a3 3 0 1 1 6 0v2h-1V3a2 2 0 0 0-2-2z"
                                />
                                <path
                                    d="M3.405 5a1.5 1.5 0 0 0-1.493 1.35L1 13.252A2.5 2.5 0 0 0 3.488 16h9.024A2.5 2.5 0 0 0 15 13.251l-.912-6.9A1.5 1.5 0 0 0 12.595 5H11v2.5a.5.5 0 1 1-1 0V5H6v2.5a.5.5 0 0 1-1 0V5H3.405z"
                                />
                            </svg>
                        </button>
                    </div>
                </div>
            </div>

            <div
                v-if="!this.models[0]"
                class="-my-2 border-bottom pb-3 py-2 overflow-x-auto sm:-mx-6 sm:px-6 lg:-mx-8 lg:px-8"
            >
                No Items in order
            </div>
            <div
                v-if="!this.models[0]"
                class="-my-2 mb-64 pb-3 py-2 sm:-mx-6 sm:px-6 lg:-mx-8 lg:px-8"
            ></div>
            <div
                v-if="!this.models[0]"
                class="-my-2 mb-64 pb-3 py-2 sm:-mx-6 sm:px-6 lg:-mx-8 lg:px-8"
            ></div>
            <div
                v-else
                class="-my-2 mb-64 pb-3 py-2 sm:-mx-6 sm:px-6 lg:-mx-8 lg:px-8"
            ></div>
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
            overallPrice: 0
        };
    },
    mounted() {
        this.loadModels();
    },
    methods: {
        async loadModels() {
            this.$Progress.start();
            const res = await axios.get("/api/my-orders");

            if (res) {
                this.models = res.data;
                this.computeOverallPrice();
                this.$Progress.finish();
            }
        },
        computeOverallPrice() {
            this.overallPrice = 0;
            this.models.forEach((model, i) => {
                this.overallPrice += parseFloat(model.pivot.total_price);
            });
        },
        changeQty(e, index, model) {
            model.pivot.total_price = model.pivot.qty * model.price;
            this.computeOverallPrice();
        },
        claimAll() {
            Swal.fire({
                title: "Are you sure?",
                text: "You won't be able to revert this!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Yes, claim it all!"
            }).then(async result => {
                if (result.value) {
                    this.$Progress.start();
                    const salesLog = await axios.post(
                        "/api/sales",
                        this.models
                    );
                    axios
                        .post("/api/orders/claim-all")
                        .then(async ({ data }) => {
                            const ans = await Swal.fire({
                                title: "Thank you for choosing Farmerce",
                                text: "We hope you liked the item",
                                icon: "success",

                                confirmButtonColor: "#3085d6",
                                cancelButtonColor: "#d33",
                                confirmButtonText: "Okay"
                            });
                            Toast.fire({
                                icon: "success",
                                title: "Successfully claimed everything"
                            });
                            this.loadModels();
                            this.$Progress.finish();
                        });
                }
            });
        },
        async claim(id, model) {
            const res = await Swal.fire({
                title: "Are you sure?",
                text: "You won't be able to revert this!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Yes, i received the item!"
            });
            if (res.value) {
                const salesLog = await axios.post("/api/sales", [model]);
                const ans = await Swal.fire({
                    title: "Thank you for choosing Farmerce",
                    text: "We hope you liked the item",
                    icon: "success",

                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "Okay"
                });
                this.$Progress.start();
                axios.delete("/api/orders/" + id).then(({ data }) => {
                    Toast.fire({
                        icon: "success",
                        title: "Product successfully claimed"
                    });
                    this.loadModels();
                    this.$Progress.finish();
                });
            }
        }
    }
};
</script>
