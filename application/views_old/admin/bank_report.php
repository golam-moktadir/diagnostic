<aside>
    <section class="content">
        <div class="row">
            <section class="col-xs-12 connectedSortable">
                <div class="box box-info" style="color: black;" id="no_print1">
                    <div class="box-body">
                        <p style="font-size: 20px;">Search Report</p>
                      <div class="form-group col-sm-4 col-xs-12">
                            <label>
                                <b style="font-size: 15px;">Select Date (From-To)</b>
                            </label><br>
                            <input type="date" id="from_date" name="from_date"> To &#8212 <input type="date" id="to_date" name="to_date">
                        </div>
                       <div class="form-group col-sm-4 col-xs-12">
                            <label for="bank_name">Select Bank</label>
                            <select name="bank_name" id="bank_name" class="form-control selectpicker"
                                    data-live-search="true">
                                <option value="">-- Select --</option>
                                <?php foreach ($all_bank as $each_bank) { ?>
                                    <option value="<?php echo $each_bank->bank_name; ?>">
                                        <?php echo $each_bank->bank_name; ?>
                                    </option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="box-footer clearfix">
                        <button type="button" class="pull-left btn btn-success"
                                id="search_report">Search &nbsp <i class="fa fa-search"></i></button>
                    </div>
                </div>


                <div class="box box-info">
                    <div class="box-header">
                        <h3 class="box-title" style="color: black;">Total Report</h3>
                    </div>
                    <p style="padding-left: 10px;"><button id="print_button" title="Click to Print" type="button" 
                                                           onClick="window.print()" class="btn btn-flat btn-warning">Print</button></p>
                    <div id="show_info"></div>
                </div>
            </section>
        </div>
    </section>
</aside>

<script type="text/javascript">
    $("#search_report").on("click", function () {
        var from_date = $('#from_date').val();
        var to_date = $('#to_date').val();
        var bank_name = $('#bank_name').val();
        var post_data = {
            'from_date': from_date,
            'to_date': to_date,
            'bank_name': bank_name,
            '<?php echo $this->security->get_csrf_token_name(); ?>': '<?php echo $this->security->get_csrf_hash(); ?>'
        };

        $.ajax({
            type: "POST",
            url: "<?php echo base_url(); ?>Get_ajax_value/get_bank_report",
            data: post_data,
            success: function (data) {
                $('#show_info').html(data);
            }
        });
    });
</script>

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
    /*    @page {
            size: auto;    auto is the initial value 
            margin: 0;   this affects the margin in the printer settings 
        }*/
</style>