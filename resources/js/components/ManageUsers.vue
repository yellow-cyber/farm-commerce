<template>
    <div>
        <div class="flex flex-col mt-8">
            <div class="row pb-3">
                <div class="h5 font-weight-bold col-6 pt-3">Manage Users</div>
                <div class="col-6 text-right">
                    <button
                        @click="newModal"
                        class="bg-white text-gray-800 font-bold rounded border-b-2 border-green-500 hover:border-green-600 hover:text-green-500 focus:outline-none shadow-md py-2 px-6 inline-flex items-center"
                    >
                        <span class="mr-2">Add New</span>
                        <svg
                            class="bi bi-person-plus-fill"
                            width="1em"
                            height="1em"
                            viewBox="0 0 16 16"
                            fill="currentColor"
                            xmlns="http://www.w3.org/2000/svg"
                        >
                            <path
                                fill-rule="evenodd"
                                d="M1 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm7.5-3a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1 0-1H13V5.5a.5.5 0 0 1 .5-.5z"
                            />
                            <path
                                fill-rule="evenodd"
                                d="M13 7.5a.5.5 0 0 1 .5-.5h2a.5.5 0 0 1 0 1H14v1.5a.5.5 0 0 1-1 0v-2z"
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
                                    Cash
                                </th>
                                <th
                                    class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider"
                                >
                                    Role
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
                            <tr v-for="user in users" :key="user.id">
                                <td
                                    class="px-6 py-4 whitespace-no-wrap border-b border-gray-200"
                                >
                                    <div class="flex items-center">
                                        <div>
                                            <div
                                                class="text-sm leading-5 font-medium text-gray-900"
                                            >
                                                {{ user.name }}
                                            </div>
                                            <div
                                                class="text-sm leading-5 text-gray-500"
                                            >
                                                {{ user.email }}
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
                                        P1000.00
                                    </div>
                                </td>

                                <td
                                    class="px-6 py-4 whitespace-no-wrap border-b border-gray-200 text-sm leading-5 text-gray-500"
                                >
                                    {{ user.profile.role | roleFilter }}
                                </td>

                                <td
                                    class="px-6 py-4 whitespace-no-wrap border-b border-gray-200 text-sm leading-5 font-medium"
                                >
                                    <svg
                                        @click="editModal(user)"
                                        class="bi fill-blue bi-pencil cursor-pointer transition duration-500 ease-in-out  hover:fill-blue transform hover:scale-150"
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
                                        @click="deleteUser(user.id)"
                                        class="bi fill-red text-center bi-trash cursor-pointer transition duration-500 ease-in-out  hover:fill-red transform hover:scale-150"
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

                    <!-- Modal -->
                    <div
                        class="modal fade text-left"
                        id="addNew"
                        tabindex="-1"
                        role="dialog"
                        aria-labelledby="addNewLabel"
                        aria-hidden="true"
                    >
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content rounded-0 border-0">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="addNewLabel">
                                        {{
                                            editMode
                                                ? "Edit User"
                                                : "Add New User"
                                        }}
                                    </h5>
                                    <button
                                        type="button"
                                        class="close"
                                        data-dismiss="modal"
                                        aria-label="Close"
                                    >
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <form
                                    @submit.prevent="
                                        editMode ? updateUser() : createUser()
                                    "
                                >
                                    <div class="modal-body">
                                        <div class="container">
                                            <div class="form-group">
                                                <label>Name</label>
                                                <input
                                                    v-model="form.name"
                                                    type="text"
                                                    name="name"
                                                    class="form-control rounded-0"
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
                                            <div class="form-group">
                                                <label>Email</label>
                                                <input
                                                    v-model="form.email"
                                                    type="email"
                                                    name="email"
                                                    class="form-control rounded-0"
                                                    :class="{
                                                        'is-invalid': form.errors.has(
                                                            'email'
                                                        )
                                                    }"
                                                />
                                                <has-error
                                                    :form="form"
                                                    field="email"
                                                ></has-error>
                                            </div>
                                            <div class="form-group">
                                                <label>Role</label>
                                                <select
                                                    v-model="form.role"
                                                    type="role"
                                                    name="role"
                                                    class="form-control rounded-0"
                                                    :class="{
                                                        'is-invalid': form.errors.has(
                                                            'role'
                                                        )
                                                    }"
                                                >
                                                    <option value="1"
                                                        >Administrator</option
                                                    >
                                                    <option value="0"
                                                        >Standard User</option
                                                    >
                                                </select>
                                                <has-error
                                                    :form="form"
                                                    field="role"
                                                ></has-error>
                                            </div>

                                            <div class="form-group">
                                                <label>Password</label>
                                                <input
                                                    v-model="form.password"
                                                    type="password"
                                                    name="password"
                                                    class="form-control rounded-0"
                                                    :class="{
                                                        'is-invalid': form.errors.has(
                                                            'password'
                                                        )
                                                    }"
                                                />
                                                <has-error
                                                    :form="form"
                                                    field="password"
                                                ></has-error>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button
                                            type="button"
                                            class="btn btn-outline-danger rounded-0"
                                            data-dismiss="modal"
                                        >
                                            Close
                                        </button>
                                        <button
                                            type="submit"
                                            class="btn btn-outline-success rounded-0"
                                        >
                                            {{ editMode ? "Update" : "Save" }}
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    <!-- End Modal -->
                </div>
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
                email: "",
                password: "",
                role: 0
            }),
            users: {},
            editMode: false
        };
    },
    mounted() {
        this.loadUser();
    },
    methods: {
        newModal() {
            this.editMode = false;
            this.form.reset();
            $("#addNew").modal("show");
        },
        createUser() {
            this.$Progress.start();
            this.form
                .post("/api/user")
                .then(({ data }) => {
                    this.$Progress.finish();
                    $("#addNew").modal("hide");
                    this.loadUser();
                    Toast.fire({
                        icon: "success",
                        title: "User Created Successfully"
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
        loadUser() {
            axios.get("/api/user").then(res => {
                this.users = res.data[0];
            });
        },
        deleteUser(id) {
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
                    this.form.delete("/api/user/" + id).then(({ data }) => {
                        Swal.fire(
                            "Deleted!",
                            "User deleted successfully.",
                            "success"
                        );
                        this.loadUser();
                    });
                }
            });
        },
        editModal(user) {
            this.editMode = true;
            $("#addNew").modal("show");
            user["role"] = user.profile.role;
            this.form.fill(user);
        },
        updateUser() {
            this.$Progress.start();
            this.form
                .put("/api/user/" + this.form.id)
                .then(({ data }) => {
                    this.$Progress.finish();
                    $("#addNew").modal("hide");
                    this.loadUser();
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
        }
    }
};
</script>
