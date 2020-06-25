<template>
    <p
        x-on:click="dropdownOpen = !dropdownOpen"
        class="cursor-pointer text-gray-700 text-base font-medium"
    >
        {{ this.authName }}
    </p>
</template>

<script>
export default {
    props: ["name", "money", "id"],
    data: function() {
        return {
            authName: this.name,
            authId: this.id
        };
    },
    created() {
        Fire.$on("updatedUsersTable", () => {
            axios.get("/api/user/" + this.authId).then(res => {
                this.authName = res.data.name;
            });
        });
    }
};
</script>
