<template>
    <div class="container">
        <h3 class="text-gray-700 text-3xl font-medium">Products Table</h3>
        <div class="flex flex-col mt-4">
            <div class="row pb-3">
                <div class="h5 font-weight-bold col-6 pt-3">
                    Manage Products
                </div>
                <div class="col-6 text-right">
                    <button
                        @click="newModal"
                        class="bg-white text-gray-800 font-bold rounded border-b-2 border-green-500 hover:border-green-600 hover:text-green-500 focus:outline-none shadow-md py-2 px-6 inline-flex items-center"
                    >
                        <span class="mr-2">Add New</span>
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

            <div
                class="-my-2 py-2 overflow-x-auto sm:-mx-6 sm:px-6 lg:-mx-8 lg:px-8"
            >
                <div
                    class="align-middle inline-block min-w-full shadow overflow-hidden sm:rounded-lg border-b border-gray-200"
                >
                    <table class="min-w-full">
                        <thead>
                            <tr>
                                <th
                                    class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider"
                                >
                                    Name
                                </th>
                                <th
                                    class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider"
                                >
                                    Date Created
                                </th>

                                <th
                                    class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider"
                                >
                                    Price
                                </th>
                                <th
                                    class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider"
                                >
                                    Type
                                </th>
                                <th
                                    class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider"
                                >
                                    Quantity
                                </th>
                                <th
                                    class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider"
                                >
                                    Description
                                </th>

                                <th
                                    class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider"
                                >
                                    Edit
                                </th>
                                <th
                                    class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider"
                                >
                                    Delete
                                </th>
                            </tr>
                        </thead>

                        <tbody class="bg-white">
                            <tr v-for="model in models" :key="model.id">
                                <td
                                    class="px-6 py-4 whitespace-no-wrap border-b border-gray-200"
                                >
                                    <div class="flex items-center">
                                        <div class="flex-shrink-0 h-10 w-16">
                                            <img
                                                class="h-10 w-16 "
                                                :src="
                                                    '/images/products/' +
                                                        model.img
                                                "
                                                alt=""
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
                                                Item #{{ model.id }}
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td
                                    class="px-6 py-4 whitespace-no-wrap border-b border-gray-200 text-sm leading-5 text-gray-500"
                                >
                                    {{ model.created_at | prettyDate }}
                                </td>

                                <td
                                    class="px-6 py-4 whitespace-no-wrap border-b border-gray-200"
                                >
                                    <div
                                        class="text-sm leading-5 text-gray-500"
                                    >
                                        <span>&#8369;</span>
                                        {{ model.price }}
                                    </div>
                                </td>
                                <td
                                    class="px-6 py-4 whitespace-no-wrap border-b border-gray-200 text-sm leading-5 text-gray-500"
                                >
                                    {{ model.type | typeFilter }}
                                </td>
                                <td
                                    class="px-6 py-4 whitespace-no-wrap border-b border-gray-200 text-sm leading-5 text-gray-500"
                                >
                                    {{ model.qty }}
                                </td>

                                <td
                                    class="px-6 py-4 whitespace-no-wrap border-b border-gray-200 text-sm leading-5 text-gray-500"
                                >
                                    {{ model.desc | prettyDescription }}
                                </td>

                                <td
                                    class="px-6 py-4 whitespace-no-wrap border-b border-gray-200 text-sm leading-5 font-medium"
                                >
                                    <svg
                                        @click="editModal(model)"
                                        class="bi fill-blue bi-pencil cursor-pointer transition duration-500 ease-in-out hover:fill-blue transform hover:scale-150"
                                        width="2em"
                                        height="1.3em"
                                        viewBox="0 0 16 16"
                                        fill="blue "
                                        xmlns="http://www.w3.org/2000/svg"
                                    >
                                        <path
                                            fill-rule="evenodd"
                                            d="M11.293 1.293a1 1 0 0 1 1.414 0l2 2a1 1 0 0 1 0 1.414l-9 9a1 1 0 0 1-.39.242l-3 1a1 1 0 0 1-1.266-1.265l1-3a1 1 0 0 1 .242-.391l9-9zM12 2l2 2-9 9-3 1 1-3 9-9z"
                                        />
                                        <path
                                            fill-rule="evenodd"
                                            d="M12.146 6.354l-2.5-2.5.708-.708 2.5 2.5-.707.708zM3 10v.5a.5.5 0 0 0 .5.5H4v.5a.5.5 0 0 0 .5.5H5v.5a.5.5 0 0 0 .5.5H6v-1.5a.5.5 0 0 0-.5-.5H5v-.5a.5.5 0 0 0-.5-.5H3z"
                                        />
                                    </svg>
                                </td>

                                <td
                                    class="px-6 py-4 whitespace-no-wrap border-b text-center border-gray-200 text-sm leading-5 font-medium"
                                >
                                    <svg
                                        @click="deleteModel(model.id)"
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

                <!-- Modal -->
                <div
                    class="modal fade"
                    id="addNew"
                    tabindex="-1"
                    role="dialog"
                    aria-labelledby="addNewLabel"
                    aria-hidden="true"
                >
                    <div class="modal-dialog-centered modal-dialog">
                        <div class="modal-content border-0 shadow">
                            <form
                                enctype="multipart/form-data"
                                @submit.prevent="
                                    editMode ? updateModel() : createModel()
                                "
                                class="flex flex-col lg:flex-row justify-center lg:justify-between font-sans"
                            >
                                <div class="w-full mb-6 lg:mb-0">
                                    <div class="bg-white shadow rounded-lg">
                                        <div
                                            class="border-b border-grey-lighter p-4"
                                        >
                                            <div class="row">
                                                <div class="col-6">
                                                    <h3
                                                        class="text-grey-darkest"
                                                    >
                                                        {{
                                                            editMode
                                                                ? "Edit Product"
                                                                : "Add New Product"
                                                        }}
                                                    </h3>
                                                </div>
                                                <div class="col-6">
                                                    <svg
                                                        class="ml-auto bi bi-x-circle hover:fill-red cursor-pointer"
                                                        data-dismiss="modal"
                                                        width="1em"
                                                        height="1em"
                                                        viewBox="0 0 16 16"
                                                        fill="red"
                                                        xmlns="http://www.w3.org/2000/svg"
                                                    >
                                                        <path
                                                            fill-rule="evenodd"
                                                            d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"
                                                        />
                                                        <path
                                                            fill-rule="evenodd"
                                                            d="M11.854 4.146a.5.5 0 0 1 0 .708l-7 7a.5.5 0 0 1-.708-.708l7-7a.5.5 0 0 1 .708 0z"
                                                        />
                                                        <path
                                                            fill-rule="evenodd"
                                                            d="M4.146 4.146a.5.5 0 0 0 0 .708l7 7a.5.5 0 0 0 .708-.708l-7-7a.5.5 0 0 0-.708 0z"
                                                        />
                                                    </svg>
                                                </div>
                                            </div>

                                            <div class="p-4">
                                                <div class="mt-2">
                                                    <label
                                                        class="w-48 ml-auto mr-auto flex flex-col items-center px-4 py-6 bg-white text-blue rounded-lg shadow-sm tracking-wide uppercase border border-blue cursor-pointer hover:bg-blue hover:text-white"
                                                    >
                                                        <svg
                                                            v-if="noImage"
                                                            class="bi w-8 h-8 bi-image"
                                                            width="1em"
                                                            height="1em"
                                                            viewBox="0 0 16 16"
                                                            fill="currentColor"
                                                            xmlns="http://www.w3.org/2000/svg"
                                                        >
                                                            <path
                                                                fill-rule="evenodd"
                                                                d="M14.002 2h-12a1 1 0 0 0-1 1v10a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V3a1 1 0 0 0-1-1zm-12-1a2 2 0 0 0-2 2v10a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V3a2 2 0 0 0-2-2h-12z"
                                                            />
                                                            <path
                                                                d="M10.648 7.646a.5.5 0 0 1 .577-.093L15.002 9.5V14h-14v-2l2.646-2.354a.5.5 0 0 1 .63-.062l2.66 1.773 3.71-3.71z"
                                                            />
                                                            <path
                                                                fill-rule="evenodd"
                                                                d="M4.502 7a1.5 1.5 0 1 0 0-3 1.5 1.5 0 0 0 0 3z"
                                                            />
                                                        </svg>
                                                        <span
                                                            v-if="noImage"
                                                            class="mt-2 text-base leading-normal"
                                                            >Select an
                                                            image</span
                                                        >
                                                        <img
                                                            v-if="!noImage"
                                                            :src="
                                                                getProductPhoto()
                                                            "
                                                            alt="Product Photo"
                                                        />

                                                        <input
                                                            id="imageReader"
                                                            type="file"
                                                            @change="
                                                                readImage(
                                                                    $event
                                                                )
                                                            "
                                                            class="hidden"
                                                            :class="{
                                                                'is-invalid': form.errors.has(
                                                                    'img'
                                                                )
                                                            }"
                                                        />
                                                        <has-error
                                                            :form="form"
                                                            field="img"
                                                        ></has-error>
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="mb-4">
                                                <label
                                                    for="name"
                                                    class="uppercase text-sm tracking-wide font-semibold text-grey-darker px-2"
                                                    >Name</label
                                                >
                                                <input
                                                    v-model="form.name"
                                                    type="text"
                                                    name="name"
                                                    class="no-appearance bg-grey-lighter w-full leading-normal py-2 px-3 rounded border-b border-red-light mt-2 focus:outline-none"
                                                    :class="{
                                                        'is-invalid': form.errors.has(
                                                            'name'
                                                        )
                                                    }"
                                                />
                                                <has-error
                                                    :form="form"
                                                    field="name"
                                                ></has-error>
                                            </div>
                                            <div class="mb-4">
                                                <label
                                                    for="price"
                                                    class="uppercase text-sm tracking-wide font-semibold text-grey-darker px-2"
                                                    >Price</label
                                                >
                                                <input
                                                    v-model="form.price"
                                                    type="number"
                                                    step="any"
                                                    name="price"
                                                    class="no-appearance bg-grey-lighter w-full leading-normal py-2 px-3 rounded border-b border-red-light mt-2 focus:outline-none"
                                                    :class="{
                                                        'is-invalid': form.errors.has(
                                                            'price'
                                                        )
                                                    }"
                                                />
                                                <has-error
                                                    :form="form"
                                                    field="price"
                                                ></has-error>
                                            </div>
                                            <!-- Drop -->
                                            <div class="mb-4">
                                                <div
                                                    class="flex justify-between items-center px-2"
                                                >
                                                    <label
                                                        for="type"
                                                        class="uppercase text-sm tracking-wide font-semibold text-grey-darker"
                                                        >Type</label
                                                    >
                                                </div>
                                                <div class="relative mt-2">
                                                    <select
                                                        class="block appearance-none w-full bg-grey-lighter border-b border-grey-light text-grey-darker py-3 px-4 pr-8 rounded leading-tight focus:outline-none"
                                                        id="type"
                                                        v-model="form.type"
                                                        type="type"
                                                        name="type"
                                                        :class="{
                                                            'is-invalid': form.errors.has(
                                                                'type'
                                                            )
                                                        }"
                                                    >
                                                        <option value="1">
                                                            Livestock / each
                                                        </option>
                                                        <option value="0">
                                                            Plant / kilo
                                                        </option>
                                                    </select>
                                                    <has-error
                                                        :form="form"
                                                        field="type"
                                                    ></has-error>
                                                </div>
                                            </div>

                                            <div class="mb-4">
                                                <label
                                                    for="qty"
                                                    class="uppercase text-sm tracking-wide font-semibold text-grey-darker px-2"
                                                    >Quantity</label
                                                >
                                                <input
                                                    v-model="form.qty"
                                                    type="number"
                                                    name="qty"
                                                    class="no-appearance bg-grey-lighter w-full leading-normal py-2 px-3 rounded border-b border-red-light mt-2 focus:outline-none"
                                                    :class="{
                                                        'is-invalid': form.errors.has(
                                                            'qty'
                                                        )
                                                    }"
                                                />
                                                <has-error
                                                    :form="form"
                                                    field="qty"
                                                ></has-error>
                                            </div>

                                            <div class="mb-4">
                                                <label
                                                    for="desc"
                                                    class="uppercase text-sm tracking-wide font-semibold text-grey-darker px-2"
                                                    >Description</label
                                                >
                                                <textarea
                                                    v-model="form.desc"
                                                    type="desc"
                                                    name="desc"
                                                    class="no-appearance bg-grey-lighter w-full leading-normal py-2 px-3 rounded border-b border-red-light mt-2 focus:outline-none"
                                                    :class="{
                                                        'is-invalid': form.errors.has(
                                                            'desc'
                                                        )
                                                    }"
                                                />
                                                <has-error
                                                    :form="form"
                                                    field="desc"
                                                ></has-error>
                                            </div>
                                        </div>
                                        <button
                                            type="submit"
                                            class="uppercase font-bold w-full btn-success text-lg text-white rounded-lg p-3 cursor-not-allowed opacity-50"
                                            @click="
                                                editMode
                                                    ? updateModel
                                                    : createModel
                                            "
                                        >
                                            {{ editMode ? "Update" : "Save" }}
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <!-- End Modal -->
            </div>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            form: new Form({
                id: "",
                name: "",
                price: "",
                qty: "",
                desc: "",
                img: null,
                type: 0
            }),
            modelName: "products",
            models: {},
            editMode: false,
            image: null,
            noImage: true
        };
    },
    mounted() {
        this.loadModels();
    },
    methods: {
        newModal() {
            this.noImage = true;
            this.editMode = false;
            this.form.reset();
            $("#addNew").modal("show");
        },
        createModel() {
            this.$Progress.start();
            this.form
                .post("/api/" + this.modelName, {
                    transformRequest: [
                        function(data, headers) {
                            return objectToFormData(data);
                        }
                    ],
                    onUploadProgress: e => {
                        // Do whatever you want with the progress event
                        // console.log(e)
                    }
                })
                .then(({ data }) => {
                    this.$Progress.finish();
                    $("#addNew").modal("hide");
                    this.loadModels();
                    Toast.fire({
                        icon: "success",
                        title: "Product Created Successfully"
                    });
                    console.log(data);
                })
                .catch(err => {
                    Toast.fire({
                        icon: "warning",
                        title: "Invalid form"
                    });
                    this.$Progress.fail();
                });
        },
        loadModels() {
            axios.get("/api/" + this.modelName).then(res => {
                this.models = res.data;
            });
        },
        deleteModel(id) {
            Swal.fire({
                title: "Are you sure?",
                text: "You won't be able to revert this!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Yes, delete it!"
            }).then(result => {
                if (result.value) {
                    this.$Progress.start();
                    let apiRequest = "/api/" + this.modelName + "/" + id;
                    this.form.delete(apiRequest).then(({ data }) => {
                        Toast.fire({
                            icon: "success",
                            title: "Product deleted successfully"
                        });
                        this.$Progress.finish();
                        this.loadModels();
                    });
                }
            });
        },
        editModal(model) {
            this.noImage = false;
            this.editMode = true;
            $("#addNew").modal("show");
            this.form.fill(model);

            this.image = "/" + this.form.img;
        },
        updateModel(e) {
            this.$Progress.start();
            let apiRequest = "/api/" + this.modelName + "/" + this.form.id;
            this.form
                .put(apiRequest)
                .then(({ data }) => {
                    this.$Progress.finish();
                    $("#addNew").modal("hide");
                    this.loadModels();
                    Fire.$emit("updatedUsersTable");
                    Toast.fire({
                        icon: "success",
                        title: "User Updated Successfully"
                    });
                })
                .catch(err => {
                    Toast.fire({
                        icon: "warning",
                        title: "Invalid Form!"
                    });
                    this.$Progress.fail();
                });
        },
        readImage(e) {
            // this.image = URL.createObjectURL(image.target.files[0]);

            // this.form.img = image.target.files[0];
            // console.log(this.image + "  image = " + this.form.img);
            this.noImage = false;
            let file = e.target.files[0];
            let reader = new FileReader();
            let limit = 1024 * 1024 * 2;
            if (file["size"] > limit) {
                Swal.fire({
                    type: "error",
                    title: "Oops...",
                    text: "You are uploading a large file"
                });
                return false;
            }
            if (file["type"] == "image/svg+xml") {
                Swal.fire({
                    type: "error",
                    title: "Sorry...",
                    text: "SVG files are not supported"
                });
                return false;
            }
            reader.onloadend = file => {
                this.form.img = reader.result;
            };
            reader.readAsDataURL(file);
        },
        getProductPhoto() {
            let img =
                this.form.img.length > 200
                    ? this.form.img
                    : "/images/products/" + this.form.img;

            if (this.form.img != null) {
            }
            return img;
        }
    }
};
</script>
