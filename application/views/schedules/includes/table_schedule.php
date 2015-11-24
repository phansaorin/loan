<table class="table">
    <thead>
        <tr class="filters">
            <th>#</th>
            <th>Pay Date</th>
            <th>First Balance</th>
            <th>Pay Capital</th>
            <th>Pay Interest</th>
            <th>Total Payment</th>
            <th>Rate</th>
            <th>Paid?</th>
        </tr>
    </thead>
    <tbody>
    <?php 
    $rate = $loan_info->interest_rate;
    $total_pay_capital = 0;
    $total_pay_interest = 0;
    $total_pay_amount = 0;
    $total_rate = 0;
    if (count($data_payments) > 0) {
        $i = 1;
        foreach ($data_payments as $rows) { 
            $class_paid = "tr-schedule";
            if ($rows['paid'] == 1) {
                $class_paid = "success";
            } elseif ($rows['paid'] == 2) {
                $class_paid = "warning";
            }
        ?>
            <tr class="<?php echo $class_paid; ?>">
                <td><?php echo $i; ?></td>
                <td><?php echo date('Y-m-d', strtotime($rows['pay_date'])); ?></td>
                <td><?php echo round($rows['beginning_balance'], 2); ?></td>
                <td><?php echo $rows['pay_capital']; ?></td>
                <td><?php echo round($rows['pay_interest'], 2); ?></td>
                <td><?php echo round($rows['pay_amount'], 2); ?></td>
                <td><?php echo round($rate, 2); ?></td>
                <td>
                <?php
                $dis_pay_off = 'No';
                if ($rows['paid'] == 1 ) {
                    $dis_pay_off = "Yes";
                } elseif ($rows['paid'] == 2) {
                    $dis_pay_off = "Paid-Off";
                }
                echo $dis_pay_off;
                ?>
                </td>
            </tr>
        <?php 
        $i++;
        $total_pay_capital += $rows['pay_capital'];
        $total_pay_interest += $rows['pay_interest'];
        $total_pay_amount += $rows['pay_amount'];
        }
    }
    ?>
        <tr>
            <td colspan="3"><label class="pull-right">Total</label></td>
            <td><?php echo $total_pay_capital; ?></td>
            <td><?php echo round($total_pay_interest); ?></td>
            <td colspan="3"><?php echo $total_pay_amount; ?></td>
        </tr>
    </tbody>
</table>