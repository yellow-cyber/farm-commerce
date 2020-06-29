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
    },
    data() {
        return {
            chartData: [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0],
            labels: [
                "Jan",
                "Feb",
                "Mar",
                "Apr",
                "May",
                "Jun",
                "Jul",
                "Aug",
                "Sep",
                "Oct",
                "Nov",
                "Dec"
            ],
            tooltipContent: "",
            tooltipOpen: false,
            tooltipX: 0,
            tooltipY: 0,
            totalSales: 0
        };
    },
    async mounted() {
        const res = await axios.get("/api/sales");
        this.totalSales = res.data.length;
        res.data.forEach(data => {
            let date = moment(data.created_at).format("MMM");
            this.labels.forEach((label, i) => {
                if (date == label) {
                    this.chartData[i] += 1;
                }
            });
        });
    },
    methods: {
        showTooltip(e) {
            this.tooltipContent = e.target.textContent;
            this.tooltipX = e.target.offsetLeft - e.target.clientWidth;
            this.tooltipY = e.target.clientHeight + e.target.clientWidth;
        },
        hideTooltip(e) {
            this.tooltipContent = "";
            this.tooltipOpen = false;
            this.tooltipX = 0;
            this.tooltipY = 0;
        }
    }
};
</script>
