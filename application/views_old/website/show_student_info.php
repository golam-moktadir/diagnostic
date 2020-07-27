<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<div class="container" style="color: black; width: 100%; padding: 0px 50px;">
   <div class="box box-info">
        <div class="box-header">
            <h3 class="box-title">Student Info.</h3>                                    
        </div>

        <!-- /.box-header -->
        <div class="box-body table-responsive" style="width: 98%; overflow: scroll;">
            <table id="example2" class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th style="text-align: center;">SL</th>
                        <th style="text-align: center;">Image</th>
                        <th style="text-align: center;">Student Name</th>
                        <th style="text-align: center;">Date of Birth</th>
                        <th style="text-align: center;">Blood Group</th>
                        <th style="text-align: center;">Father Name</th>
                        <th style="text-align: center;">Mother Name</th>
                        <th style="text-align: center;">Parents Mobile</th>
                     </tr>
                </thead>
                <tbody>
                    <?php 
                        $count=0;
                        foreach ($all_value as $info){ 
                        $count++;
                        ?>
                    <tr>
                        <td style="text-align: center;"><?php echo $count; ?></td>
                        <td style="text-align: center;">
                            <img src="<?php echo base_url(); ?>assets/img/student/<?php echo $info->image; ?>" 
                              class="img-rounded" width="80px" height="60px" alt="Image" />                                   
                        </td>              
                        <td style="text-align: center;"><?php echo $info->name; ?></td>
                        <td style="text-align: center;"><?php echo $info->date_of_birth; ?></td>
                        <td style="text-align: center;"><?php echo $info->blood_group; ?></td>
                        <td style="text-align: center;"><?php echo $info->father_name; ?></td>
                        <td style="text-align: center;"><?php echo $info->mother_name; ?></td>
                        <td style="text-align: center;"><?php echo $info->parents_mobile; ?></td>
                     </tr>
                    <?php  }  ?>
                </tbody>
            </table>
        </div><!-- /.box-body -->
    </div> 
</div>