<div class="container">
    <h4>Schedule Payment</h4>
    <!-- <div class="row"> -->
        <div class="panel panel-primary filterable">
            <div class="panel-heading">
                <h3 class="panel-title panel-title-schedule">Users</h3>
                <!-- <div class="pull-right">
                    <button class="btn btn-default btn-xs btn-filter"><span class="glyphicon glyphicon-filter"></span> Filter</button>
                </div> -->
            </div>
            <table class="table">
                <thead>
                    <tr class="filters">
                        <th><input type="text" class="form-control" placeholder="#" disabled></th>
                        <th><input type="text" class="form-control" placeholder="Pay Date" disabled></th>
                        <th><input type="text" class="form-control" placeholder="First Balanch" disabled></th>
                        <!-- <th><input type="text" class="form-control" placeholder="Principle" disabled></th> -->
                        <th><input type="text" class="form-control" placeholder="Pay Capital" disabled></th>
                        <th><input type="text" class="form-control" placeholder="Pay Interest" disabled></th>
                        <th><input type="text" class="form-control" placeholder="Total Payment" disabled></th>
                        <th><input type="text" class="form-control" placeholder="Rate" disabled></th>
                        <th><input type="text" class="form-control" placeholder="Saved Money" disabled></th>
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
                    foreach ($data_payments as $rows) { ?>
                        <tr>
                            <td><?php echo $i; ?></td>
                            <td><?php echo date('Y-m-d', strtotime($rows['pay_date'])); ?></td>
                            <td><?php echo round($rows['beginning_balance'], 2); ?></td>
                            <td><?php echo $rows['pay_capital']; ?></td>
                            <td><?php echo round($rows['pay_interest'], 2); ?></td>
                            <td><?php echo round($rows['pay_amount'], 2); ?></td>
                            <td><?php echo round($rate, 2); ?></td>
                            <td><?php echo '0.00'; ?></td>
                        </tr>
                    <?php 
                    $i++;
                    $total_pay_capital += $rows['pay_capital'];
                    $total_pay_interest += $rows['pay_interest'];
                    $total_pay_amount += $rows['pay_amount'];
                    $total_rate += $rate;
                    }
                }
                ?>
                    <tr>
                        <td colspan="3"><label class="pull-right">Total</label></td>
                        <td><?php echo $total_pay_capital; ?></td>
                        <td><?php echo $total_pay_interest; ?></td>
                        <td><?php echo $total_pay_amount; ?></td>
                        <td><?php echo $total_rate; ?></td>
                        <td><?php echo '0.00'; ?></td>
                    </tr>
                </tbody>
            </table>
        </div>
    <!-- </div> -->
</div>