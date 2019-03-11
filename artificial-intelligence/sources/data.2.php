<?php

$data = array(
    'A' => array(
        'name' => 'A',
        'conn' => array(
            'B' => array(
                'name' => 'B',
                'dist' => 8
            ),
            'E' => array(
                'name' => 'E',
                'dist' => 4
            ),
            'D' => array(
                'name' => 'D',
                'dist' => 5
            ),
        )
    ),
    'B' => array(
        'name' => 'B',
        'conn' => array(
            'A' => array(
                'name' => 'A',
                'dist' => 8
            ),
            'C' => array(
                'name' => 'C',
                'dist' => 3
            ),
            'F' => array(
                'name' => 'F',
                'dist' => 14
            ),
            'E' => array(
                'name' => 'E',
                'dist' => 12
            ),
        )
    ),
    'C' => array(
        'name' => 'C',
        'conn' => array(
            'G' => array(
                'name' => 'G',
                'dist' => 11
            ),
            'F' => array(
                'name' => 'F',
                'dist' => 9
            ),
            'B' => array(
                'name' => 'B',
                'dist' => 3
            ),
        )
    ),
    'D' => array(
        'name' => 'D',
        'conn' => array(
            'A' => array(
                'name' => 'A',
                'dist' => 16
            ),
            'E' => array(
                'name' => 'E',
                'dist' => 9
            ),
            'H' => array(
                'name' => 'H',
                'dist' => 6
            ),
        )
    ),
    'E' => array(
        'name' => 'E',
        'conn' => array(
            'A' => array(
                'name' => 'A',
                'dist' => 4
            ),
            'B' => array(
                'name' => 'B',
                'dist' => 12
            ),
            'F' => array(
                'name' => 'F',
                'dist' => 3
            ),
            'J' => array(
                'name' => 'J',
                'dist' => 5
            ),
            'I' => array(
                'name' => 'I',
                'dist' => 18
            ),
            'D' => array(
                'name' => 'D',
                'dist' => 9
            ),
        )
    ),
    'F' => array(
        'name' => 'F',
        'conn' => array(
            'B' => array(
                'name' => 'B',
                'dist' => 4
            ),
            'C' => array(
                'name' => 'C',
                'dist' => 9
            ),
            'G' => array(
                'name' => 'G',
                'dist' => 1
            ),
            'K' => array(
                'name' => 'K',
                'dist' => 8
            ),
            'E' => array(
                'name' => 'E',
                'dist' => 3
            ),
        )
    ),
    'G' => array(
        'name' => 'G',
        'conn' => array(
            'C' => array(
                'name' => 'C',
                'dist' => 11
            ),
            'F' => array(
                'name' => 'F',
                'dist' => 1
            ),
            'K' => array(
                'name' => 'K',
                'dist' => 18
            ),
            'L' => array(
                'name' => 'L',
                'dist' => 7
            ),
        )
    ),
    'H' => array(
        'name' => 'H',
        'conn' => array(
            'D' => array(
                'name' => 'D',
                'dist' => 6
            ),
            'I' => array(
                'name' => 'I',
                'dist' => 2
            ),
            'M' => array(
                'name' => 'M',
                'dist' => 7
            )
        )
    ),
    'I' => array(
        'name' => 'I',
        'conn' => array(
            'H' => array(
                'name' => 'H',
                'dist' => 2
            ),
            'E' => array(
                'name' => 'E',
                'dist' => 8
            ),
            'J' => array(
                'name' => 'J',
                'dist' => 10
            ),
            'M' => array(
                'name' => 'M',
                'dist' => 6
            ),
        )
    ),
    'J' => array(
        'name' => 'J',
        'conn' => array(
            'E' => array(
                'name' => 'E',
                'dist' => 5
            ),
            'K' => array(
                'name' => 'K',
                'dist' => 6
            ),
            'N' => array(
                'name' => 'N',
                'dist' => 9
            ),
            'I' => array(
                'name' => 'I',
                'dist' => 10
            ),
        )
    ),
    'K' => array(
        'name' => 'K',
        'conn' => array(
            'F' => array(
                'name' => 'F',
                'dist' => 8
            ),
            'G' => array(
                'name' => 'G',
                'dist' => 8
            ),
            'L' => array(
                'name' => 'L',
                'dist' => 5
            ),
            'P' => array(
                'name' => 'P',
                'dist' => 7
            ),
            'J' => array(
                'name' => 'J',
                'dist' => 6
            ),
        )
    ),
    'L' => array(
        'name' => 'L',
        'conn' => array(
            'G' => array(
                'name' => 'G',
                'dist' => 7
            ),
            'K' => array(
                'name' => 'K',
                'dist' => 5
            ),
            'P' => array(
                'name' => 'P',
                'dist' => 6
            ),
        )
    ),
    'M' => array(
        'name' => 'M',
        'conn' => array(
            'H' => array(
                'name' => 'H',
                'dist' => 7
            ),
            'I' => array(
                'name' => 'I',
                'dist' => 6
            ),
            'N' => array(
                'name' => 'N',
                'dist' => 2
            ),
        )
    ),
    'N' => array(
        'name' => 'N',
        'conn' => array(
            'M' => array(
                'name' => 'M',
                'dist' => 2
            ),
            'J' => array(
                'name' => 'J',
                'dist' => 9
            ),
            'P' => array(
                'name' => 'P',
                'dist' => 12
            ),
        )
    ),
    'P' => array(
        'name' => 'P',
        'conn' => array(
            'N' => array(
                'name' => 'N',
                'dist' => 12
            ),
            'K' => array(
                'name' => 'K',
                'dist' => 7
            ),
            'L' => array(
                'name' => 'L',
                'dist' => 6
            ),
        )
    ),
);