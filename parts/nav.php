
<nav class="w-full bg-white flex items-center justify-between flex-wrap py-4">

    <div class="inline-flex ml-4">
        <?php get_template_part('parts/brand') ?>
    </div>

    <button @click="toggle" :class="[menuOpen ? 'shadow-black' : 'shadow-slate-700']" class="transition-colors duration-200 bg-slate-800 shadow-inner mr-4 lg:hidden inline-flex items-center justify-center h-10 w-10 rounded outline-none focus:outline-none">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
            <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16" />
        </svg>
    </button>

    <div :class="[menuOpen ? 'flex mt-4 lg:mt-0' : 'hidden lg:flex mt-0']" class="w-full lg:w-auto">
        <?php webokstarter_nav(); ?>
    </div>
</nav>