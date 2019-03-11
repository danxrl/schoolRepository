<?php

$data = array(
    'A' => array(
        'name' => 'A',
        'conn' => array(
            'B' => array(
                'name' => 'B',
                'dist' => 5
            ),
            'G' => array(
                'name' => 'G',
                'dist' => 2
            ),
            'D' => array(
                'name' => 'D',
                'dist' => 4
            )
        )
    ),
    'B' => array(
        'name' => 'B',
        'conn' => array(
            'A' => array(
                'name' => 'A',
                'dist' => 4
            ),
            'C' => array(
                'name' => 'C',
                'dist' => 5
            ),
            'G' => array(
                'name' => 'G',
                'dist' => 1
            )
        )
    ),
    'C' => array(
        'name' => 'C',
        'conn' => array(
            'B' => array(
                'name' => 'B',
                'dist' => 5
            ),
            'F' => array(
                'name' => 'F',
                'dist' => 1
            ),
            'Z' => array(
                'name' => 'Z',
                'dist' => 1
            )
        )
    ),
    'D' => array(
        'name' => 'D',
        'conn' => array(
            'A' => array(
                'name' => 'A',
                'dist' => 5
            ),
            'E' => array(
                'name' => 'E',
                'dist' => 2
            ),
            'G' => array(
                'name' => 'G',
                'dist' => 1
            )
        )
    ),
    'E' => array(
        'name' => 'E',
        'conn' => array(
            'D' => array(
                'name' => 'D',
                'dist' => 2
            ),
            'F' => array(
                'name' => 'F',
                'dist' => 1
            ),
            'Z' => array(
                'name' => 'Z',
                'dist' => 3
            )
        )
    ),
    'F' => array(
        'name' => 'F',
        'conn' => array(
            'E' => array(
                'name' => 'E',
                'dist' => 1
            ),
            'C' => array(
                'name' => 'C',
                'dist' => 1
            ),
            'Z' => array(
                'name' => 'Z',
                'dist' => 2
            )
        )
    ),
    'G' => array(
        'name' => 'G',
        'conn' => array(
            'D' => array(
                'name' => 'D',
                'dist' => 1
            ),
            'A' => array(
                'name' => 'A',
                'dist' => 2
            ),
            'B' => array(
                'name' => 'B',
                'dist' => 1
            )
        )
    ),
    'Z' => array(
        'name' => 'Z',
        'conn' => array(
            'E' => array(
                'name' => 'E',
                'dist' => 3
            ),
            'F' => array(
                'name' => 'F',
                'dist' => 2
            ),
            'C' => array(
                'name' => 'C',
                'dist' => 1
            )
        )
    )
);