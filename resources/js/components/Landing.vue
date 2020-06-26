<template>
  <div class="flex bg-white" style="height:600px;">
    <div class="flex items-center text-center lg:text-left px-8 md:px-12 lg:w-1/2">
      <div>
        <h2 class="text-3xl font-semibold text-gray-800 md:text-4xl">
          Fresh and
          <span class="text-green-600">Organic</span>
        </h2>
        <p class="mt-2 text-sm text-gray-500 md:text-base">
          Farmerce proudly offers top-quality Farm supplies from some
          of the leading brands in the industry. Everything from eggs
          to chickens; as well as a wide variety of plants and
          livestock supplies.
        </p>
      </div>
    </div>
    <div
      class="hidden lg:block lg:w-1/2"
      style="clip-path:polygon(10% 0, 100% 0%, 100% 100%, 0 100%)"
    >
      <div
        class="h-full bg-cover object-cover bg-green-600"
        style="background-image: url('/images/cover/carousel.jpg')"
      >
        <div class="h-full bg-black opacity-25"></div>
      </div>
    </div>
  </div>
</template>

<script>
export default {};
</script>
