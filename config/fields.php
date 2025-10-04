<?php

return [
    [
        'name' => 'tab_menu',
        'type' => 'FieldsetTabOpen',
        'label' => 'Menü Einstellungen',
        'tags' => 'tabs',
        'icon' => 'Tag',
    ],
    [
        'name' => 'tab_menu_END',
        'type' => 'FieldsetClose',
        'label' => 'Close an open fieldset',
        'tags' => 'tabs',
        'icon' => 'Tag',
    ],
    [
        'name' => 'int_menu',
        'type' => 'Integer',
        'label' => 'Menü - ID',
        'tags' => 'integer',
        'icon' => 'calculator',
        'width' => 50,
        'zeroNotEmpty' => 0,
        'defaultValue' => 2,
        'collapsed' => 4,
        'inputType' => 'text',
    ],
    [
        'name' => 'int_menu_sub',
        'type' => 'Integer',
        'label' => 'Sub Menü - ID',
        'tags' => 'integer',
        'icon' => 'calculator',
        'width' => 50,
        'zeroNotEmpty' => 0,
        'defaultValue' => 2,
        'collapsed' => 4,
        'inputType' => 'text',
    ],
    [
        'name' => 'link_intern',
        'type' => 'Page',
        'label' => 'Link (intern)',
        'tags' => 'links',
        'icon' => 'Link',
        'width' => 50,
        'derefAsPage' => 2,
        'inputfield' => 'InputfieldPageListSelect',
        'parent_id' => 0,
        'labelFieldName' => 'title',
        'collapsed' => 0,
    ],
    [
        'name' => 'link_extern',
        'type' => 'Text',
        'label' => 'Link (extern)',
        'tags' => 'links',
        'icon' => 'Link',
        'width' => 50,
        'formatter' => 'TextformatterEntities'
    ],
    [
        'name' => 'link_text',
        'type' => 'Text',
        'label' => 'Link Text',
        'tags' => 'links',
        'icon' => 'Link',
        'width' => 25,
        'formatter' => 'TextformatterEntities'
    ],
    [
        'name' => 'link_aria',
        'type' => 'Text',
        'label' => 'Link (aria-label)',
        'tags' => 'links',
        'icon' => 'Link',
        'width' => 25,
        'formatter' => 'TextformatterEntities'
    ],
    [
        'name' => 'link_new_tab',
        'type' => 'Checkbox',
        'label' => 'Im neuen Tab öffnen?',
        'tags' => 'links',
        'icon' => 'Link',
        'width' => 25,
        'formatter' => null,
        'inputfieldClass' => null,
    ],
    [
        'name' => 'link_description',
        'type' => 'Textarea',
        'label' => 'Link Zusatzbeschirftung',
        'tags' => 'links',
        'icon' => 'Link',
        'width' => 50,
        'formatter' => 'TextformatterEntities'
    ],
    [
        'name' => 'image',
        'type' => 'CroppableImage3',
        'label' => 'Bild',
        'tags' => 'images',
        'icon' => 'File image o',
        'width' => 50,
        'maxFiles' => 1,
        'defaultValuePage' => 0,
        'gridMode' => 'list',
        'clientQuality' => 90,
        'extensions' => 'jpg jpeg png',
        'inputfieldClass' => 'InputfieldCroppableImage3',
        'cropSetting' =>
            <<<EOT
                desktop,1920,1080
                tablet,1024,600
                mobile,600,600
                quadratisch,750,750
                EOT,
    ],
    [
        'name' => 'select_menu_position',
        'type' => 'Options',
        'label' => 'Menü Position',
        'tags' => 'settings',
        'icon' => 'Check square o',
        'width' => 50,
        'options' => '
                1=header
                2=footer
                3=individually
                ',
    ],
    [
        'name' => 'select_menu_typ',
        'type' => 'Options',
        'label' => 'Menü Element Typ',
        'description' => 'Soll eine Verlinkung gesetzt werden oder einfach nur ein Menüelement?',
        'tags' => 'settings',
        'icon' => 'Check square o',
        'options' => '
                1=Verlinkung
                2=Menüelement
                ',
    ],
    [
        'name' => 'checkbox_menu_column',
        'type' => 'Checkbox',
        'label' => 'Menü vertikal?',
        'tags' => 'settings',
        'icon' => 'Check square o',
        'width' => 50,
    ],
    [
        'name' => 'repeater_menu',
        'type' => 'Repeater',
        'label' => 'Repeater (Menü)',
        'tags' => 'repeater',
        'icon' => 'Repeat',
        'width' => 100,
        'depth' => 3,
        'repeaterTitle' => '{link_intern.title} {link_text}',
        'loading' => 1,
        'fields' => [
            'int_menu',
            'int_menu_sub',
            'select_menu_typ',
            'image',
            'link_description',
            'link_intern',
            'link_extern',
            'link_text',
            'link_aria',
            'link_new_tab',
        ]
    ],
    [
        'name' => 'matrix_menu',
        'type' => 'RepeaterMatrix',
        'label' => 'Matrix (Menü)',
        'tags' => 'matrix',
        'icon' => 'Codepen',
        'addType' => 1,
        'fields' => [
            'select_menu_position',
            'checkbox_menu_column',
            'repeater_menu',
        ],
        'matrix_items' => [
            [
                'name' => 'menu_element',
                'label' => 'Neues Menüelement',
                'fields' => [
                    'select_menu_position',
                    'checkbox_menu_column',
                    'repeater_menu',
                ]
            ],
        ]
    ]
];