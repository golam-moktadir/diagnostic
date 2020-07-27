<aside class="profile-info col-lg-12">
    <section class="panel">
        <br>
        <fieldset class="scheduler-border">
            <table id="example1" class="table table-striped table-bordered" width="100%"
                   cellspacing="0">
                <p style="padding-left: 10px;"><button id="print_button" title="Click to Print" type="button" 
                                           onClick="window.print()" class="btn btn-flat btn-warning">Print</button></p>
                <thead>
                <tr>
                    <th style="text-align: center">LIABILITIES</th>
                    <th style="text-align: center">BALANCE FOREWORD</th>
                    <th style="text-align: center">P<br>S</th>
                    <th style="text-align: center">CREDIT</th>
                    <th style="text-align: center">P<br>S</th>
                    <th style="text-align: center">DEBIT</th>
                    <th style="text-align: center">P<br>S</th>
                    <th style="text-align: center">BALANCE</th>
                    <th style="text-align: center">P<br>S</th>
                </tr>
                </thead>
                <tbody>
                <?php $inc = 0; $inc2 = 0; for ($i = 1; $i <= $c; $i++) {
                    if (${'l_type' . $i} == 'Capital' || ${'l_type' . $i} == 'Deposits' || ${'l_type' . $i} == 'Other Liabilities') { ?>
                        <tr>
                            <td><strong><?php echo ${'l_type' . $i}; ?></strong></td>
                        </tr>
                        <?php
                        foreach (${'sub_category' . $i} as $s) {
                            $inc++; ?>
                            <tr>
                                <td><?php echo $s->name; ?></td>
                                <td style="text-align: center"><?php echo ${'balancef' . $inc}; ?></td>
                                <td style="text-align: center"></td>
                                <td style="text-align: center"><?php if (!empty(${'credit' . $inc})) echo ${'credit' . $inc}; ?></td>
                                <td style="text-align: center"></td>
                                <td style="text-align: center"><?php if (!empty(${'debit' . $inc})) echo ${'debit' . $inc}; ?></td>
                                <td style="text-align: center"></td>
                                <td style="text-align: center"><?php if (!empty(${'balance' . $inc})) echo ${'balance' . $inc}; ?></td>
                                <td style="text-align: center"></td>
                            </tr>

                        <?php }?>
                        <tr>
                            <td><strong>SUB TOTAL</strong></td>
                            <td style="text-align: center"><?php echo ${'sub_balancef' . $i}; ?></td>
                            <td style="text-align: center"></td>
                            <td style="text-align: center"><?php if (!empty(${'sub_credit' . $i})) echo ${'sub_credit' . $i}; ?></td>
                            <td style="text-align: center"></td>
                            <td style="text-align: center"><?php if (!empty(${'sub_debit' . $i})) echo ${'sub_debit' . $i}; ?></td>
                            <td style="text-align: center"></td>
                            <td style="text-align: center"><?php if (!empty(${'sub_balance' . $i})) echo ${'sub_balance' . $i}; ?></td>
                            <td style="text-align: center"></td>
                        </tr>
                    <?php } else { $inc2++;?>
                        <tr>
                            <td><strong><?php echo ${'l_type' . $i}; ?></strong></td>
                            <td style="text-align: center"><?php  echo ${'balancef1' . $inc2}; ?></td>
                            <td style="text-align: center"></td>
                            <td style="text-align: center"><?php if (!empty(${'credit1' . $inc2})) echo ${'credit1' . $inc2}; ?></td>
                            <td style="text-align: center"></td>
                            <td style="text-align: center"><?php if (!empty(${'debit1' . $inc2})) echo ${'debit1' . $inc2}; ?></td>
                            <td style="text-align: center"></td>
                            <td style="text-align: center"><?php if (!empty(${'balance1' . $inc2})) echo ${'balance1' . $inc2}; ?></td>
                            <td style="text-align: center"></td>
                        </tr>
                    <?php } ?>

                    <tr>
                        <td style="text-align: center"></td>
                    </tr>


                    <?php
                } ?>
                <tr>
                    <td style="text-align: right"><strong>GRAND TOTAL</strong></td>
                    <td style="text-align: center"><?php echo ${'balancef'}; ?></td>
                    <td style="text-align: center"></td>
                    <td style="text-align: center"><?php if (!empty(${'credit'})) echo ${'credit'}; ?></td>
                    <td style="text-align: center"></td>
                    <td style="text-align: center"><?php if (!empty(${'debit'})) echo ${'debit'}; ?></td>
                    <td style="text-align: center"></td>
                    <td style="text-align: center"><?php if (!empty(${'balance'})) echo ${'balance'}; ?></td>
                    <td style="text-align: center"></td>
                </tr>
                </tbody>

            </table>

        </fieldset>
    </section>
</aside>
<style>
    @media print {  
        a[href]:after {
            content: none !important;
        }
        #print_button {
            display: none;
        }
        #no_print1 {
            display: none;
        }
    }
</style>      