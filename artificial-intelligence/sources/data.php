<?php

$data = array(
    'A' => array(
        'name' => 'A',
        'conn' => array(
            'B' => array(
                'name' => 'B',
                'dist' => 3
            ),
            'F' => array(
                'name' => 'F',
                'dist' => 2
            )
        )
    ),
    'B' => array(
        'name' => 'B',
        'conn' => array(
            'A' => array(
                'name' => 'A',
                'dist' => 3
            ),
            'C' => array(
                'name' => 'C',
                'dist' => 17
            ),
            'D' => array(
                'name' => 'D',
                'dist' => 16
            ),
        )
    ),
    'C' => array(
        'name' => 'C',
        'conn' => array(
            'B' => array(
                'name' => 'B',
                'dist' => 17
            ),
            'D' => array(
                'name' => 'D',
                'dist' => 8
            ),
            'I' => array(
                'name' => 'I',
                'dist' => 18
            )
        )
    ),
    'D' => array(
        'name' => 'D',
        'conn' => array(
            'B' => array(
                'name' => 'B',
                'dist' => 16
            ),
            'C' => array(
                'name' => 'C',
                'dist' => 8
            ),
            'E' => array(
                'name' => 'E',
                'dist' => 11
            ),
            'I' => array(
                'name' => 'I',
                'dist' => 4
            ),
        )
    ),
    'E' => array(
        'name' => 'E',
        'conn' => array(
            'D' => array(
                'name' => 'D',
                'dist' => 11
            ),
            'F' => array(
                'name' => 'F',
                'dist' => 1
            ),
            'G' => array(
                'name' => 'G',
                'dist' => 6
            ),
            'H' => array(
                'name' => 'H',
                'dist' => 5
            ),
            'I' => array(
                'name' => 'I',
                'dist' => 10
            ),
        )
    ),
    'F' => array(
        'name' => 'F',
        'conn' => array(
            'A' => array(
                'name' => 'A',
                'dist' => 2
            ),
            'E' => array(
                'name' => 'E',
                'dist' => 1
            ),
            'G' => array(
                'name' => 'G',
                'dist' => 7
            ),
        )
    ),
    'G' => array(
        'name' => 'G',
        'conn' => array(
            'F' => array(
                'name' => 'F',
                'dist' => 7
            ),
            'E' => array(
                'name' => 'E',
                'dist' => 6
            ),
            'H' => array(
                'name' => 'H',
                'dist' => 15
            ),
        )
    ),
    'H' => array(
        'name' => 'H',
        'conn' => array(
            'E' => array(
                'name' => 'E',
                'dist' => 5
            ),
            'I' => array(
                'name' => 'I',
                'dist' => 12
            ),
            'J' => array(
                'name' => 'J',
                'dist' => 13
            )
        )
    ),
    'I' => array(
        'name' => 'I',
        'conn' => array(
            'C' => array(
                'name' => 'C',
                'dist' => 18
            ),
            'D' => array(
                'name' => 'D',
                'dist' => 4
            ),
            'E' => array(
                'name' => 'E',
                'dist' => 10
            ),
            'H' => array(
                'name' => 'H',
                'dist' => 12
            ),
            'J' => array(
                'name' => 'J',
                'dist' => 19
            )
        )
    ),
    'J' => array(
        'name' => 'J',
        'conn' => array(
            'I' => array(
                'name' => 'I',
                'dist' => 9
            ),
            'H' => array(
                'name' => 'H',
                'dist' => 13
            ),
        )
    ),
);