<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<div class="container" style="color: black; width: 100%; padding: 0px 50px;">
   <div class="box box-info">
        <div class="box-header">
            <h2>Governing Body Profile</h2>                                    
        </div>

        <!-- /.box-header -->
        <div class="box-body table-responsive" style="width: 98%; overflow: scroll;">
            <table id="example2" class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th style="text-align: center;">No.</th>
                        <th style="text-align: center;">Image</th>
                        <th style="text-align: center;">Name</th>
                        <th style="text-align: center;">Designation</th>
                        <th style="text-align: center;">Details</th>
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
                            <img src="<?php echo base_url(); ?>assets/img/governing_body_profile/<?php echo $info->image; ?>" 
                              class="img-rounded" width="80px" height="60px" alt="Image" />                                   
                        </td>              
                        <td style="text-align: center;"><?php echo $info->name; ?></td>
                        <td style="text-align: center;"><?php echo $info->designation; ?></td>
                        <td style="text-align: center;"><?php echo $info->details; ?></td>
                     </tr>
                    <?php  }  ?>
                </tbody>

            </table>
        </div><!-- /.box-body -->
    </div> 
</div>