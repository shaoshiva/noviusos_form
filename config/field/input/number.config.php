<?php

return array(
    'name' => __('Number'),

    // Fields default value
    'default_values' => array(
        'field_type' => 'text',
        'field_label' => __('Enter a number:'),
    ),

    'admin' => array(
        // Meta layout
        'layout' => array(
            'main' => array(
                'fields' => array(
                    'field_label',
                ),
            ),
            'optional' => array(
                'fields' => array(
                    'field_mandatory',
                    'field_default_value',
                    'field_origin',
                    'field_origin_var',
                    'field_details',
                    'field_width',
                    'field_limited_to',
                ),
            ),
        ),
    ),
);