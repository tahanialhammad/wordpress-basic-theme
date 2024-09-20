<!doctype html>
<html <?php language_attributes(); ?>>

<head>
  <title><?php bloginfo('name'); ?> | <?php is_front_page() ? bloginfo('description') : wp_title(''); ?></title>
  
  <meta charset="<?php bloginfo('charset'); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="profile" href="https://gmpg.org/xfn/11">
  
  <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
  <?php wp_body_open(); ?>
  
  <div id="page" class="sitett container mx-auto px-4">
    <a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e('Skip to content', 'standard_theme'); ?></a>
    
    <header class="inset-x-0 top-0 z-50">
      <nav class="flex items-center justify-between p-6 lg:px-8" aria-label="Global">
        
        <!-- Site Branding -->
        <div class="flex lg:flex-1 site-logo">
          <?php
          the_custom_logo();
          if (is_front_page() && is_home()) :
          ?>
            <h1 class="site-title">
              <a href="<?php echo esc_url(home_url('/')); ?>" rel="home"><?php bloginfo('name'); ?></a>
            </h1>
          <?php else : ?>
            <p class="site-title">
              <a href="<?php echo esc_url(home_url('/')); ?>" rel="home"><?php bloginfo('name'); ?></a>
            </p>
          <?php endif;
          $standard_theme_description = get_bloginfo('description', 'display');
          if ($standard_theme_description || is_customize_preview()) :
          ?>
            <p class="site-description"><?php echo $standard_theme_description; ?></p>
          <?php endif; ?>
        </div><!-- .site-branding -->
        
        <!-- Mobile Menu Toggle Button -->
        <div class="flex lg:hidden">
          <button id="mobile-menu-toggle" type="button" class="-m-2.5 inline-flex items-center justify-center rounded-md p-2.5 text-gray-700">
            <span class="sr-only">Open main menu</span>
            <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
              <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
            </svg>
          </button>
        </div>
        
        <!-- Desktop Menu -->
        <?php
        wp_nav_menu(
          array(
            'theme_location' => 'menu-1',
            'menu_id'        => 'primary-menu',
            'menu_class'     => 'hidden lg:flex lg:gap-x-12',
          )
        );
        ?>
        
        <!-- Login Link -->
        <div class="hidden lg:flex lg:flex-1 lg:justify-end">
          <a href="#" class="text-sm font-semibold leading-6 text-gray-900">Log in <span aria-hidden="true">&rarr;</span></a>
        </div>
      </nav>

      <!-- Mobile Menu (hidden by default) -->
      <div id="mobile-menu" class="lg:hidden hidden" role="dialog" aria-modal="true">
        <div class="fixed inset-0 z-50 bg-gray-800 bg-opacity-75"></div>
        <div class="fixed inset-y-0 right-0 z-50 w-full overflow-y-auto bg-white px-6 py-6 sm:max-w-sm sm:ring-1 sm:ring-gray-900/10">
          <div class="flex items-center justify-between">
            <?php the_custom_logo(); ?>
            <button id="mobile-menu-close" type="button" class="-m-2.5 rounded-md p-2.5 text-gray-700">
              <span class="sr-only">Close menu</span>
              <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
              </svg>
            </button>
          </div>
          <div class="mt-6 flow-root">
            <div class="-my-6 divide-y divide-gray-500/10">
              <?php
              wp_nav_menu(
                array(
                  'theme_location' => 'menu-1',
                  'menu_id'        => 'primary-menu',
                  'menu_class'     => 'space-y-2 py-6',
                )
              );
              ?>
              <div class="py-6">
                <a href="#" class="-mx-3 block rounded-lg px-3 py-2.5 text-base font-semibold leading-7 text-gray-900 hover:bg-gray-50">Log in</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </header>
  </div>
  
  <!-- JavaScript for Toggle menu -->
  <script>
    const mobileMenuToggle = document.getElementById('mobile-menu-toggle');
    const mobileMenu = document.getElementById('mobile-menu');
    const mobileMenuClose = document.getElementById('mobile-menu-close');
  
    // Open the mobile menu
    mobileMenuToggle.addEventListener('click', function () {
      mobileMenu.classList.toggle('hidden');  // Toggle the hidden class
    });
  
    // Close the mobile menu
    mobileMenuClose.addEventListener('click', function () {
      mobileMenu.classList.add('hidden');  // Add the hidden class
    });
  
    // Close the menu if user clicks outside
    window.addEventListener('click', function (event) {
      if (!mobileMenu.contains(event.target) && !mobileMenuToggle.contains(event.target)) {
        mobileMenu.classList.add('hidden');
      }
    });
  </script>
