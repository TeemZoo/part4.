<?php
class TicketCalculator {
    private $ageGroups = [        [            'name' => 'Less than 12 years old',            'price' => 0,            'discount' => 0,        ],
        [            'name' => 'Between 13 and 18 years old',            'price' => 5.00,            'discount' => 0.30,        ],
        [            'name' => 'Between 19 and 59 years old',            'price' => 10.00,            'discount' => 0,        ],
        [            'name' => 'Greater than 60 years old',            'price' => 5.00,            'discount' => 0.40,        ],
    ];

    private function calculateCost($ageGroupCounts) {
        $totalCost = 0;

        foreach ($this->ageGroups as $i => $ageGroup) {
            $count = $ageGroupCounts[$i];
            if ($count > 0) {
                $discount = $ageGroup['discount'];
                $price = $ageGroup['price'];
                $cost = $count * $price * (1 - $discount);
                $totalCost += $cost;
            }
        }

        return $totalCost;
    }

    public function renderForm() {
        echo '
            <!DOCTYPE html>
            <html>
            <head>
                <title>Zoo Ticket Calculator</title>
                <style>
                    body {
                        background-color: green;
                        color: white;
                        font-family: Arial, sans-serif;
                    }
                    table {
                        border-collapse: collapse;
                        margin: 20px 0;
                    }
                    th, td {
                        padding: 10px;
                        text-align: left;
                        border-bottom: 1px solid white;
                    }
                    th {
                        background-color: #008080;
                    }
                    tr:nth-child(even) {
                        background-color: #006666;
                    }
                    form {
                        margin-top: 20px;
                    }
                    label {
                        display: inline-block;
                        margin-bottom: 10px;
                    }
                    input[type=number] {
                        padding: 5px;
                        font-size: 16px;
                    }
                    button {
                        padding: 10px;
                        background-color: #008080;
                        color: white;
                        font-size: 16px;
                        border: none;
                        border-radius: 5px;
                        cursor: pointer;
                    }
                    button:hover {
                        background-color: #006666;
                    }
                    h1, h2 {
                        text-align: center;
                    }
                    #total-cost {
                        font-weight: bold;
                        font-size: 20px;
                    }
                </style>
            </head>
            <body>
                <h2>Price Table:</h2>
                <table>
                    <thead>
                        <tr>
                            <th>Age Group</th>
                            <th>Ticket Price</th>
                            <th>Discount</th>
                        </tr>
                    </thead>
                    <tbody>
        ';

        foreach ($this->ageGroups as $ageGroup) {
            echo '
                        <tr>
                            <td>' . $ageGroup['name'] . '</td>
                            <td>' . number_format($ageGroup['price'], 2) . ' OR</td>
                            <td>' . ($ageGroup['discount'] * 100) . '%</td>
                        </tr>
            ';
        }

?>
<form method="post">
    <label for="age_group_1">Less than 12 years old:</label>
    <input type="number" name="age_group_1" id="age_group_1" min="0" max="10" value="0"><br>
    <label for="age_group_2">Between 13 and 18 years old:</label>
    <input type="number" name="age_group_2" id="age_group_2" min="0" max="10" value="0"><br>
    <label for="age_group_3">Between 19 and 59 years old:</label>
    <input type="number" name="age_group_3" id="age_group_3" min="0" max="10" value="0"><br>
    <label for="age_group_4">Greater than 60 years old:</label>
    <input type="number" name="age_group_4" id="age_group_4" min="0" max="10" value="0"><br>
    <button type="submit">Calculate</button>
</form>
<div id="total-cost"></div>
    </body>
    </html>