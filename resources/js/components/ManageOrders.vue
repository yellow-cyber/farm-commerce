<template>
    <div class="container">
        <div class="flex flex-col mt-4">
            <div class="row pb-3">
                <div class="h5 font-weight-bold col-6 pt-3">Orders</div>
            </div>

            <div
                class="-my-2 border-bottom pb-3 py-2 overflow-x-auto sm:-mx-6 sm:px-6 lg:-mx-8 lg:px-8"
            >
                <div
                    class="align-middle inline-block min-w-full shadow overflow-hidden sm:rounded-lg border-b border-gray-200"
                >
                    <table class="min-w-full">
                        <thead>
                            <tr>
                                <th
                                    class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-center text-xs leading-4 font-medium text-gray-900 uppercase tracking-wider"
                                >
                                    Name
                                </th>
                                <th
                                    class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-center text-xs leading-4 font-medium text-gray-900 uppercase tracking-wider"
                                >
                                    Buyer
                                </th>
                                <th
                                    class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-center text-xs leading-4 font-medium text-gray-900 uppercase tracking-wider"
                                >
                                    Date
                                </th>
                                <th
                                    class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-center text-xs leading-4 font-medium text-gray-900 uppercase tracking-wider"
                                >
                                    Quantity
                                </th>

                                <th
                                    class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-center text-xs leading-4 font-medium text-gray-900 uppercase tracking-wider"
                                >
                                    Unit Price
                                </th>
                                <th
                                    class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-center text-xs leading-4 font-medium text-gray-900 uppercase tracking-wider"
                                >
                                    Total Price
                                </th>
                                <th
                                    class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-center text-xs leading-4 font-medium text-gray-900 uppercase tracking-wider"
                                >
                                    Claim
                                </th>
                            </tr>
                        </thead>

                        <tbody class="bg-white">
                            <tr
                                v-for="model in filteredModels"
                                :key="model.pivot.id"
                            >
                                <td
                                    class="pl-3 py-3 whitespace-no-wrap border-b border-gray-200"
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
                                                class="text-sm text-left leading-5 font-medium text-gray-900"
                                            >
                                                {{ model.name }}
                                            </div>
                                            <div
                                                class="text-sm text-left leading-5 text-gray-500"
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
                                    class="px-0 py-3 text-center whitespace-no-wrap border-b border-gray-200"
                                >
                                    <div
                                        class="text-sm leading-5 text-gray-900"
                                    >
                                        User - {{ model.pivot.buyer_id }}
                                    </div>
                                </td>
                                <td
                                    class="px-0 py-3 text-center whitespace-no-wrap border-b border-gray-200"
                                >
                                    <div
                                        class="text-sm leading-5 text-gray-900"
                                    >
                                        {{ model.created_at | prettyDate }}
                                    </div>
                                </td>
                                <td
                                    class="px-0 py-3 text-center whitespace-no-wrap border-b border-gray-200"
                                >
                                    <div
                                        class="text-sm leading-5 text-gray-900"
                                    >
                                        {{ model.pivot.qty }}
                                    </div>
                                </td>

                                <td
                                    class="px-0 py-3 text-center whitespace-no-wrap border-b border-gray-200"
                                >
                                    <div
                                        class="text-sm leading-5 text-gray-900"
                                    >
                                        <span>&#8369;</span>
                                        {{ model.price | dec2 }}
                                    </div>
                                </td>
                                <td
                                    class="px-0 py-3 text-center whitespace-no-wrap border-b border-gray-200 text-sm leading-5 text-gray-900"
                                >
                                    <span>&#8369;</span>
                                    {{ model.pivot.total_price | dec2 }}
                                </td>
                                <td
                                    class="pr-3 py-3 text-center whitespace-no-wrap border-b border-gray-200 text-sm leading-5 text-gray-900"
                                >
                                    <button
                                        @click="confirm(model)"
                                        class="bg-white shadow satext-gray-800 font-bold rounded border-b-2 border-green-500 hover:border-green-600 hover:text-green-500 focus:outline-none shadow-md py-2 px-6 inline-flex items-center"
                                    >
                                        <span class="mr-2">Confirm</span>
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

            <div class="row py-5">
                <div class="col-6"></div>

                <div class="col-6 text-right">
                    <div class="col-12 font-weight-bold h5">
                        Total Price:
                        <span>&#8369;</span>
                        {{ overallPrice | dec2 }}
                    </div>
                    <div class="col-12 pt-2">
                        <button
                            @click="confirmAll"
                            class="bg-white shadow satext-gray-800 font-bold rounded border-b-2 border-green-500 hover:border-green-600 hover:text-green-500 focus:outline-none shadow-md py-2 px-6 inline-flex items-center"
                        >
                            <span class="mr-2">CONFIRM ALL</span>
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
            overallPrice: 0,
            searchText: ""
        };
    },
    mounted() {
        this.loadModels();
        Fire.$on("onSearchChange", e => {
            this.searchText = e;
        });
    },
    methods: {
        async loadModels() {
            this.$Progress.start();
            Fire.$emit("updatedOrdersTable");
            const res = await axios.get("/api/orders");

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
        confirmAll() {
            Swal.fire({
                title: "Are you sure?",
                text: "You won't be able to revert this!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Yes, confirm it all!"
            }).then(async result => {
                if (result.value) {
                    this.$Progress.start();
                    const salesLog = await axios.post(
                        "/api/sales",
                        this.models
                    );
                    console.log(salesLog.data);
                    axios
                        .post("/api/orders/confirm-all", this.models)
                        .then(({ data }) => {
                            Toast.fire({
                                icon: "success",
                                title: "Successfully delivered everything"
                            });
                            this.loadModels();
                            this.$Progress.finish();
                        });
                }
            });
        },
        async confirm(model) {
            const res = await Swal.fire({
                title: "Are you sure?",
                text: "You won't be able to revert this!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Yes, the item was successfully delivered!"
            });
            if (res.value) {
                this.$Progress.start();

                const salesLog = await axios.post("/api/sales", [model]);
                axios
                    .post("/api/orders/confirm/" + model.id, {
                        model
                    })
                    .then(({ data }) => {
                        console.log(data);
                        Toast.fire({
                            icon: "success",
                            title: "Product successfully delivered"
                        });
                        this.loadModels();
                        this.$Progress.finish();
                    })
                    .catch(() => {
                        this.$Progress.fail();
                    });
            }
        }
    },
    computed: {
        filteredModels() {
            return this.models.filter(model => {
                return model.name
                    .toLowerCase()
                    .includes(this.searchText.toLowerCase());
            });
        }
    }
};
</script>
