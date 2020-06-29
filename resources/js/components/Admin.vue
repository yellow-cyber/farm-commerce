<template>
    <div class="container">
        <statistics></statistics>
        <router-view></router-view>
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
