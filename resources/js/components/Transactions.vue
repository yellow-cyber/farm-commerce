<template>
    <div class="container">
        <div class="flex flex-col mt-4">
            <div class="row pb-3">
                <div class="h5 font-weight-bold col-6 pt-3">Transactions</div>
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
                                    Order ID
                                </th>
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
                                    Total Price
                                </th>
                            </tr>
                        </thead>

                        <tbody class="bg-white">
                            <tr v-for="model in models" :key="model.id">
                                <td
                                    class="px-0 py-3 text-center whitespace-no-wrap border-b border-gray-200"
                                >
                                    <div
                                        class="text-sm leading-5 text-gray-900"
                                    >
                                        {{ model.id }}
                                    </div>
                                </td>
                                <td
                                    class="pl-3 py-3 whitespace-no-wrap border-b border-gray-200"
                                >
                                    <div class="flex items-center">
                                        <div class="ml-4">
                                            <div
                                                class="text-sm leading-5 font-medium text-gray-900"
                                            >
                                                Product #{{ model.product_id }}
                                            </div>
                                            <div
                                                class="text-sm leading-5 text-gray-500"
                                            >
                                                {{ model.shipping_address }}
                                                - {{ model.phone_number }}
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
                                        User #{{ model.buyer_id }}
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
                                        {{ model.qty }}
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
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="row py-5">
                <div class="col-6"></div>
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
            overallPrice: 0
        };
    },
    mounted() {
        this.loadModels();
    },
    methods: {
        async loadModels() {
            const res = await axios.get("/api/sales");

            if (res) {
                this.models = res.data;
            }
        }
    }
};
</script>
