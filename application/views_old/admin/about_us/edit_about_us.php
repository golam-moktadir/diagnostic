<aside>
    <section class="col-xs-12 connectedSortable">
        <section class="content-header">
            <h1>Update About Us</h1>
        </section>
        <section class="content">
            <form action="<?php echo base_url().'Edit/update_about/'.$data->id ?>" method="post"
                  autocomplete="off">
                <div class="row">
                    <div class="form-group col-sm-12 col-xs-12">
                        <label for="about">About Us</label>
                        <textarea name="about" rows="6" id="about" class="form-control"><?php echo $data->about ?></textarea>
                    </div>
                    <div class="form-group col-sm-2 col-xs-12">
                        <button style="" type="submit" class="btn btn-success">Update
                        </button>
                    </div>

                </div>

            </form>
        </section>
    </section>
</aside>


