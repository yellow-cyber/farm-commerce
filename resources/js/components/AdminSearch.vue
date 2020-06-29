<template>
    <input
        @keyup="searchChange"
        class="focus:outline-none   form-input w-32 sm:w-64 rounded-md pl-10 pr-4 focus:border-indigo-600 "
        type="text"
        placeholder="Search"
    />
</template>

<script>
export default {
    mounted() {},
    methods: {
        searchChange(e) {
            Fire.$emit("onSearchChange", e.target.value);
        }
    }
};
</script>
