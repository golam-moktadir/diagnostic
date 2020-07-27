<aside>
    <section class="content">
        <div class="row">
            <section class="col-xs-12 connectedSortable"> 
                <button id="print_button" title="Click to Print" type="button" style="float: left;"
                        onClick="window.print();" class="btn btn-flat btn-warning">Print
                </button>
                <div class="divHeader"  style="color: black; text-align: center;">
                    <div id="doctor_name" style="position: absolute; top:2%;
                         right:7%; font-size: 16px; font-weight: bold;"><?php echo $doctor; ?><br><?php echo $designation; ?></div>
                    <div id="name" style="position: absolute; top:11.7%;
                         left:10%; font-size: 16px;"><?php echo $name; ?></div>
                    <div id="age" style="position: absolute; top:11.7%;
                         right:32%; font-size: 16px;"><?php echo $age; ?> Yrs</div>
                    <div id="date"  style="position: absolute; top:11.7%;
                         right: 5%; font-size: 16px;"><?php echo $date; ?></div>
                    <img src="<?php echo base_url(); ?>assets/img/pad.png"
                         alt="Logo" width="100%" height="100%">
                </div>
            </section>
        </div>
    </section>
</aside>

<style>
    @media print {  
        div.divHeader {
            position: fixed;
            height: 100%; /* put the image height here */
            width: 100%; /* put the image width here */
            top: 0;
        }
        :-webkit-scrollbar {
            display: none;
        }
        @page {
            margin:0;
        }

        a[href]:after {
            content: none !important;
        }
        #print_button {
            display: none;
        }
    }
</style>      