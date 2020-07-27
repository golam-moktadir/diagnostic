<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<div class="container" style="color: black; width: 100%; padding: 0px 50px;">
   <div class="box box-info">
        <div class="box-header">
            <h3 class="box-title">Doctor's Information</h3>                                    
        </div>

        <!-- /.box-header -->
        <div class="box-body table-responsive" style="width: 98%; overflow: scroll;">
                               <table id="example2" class="table table-bordered table-hover">
                            <thead>
                            <tr>
                                <th style="text-align: center;">No.</th>
                                <th style="text-align: center;">Doctor Name</th>
                                <th style="text-align: center;">Specialist</th>
                                <th style="text-align: center;">Address</th>
                                <th style="text-align: center;">Department</th>
                                <th style="text-align: center;">Fees</th>
                                <th style="text-align: center;">Visiting Hour</th>   
                            </tr>
                            </thead>
                            <tbody>
                            <?php $count = 0;
                            foreach ($doctor as $info) {
                                $count++;
                                ?>
                                <tr>
                                    <td style="text-align: center;"><?php echo $count; ?></td>
                                    <td style="text-align: center;"><?php echo $info->name; ?></td>
                                    <td style="text-align: center;"><?php echo $info->designation; ?></td>
                                    <td style="text-align: center;"><?php echo $info->address; ?></td>
                                    <td style="text-align: center;"><?php echo $info->department; ?></td>
                                    <td style="text-align: center;"><?php echo $info->frees; ?></td>
                                    <td style="text-align: center;"><?php echo $info->doctors_time; ?></td>  
                                </tr>
                            <?php } ?>
                            </tbody>
               
                            </tbody>
                        </table>
        </div><!-- /.box-body -->
    </div> 
</div>