<template>
  <div class="flex bg-white" style="height:600px;">
    <div class="flex items-center text-center lg:text-left px-8 md:px-12 lg:w-1/2">
      <div>
        <h2 class="text-3xl font-semibold text-gray-800 md:text-4xl">
          About
          <span class="text-green-600">Us</span>
        </h2>
        <p class="mt-2 text-sm text-gray-500 md:text-base">
          Founded in June 2020 and based in Tacloban City, Leyte, Philippines, Farmerce is a trusted
          community marketplace for people to list, discover, and buy unique farming supplies in the region.
          Whether an egg or a carabao, Farmerce offers farming supplies at the best prices and the highest quality. Farmerce is the easiest
          way for farmers to monetize their supplies and showcase it to an audience of millions.
        </p>
      </div>
    </div>
    <div
      class="hidden lg:block lg:w-1/2"
      style="clip-path:polygon(10% 0, 100% 0%, 100% 100%, 0 100%)"
    >
      <div
        class="h-full bg-cover object-cover bg-green-600"
        style="background-image: url('/images/cover/apples.jpg')"
      >
        <div class="h-full bg-black opacity-25"></div>
      </div>
    </div>
  </div>
</template>

<script>
export default {};
</script>
