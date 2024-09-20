<?php


// Elementor widget class
if (! defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

add_action('elementor/widgets/register', function ($widgets_manager) {
    // Controleer of de Elementor class beschikbaar is
    if (! class_exists('\Elementor\Widget_Base')) {
        return; // Elementor is niet beschikbaar, dus stop hier.
    }

    class Elementor_Featured_Product_Widget extends \Elementor\Widget_Base
    {
        public function get_name()
        {
            return 'lms_featured_product';
        }

        public function get_title()
        {
            return __('Featured Product', 'text-domain');
        }

        public function get_icon()
        {
            return 'eicon-post-list';
        }

        // public function get_categories() {
        //     return [ 'general' ]; 
        // }

        public function get_categories()
        {
            return ['custom_category']; // Gebruik hier je custom category slug
        }

        protected function _register_controls()
        {
            $this->start_controls_section(
                'content_section',
                [
                    'label' => __('Content', 'text-domain'),
                    'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                ]
            );

            $this->add_control(
                'product_name',
                [
                    'label' => __('Product Name', 'text-domain'),
                    'type' => \Elementor\Controls_Manager::TEXT,
                    'default' => __('Product Title', 'text-domain'),
                    'placeholder' => __('Type your product name here', 'text-domain'),
                ]
            );

            // New Control for Product Description
            $this->add_control(
                'product_description',
                [
                    'label' => __('Product Description', 'text-domain'),
                    // 'type' => \Elementor\Controls_Manager::TEXTAREA,
                    'type' => \Elementor\Controls_Manager::WYSIWYG,
                    'default' => __('Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sunt in culpa qui officia deserunt.', 'text-domain'),
                    'placeholder' => __('Type your product description here', 'text-domain'),
                ]
            );
            // productafbeelding
            $this->add_control(
                'product_image',
                [
                    'label' => __('Product Image', 'text-domain'),
                    'type' => \Elementor\Controls_Manager::MEDIA,
                    'default' => [
                        'url' => \Elementor\Utils::get_placeholder_image_src(), // Standaardafbeelding als geen afbeelding is geselecteerd
                    ],
                ]
            );

            // Controle om aantal sterren te selecteren
            $this->add_control(
                'product_rating',
                [
                    'label' => __('Product Rating', 'text-domain'),
                    'type' => \Elementor\Controls_Manager::SELECT,
                    'default' => '0',  // Standaard aantal sterren
                    'options' => [
                        // '0' => __('No Stars', 'text-domain'),
                        // '1' => __('1 Star', 'text-domain'),
                        // '2' => __('2 Stars', 'text-domain'),
                        // '3' => __('3 Stars', 'text-domain'),
                        // '4' => __('4 Stars', 'text-domain'),
                        // '5' => __('5 Stars', 'text-domain'),

                        //of
                        'No Stars' => 0,
                        '1 Star' => 1,
                        '2 Stars' => 2,
                        '3 Stars' => 3,
                        '4 Stars' => 4,
                        '5 Stars' => 5,
                    ],
                ]
            );

            // Product Star Color Control
            $this->add_control(
                'star_color',
                [
                    'label' => __('Star Color', 'text-domain'),
                    'type' => \Elementor\Controls_Manager::COLOR,
                    'default' => '#ffcc00',
                ]
            );

            // Productprijs controle
            $this->add_control(
                'product_price',
                [
                    'label' => __('Product Price', 'text-domain'),
                    'type' => \Elementor\Controls_Manager::NUMBER,
                    'default' => 00.00,
                    'placeholder' => __('Type your product price here', 'text-domain'),
                ]
            );

            $this->add_control(
                'product_link',
                [
                    'label' => __('Product Link', 'text-domain'),
                    'type' => \Elementor\Controls_Manager::URL,
                    'placeholder' => __('https://your-link.com', 'text-domain'),
                    'default' => [
                        'url' => 'https://your-link.com',
                        'is_external' => true, // Optie om in een nieuw tabblad te openen
                    ],
                    'show_external' => true, // Toon de optie om in een nieuw tabblad te openen
                ]
            );


            $this->end_controls_section();
        }

        protected function render()
        {
            $settings = $this->get_settings_for_display();
            // Haal de afbeelding op, gebruik de standaard als er geen is geselecteerd
            $product_image_url = $settings['product_image']['url'];
        
            // Kleur instellen voor de sterren
            $star_color = !empty($settings['star_color']) ? esc_attr($settings['star_color']) : '#ffcc00';
        
            // Bereid sterrenweergave voor op basis van het geselecteerde aantal
            $star_full = '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="' . $star_color . '" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"></polygon></svg>';
        
            $star_empty = '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"></polygon></svg>';
            $rating = intval($settings['product_rating']);
        
            // Genereer de sterren op basis van de rating
            $stars_html = str_repeat($star_full, $rating) . str_repeat($star_empty, 5 - $rating);
        
            // Haal de product link op
            $product_link = $settings['product_link']['url'];
            $is_external = $settings['product_link']['is_external'] ? 'target="_blank" rel="nofollow"' : '';
        
            echo '
                <div class="bg-white rounded-lg shadow-lg overflow-hidden h-full"> <!-- Tailwind classes -->
                    <a href="' . esc_url($product_link) . '" ' . $is_external . '>
                        <img src="' . esc_url($product_image_url) . '" class="w-full h-48 object-cover" alt="">
                    </a>
                    <div class="p-4">
                        <ul class="flex items-center justify-between"> <!-- Flex container for stars -->
                            <li class="flex">' . $stars_html . '</li> <!-- Stars in a row -->
                            <li class="text-gray-600 text-right">$' . number_format($settings['product_price'], 2, ',', '.') . '</li>
                        </ul>
                        <a href="shop-single.html" class="text-lg font-semibold text-gray-800 hover:text-blue-500">' . esc_html($settings['product_name']) . '</a>
                        <p class="text-gray-600 mt-2">' . $settings['product_description'] . '</p>
                        <p class="text-gray-500">Reviews (24)</p>
                    </div>
                </div>
            ';
        }
        
    }

    // Registreer de widget
    $widgets_manager->register(new Elementor_Featured_Product_Widget());
});
