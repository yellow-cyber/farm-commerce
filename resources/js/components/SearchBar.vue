<template>
    <div class="container">
        <div class="input-group mb-3">
            <input
                type="text"
                class="form-control rounded-0 py-4"
                placeholder="What do you need?"
                aria-label="What do you need?"
                aria-describedby="basic-addon2"
            />
            <div class="input-group-append">
                <button class="btn rounded-0 c-btn-green text-white px-3">
                    <svg
                        class="bi bi-search"
                        width="1em"
                        height="1em"
                        viewBox="0 0 16 16"
                        fill="currentColor"
                        xmlns="http://www.w3.org/2000/svg"
                    >
                        <path
                            fill-rule="evenodd"
                            d="M10.442 10.442a1 1 0 0 1 1.415 0l3.85 3.85a1 1 0 0 1-1.414 1.415l-3.85-3.85a1 1 0 0 1 0-1.415z"
                        />
                        <path
                            fill-rule="evenodd"
                            d="M6.5 12a5.5 5.5 0 1 0 0-11 5.5 5.5 0 0 0 0 11zM13 6.5a6.5 6.5 0 1 1-13 0 6.5 6.5 0 0 1 13 0z"
                        />
                    </svg>
                </button>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    mounted() {
        console.log("Component mounted.");
    }
};
</script>
