<style>
body {
    font-family: "IBM Plex Mono", sans-serif;
}
[x-cloak] {
    display: none;
}

.line {
    background: repeating-linear-gradient(
        to bottom,
        #eee,
        #eee 1px,
        #fff 1px,
        #fff 8%
    );
}
.tick {
    background: repeating-linear-gradient(
        to right,
        #eee,
        #eee 1px,
        #fff 1px,
        #fff 5%
    );
}
</style>
<template>
    <div>
        <div class="antialiased sans-serif bg-gray-200 w-full min-h-screen">
            <productsSold></productsSold>
            <transactions></transactions>
        </div>
    </div>
</template>

<script>
import Statistics from "./Statistics";
import transactions from "./Transactions";
import productsSold from "./ProductsSold";

export default {
    components: {
        statistics: Statistics,
        transactions,
        productsSold
    }
};
</script>
