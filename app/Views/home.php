<?= $this->include('templates/header') ?>

<section class="bg-[url('/images/bg-brick.jpg')] bg-cover bg-center py-20">
  <div class="container mx-auto flex flex-col md:flex-row items-center justify-between px-6">
    
    <!-- Left Text -->
    <div class="md:w-1/2 text-left">
      <p class="text-yellow-400 font-bold mb-2">WELCOME FRESHEAT</p>
      <h1 class="text-5xl font-extrabold leading-tight mb-6">SPICY FRIED CHICKEN</h1>
      <a href="#" class="inline-block bg-red-600 hover:bg-red-500 text-white font-bold py-3 px-6 rounded">ORDER NOW</a>
    </div>

    <!-- Right Image -->
    <div class="relative md:w-1/2 mt-10 md:mt-0">
      <img src="<?= base_url('images/chicken-bucket.png') ?>" alt="Fried Chicken" class="w-full max-w-sm mx-auto">
      <div class="absolute top-0 right-0 transform translate-x-1/2 -translate-y-1/2 bg-yellow-400 text-black font-bold rounded-full px-6 py-2 text-lg shadow-lg">
        50% OFF
      </div>
    </div>

  </div>
</section>

<?= $this->include('templates/footer') ?>
