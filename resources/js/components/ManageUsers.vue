<template>
    <div class="container pt-5">
        <div class="row pb-3">
            <div class="h5 font-weight-bold col-6 pt-3">Manage Users</div>
            <div class="col-6 text-right">
                <button
                    class="rounded-0 btn btn-outline-success"
                    @click="newModal"
                >
                    Add New User
                </button>
            </div>
        </div>
        <table class="table text-center table-hover table-bordered">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Cash</th>
                    <th scope="col">Role</th>
                    <th scope="col">Date Joined</th>
                    <th scope="col">Edit</th>
                    <th scope="col">Delete</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="user in users" :key="user.id">
                    <th scope="row">{{ user.id }}</th>
                    <td>{{ user.name }}</td>
                    <td>{{ user.email }}</td>
                    <td>128</td>
                    <td>{{ user.profile.role | roleFilter }}</td>
                    <!-- <td v-if="user.profile.role">Administrator</td>
                    <td v-else>Standard User</td> -->
                    <td>{{ user.created_at | prettyDate }}</td>
                    <td>
                        <button
                            @click="editModal(user)"
                            class="rounded-0 btn btn-outline-primary"
                        >
                            <svg
                                class="bi bi-pencil"
                                width="1em"
                                height="1em"
                                viewBox="0 0 16 16"
                                fill="currentColor"
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
                        </button>
                    </td>
                    <td>
                        <button
                            @click="deleteUser(user.id)"
                            class="rounded-0 btn btn-outline-danger"
                        >
                            <svg
                                class="bi bi-trash"
                                width="1em"
                                height="1em"
                                viewBox="0 0 16 16"
                                fill="currentColor"
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
                        </button>
                    </td>
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
                                <div class="modal-header ">
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
                </tr>
            </tbody>
        </table>
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
