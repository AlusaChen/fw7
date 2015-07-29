<?php
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

?>