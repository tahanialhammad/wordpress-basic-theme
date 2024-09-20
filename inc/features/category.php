<?php

// Rigister Custom category 
add_action('elementor/elements/categories_registered', function ($elements_manager) {
    $elements_manager->add_category(
        'custom_category', // Slug van de categorie
        [
            'title' => __('Custom Category', 'text-domain'), // Naam van de categorie
            'icon' => 'fa fa-plug', // Optioneel: een icoon voor de categorie
        ]
    );
});

