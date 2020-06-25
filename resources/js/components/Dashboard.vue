<template>
    <div class="container">
        <h3 class="text-gray-700 text-3xl font-medium">Dashboard</h3>
        <statistics />
    </div>
</template>

<script>
import Statistics from "./Statistics";
export default {
    components: {
        statistics: Statistics
    }
};
</script>
