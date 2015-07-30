<?php
$type = $_REQUEST['type'];

switch($type)
{
    case 'detail':
        get_detail();
        break;
    case 'detail2':
        get_detail2();
        break;
    case 'all':
        get_all();
        break;
    default:
        echo json_encode([]);
}

function get_all()
{
    header('Content-Type: application/json');
    $datas = [
        'total' => [
            [
                'name' => '总收入',
                'value' => 12345
            ]
        ],
        'detail' => [
            [
                'game' => '口水三国',
                'basedata' => [
                    [
                        'name' => '收入',
                        'value' => 100,
                    ],
                    [
                        'name' => '日活跃',
                        'value' => 200,
                    ],
                    [
                        'name' => '付费用户',
                        'value' => 50,
                    ],
                    [
                        'name' => '付费率',
                        'value' => '1%',
                    ],
                    [
                        'name' => 'ARPPU',
                        'value' => 54,
                    ],
                ]
            ],
            [
                'game' => '塔塔塔防',
                'basedata' => [
                    [
                        'name' => '收入',
                        'value' => 100,
                    ],
                    [
                        'name' => '日活跃',
                        'value' => 200,
                    ],
                    [
                        'name' => '付费用户',
                        'value' => 50,
                    ],
                    [
                        'name' => '付费率',
                        'value' => '1%',
                    ],
                    [
                        'name' => 'ARPPU',
                        'value' => 54,
                    ],
                ]
            ]
        ]
    ];
    echo json_encode($datas);
}

function get_detail()
{
    if($_POST)
    {
        header('Content-Type: application/json');
        $datas = [
            [
                'base' => [
                    [
                        'name' => '收入',
                        'value' => 100,
                    ],
                    [
                        'name' => '日活跃',
                        'value' => 200,
                    ],
                    [
                        'name' => '付费用户',
                        'value' => 50,
                    ],
                    [
                        'name' => '付费率',
                        'value' => '1%',
                    ],
                    [
                        'name' => 'ARPPU',
                        'value' => 54,
                    ],
                ],
                'remain' => [
                    [
                        'name' => '次日留存',
                        'value' => '50%',
                    ],
                    [
                        'name' => '3日留存',
                        'value' => '40%',
                    ],
                    [
                        'name' => '4日留存',
                        'value' => '30%',
                    ],
                ],
            ],
            [
                'base' => [
                    [
                        'name' => '收入2',
                        'value' => 100,
                    ],
                    [
                        'name' => '日活跃2',
                        'value' => 200,
                    ],
                    [
                        'name' => '付费用户2',
                        'value' => 50,
                    ],
                    [
                        'name' => '付费率2',
                        'value' => '1%',
                    ],
                    [
                        'name' => 'ARPPU2',
                        'value' => 54,
                    ],
                ],
                'remain' => [
                    [
                        'name' => '次日留存2',
                        'value' => '50%',
                    ],
                    [
                        'name' => '3日留存2',
                        'value' => '40%',
                    ],
                    [
                        'name' => '4日留存2',
                        'value' => '30%',
                    ],
                ],
            ]
        ];
        $time = $_POST['datetime'];
        $k = date('d', $time) % 2;
        $data = $datas[$k];
        echo json_encode($data);
    }
}

function get_detail2()
{
    if($_POST)
    {
        header('Content-Type: application/json');
        $datas = [
            [
                'base' => [
                    '2015-06-01' => [
                        [
                            'name' => '收入',
                            'value' => 100,
                        ],
                        [
                            'name' => '日活跃',
                            'value' => 200,
                        ],
                        [
                            'name' => '付费用户',
                            'value' => 50,
                        ],
                        [
                            'name' => '付费率',
                            'value' => '1%',
                        ],
                        [
                            'name' => 'ARPPU',
                            'value' => 54,
                        ],
                    ],
                    '2015-06-02' => [
                        [
                            'name' => '收入',
                            'value' => 102,
                        ],
                        [
                            'name' => '日活跃',
                            'value' => 202,
                        ],
                        [
                            'name' => '付费用户',
                            'value' => 2,
                        ],
                        [
                            'name' => '付费率',
                            'value' => '12%',
                        ],
                        [
                            'name' => 'ARPPU',
                            'value' => 52,
                        ],
                    ]
                ],
                'remain' => [
                    '2015-06-01' => [

                        [
                            'name' => '次日留存',
                            'value' => '50%',
                        ],
                        [
                            'name' => '3日留存',
                            'value' => '40%',
                        ],
                        [
                            'name' => '4日留存',
                            'value' => '30%',
                        ],
                    ],

                    '2015-06-02' => [

                        [
                            'name' => '次日留存',
                            'value' => '48%',
                        ],
                        [
                            'name' => '3日留存',
                            'value' => '25%',
                        ],
                        [
                            'name' => '4日留存',
                            'value' => '10%',
                        ],
                    ],

                ],
            ],
            [
                'base' => [
                    '2015-06-01' => [
                        [
                            'name' => '收入',
                            'value' => 100,
                        ],
                        [
                            'name' => '日活跃',
                            'value' => 200,
                        ],
                        [
                            'name' => '付费用户',
                            'value' => 50,
                        ],
                        [
                            'name' => '付费率',
                            'value' => '1%',
                        ],
                        [
                            'name' => 'ARPPU',
                            'value' => 54,
                        ],
                    ],
                    '2015-06-02' => [
                        [
                            'name' => '收入',
                            'value' => 102,
                        ],
                        [
                            'name' => '日活跃',
                            'value' => 202,
                        ],
                        [
                            'name' => '付费用户',
                            'value' => 2,
                        ],
                        [
                            'name' => '付费率',
                            'value' => '12%',
                        ],
                        [
                            'name' => 'ARPPU',
                            'value' => 52,
                        ],
                    ],
                    '2015-06-03' => [
                        [
                            'name' => '收入',
                            'value' => 102,
                        ],
                        [
                            'name' => '日活跃',
                            'value' => 202,
                        ],
                        [
                            'name' => '付费用户',
                            'value' => 2,
                        ],
                        [
                            'name' => '付费率',
                            'value' => '12%',
                        ],
                        [
                            'name' => 'ARPPU',
                            'value' => 52,
                        ],
                    ]
                ],
                'remain' => [
                    '2015-06-01' => [

                        [
                            'name' => '次日留存',
                            'value' => '50%',
                        ],
                        [
                            'name' => '3日留存',
                            'value' => '40%',
                        ],
                        [
                            'name' => '4日留存',
                            'value' => '30%',
                        ],
                    ],

                    '2015-06-02' => [

                        [
                            'name' => '次日留存',
                            'value' => '48%',
                        ],
                        [
                            'name' => '3日留存',
                            'value' => '25%',
                        ],
                        [
                            'name' => '4日留存',
                            'value' => '10%',
                        ],
                    ],
                    '2015-06-03' => [
                        [
                            'name' => '收入',
                            'value' => 102,
                        ],
                        [
                            'name' => '日活跃',
                            'value' => 202,
                        ],
                        [
                            'name' => '付费用户',
                            'value' => 2,
                        ],
                        [
                            'name' => '付费率',
                            'value' => '12%',
                        ],
                        [
                            'name' => 'ARPPU',
                            'value' => 52,
                        ],
                    ]

                ],
            ]
        ];
        $time = $_POST['stime'];
        $k = date('d', $time) % 2;
        $data = $datas[$k];
        echo json_encode($data);
    }
}

?>