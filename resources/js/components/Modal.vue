<template>
    <div class="w-full h-screen bg-grey-lighter">
        <form
            @submit.prevent="editMode ? updateUser() : createUser()"
            class="container flex flex-col lg:flex-row justify-center lg:justify-between font-sans mx-auto py-8"
        >
            <div class="w-full lg:w-1/3 px-2 mb-6 lg:mb-0">
                <div class="bg-white shadow rounded-lg">
                    <div class="border-b border-grey-lighter p-4">
                        <h3 class="text-grey-darkest">
                            Get access
                        </h3>
                    </div>
                    <div class="p-4">
                        <div class="mb-4">
                            <label
                                for="name"
                                class="uppercase text-sm tracking-wide font-semibold text-grey-darker px-2"
                            >
                                Name
                            </label>
                            <input
                                v-model="form.name"
                                type="text"
                                name="name"
                                class="no-appearance bg-grey-lighter w-full leading-normal py-2 px-3 rounded border-b border-red-light mt-2 focus:outline-none"
                                :class="{
                                    'is-invalid': form.errors.has('name')
                                }"
                            />
                            <has-error :form="form" field="name"></has-error>
                        </div>
                        <div class="mb-4">
                            <label
                                for="email"
                                class="uppercase text-sm tracking-wide font-semibold text-grey-darker px-2"
                            >
                                Email
                            </label>
                            <input
                                v-model="form.email"
                                type="text"
                                name="email"
                                class="no-appearance bg-grey-lighter w-full leading-normal py-2 px-3 rounded border-b border-red-light mt-2 focus:outline-none"
                                :class="{
                                    'is-invalid': form.errors.has('email')
                                }"
                            />
                            <has-error :form="form" field="email"></has-error>
                        </div>

                        <!-- Drop -->
                        <div class="mb-4">
                            <div class="flex justify-between items-center px-2">
                                <label
                                    for="role"
                                    class="uppercase text-sm tracking-wide font-semibold text-grey-darker"
                                >
                                    Role
                                </label>
                                <a
                                    href="#"
                                    class="no-underline text-grey-darker"
                                >
                                    <i class="fas fa-info-circle"></i>
                                </a>
                            </div>
                            <div class="relative mt-2">
                                <select
                                    class="block appearance-none w-full bg-grey-lighter border-b border-grey-light text-grey-darker py-3 px-4 pr-8 rounded leading-tight focus:outline-none"
                                    id="role"
                                    :class="{
                                        'is-invalid': form.errors.has('role')
                                    }"
                                >
                                    <option>Select a role</option>
                                    <option value="1">Administrator</option>
                                    <option value="0">Standard User</option>
                                </select>
                                <has-error
                                    :form="form"
                                    field="role"
                                ></has-error>
                                <div
                                    class="pointer-events-none absolute pin-y pin-r flex items-center px-2 text-grey-darker"
                                >
                                    <svg
                                        class="fill-current h-4 w-4"
                                        xmlns="http://www.w3.org/2000/svg"
                                        viewBox="0 0 20 20"
                                    >
                                        <path
                                            d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"
                                        />
                                    </svg>
                                </div>
                            </div>
                        </div>

                        <div class="mb-4">
                            <label
                                for="password"
                                class="uppercase text-sm tracking-wide font-semibold text-grey-darker px-2"
                            >
                                Password
                            </label>
                            <input
                                v-model="form.password"
                                type="text"
                                name="password"
                                class="no-appearance bg-grey-lighter w-full leading-normal py-2 px-3 rounded border-b border-red-light mt-2 focus:outline-none"
                                :class="{
                                    'is-invalid': form.errors.has('password')
                                }"
                            />
                            <has-error
                                :form="form"
                                field="password"
                            ></has-error>
                        </div>

                        <div
                            class="flex justify-between items-center pt-4 mb-4"
                            data-toggle="toggler"
                            data-target="#subscribe"
                        >
                            <div
                                id="subscribe"
                                class="bg-grey rounded-full pl-px pr-4 py-px cursor-pointer"
                            >
                                <div
                                    class="w-4 h-4 bg-white rounded-full"
                                ></div>
                            </div>
                            <label
                                for="subscribe"
                                class="text-grey-darker text-sm cursor-pointer select-none"
                            >
                                Allow to subscribe to our newsletter
                            </label>
                        </div>
                    </div>
                    <button
                        type="submit"
                        class="uppercase font-bold w-full bg-green-light text-lg text-green-lightest rounded-b-lg p-3 cursor-not-allowed opacity-50"
                        disabled
                    >
                        Send request
                    </button>
                </div>
            </div>
        </form>
    </div>
</template>

<script>
export default {
    props: ["editMode"]
};
</script>
