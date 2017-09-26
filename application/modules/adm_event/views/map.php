<div class="row">
    <!-- left column -->
    <div class="col-md-12">
        <!-- general form elements -->
        <div class="box panel-saya col-md-12">
            <div class="box-header">
                <center><h3 class="box-title"><?= @$MASTER['DATA']['SUBTITLE'] ?></h3></center>
                <hr>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <div class="form-group col-md-12">
                    <div class="col-sm-4">
                        <label class="control-label" for="lat">Latitude</label>
                        <input type="text" name='lat' id='lat' placeholder="nilai latitude..." class="form-control">
                        <p class="">Copy nilai latitudenya, lalu paste.</p>
                    </div>
                    <div class="col-sm-4">
                        <label class="control-label" for="lng">Longitude</label>
                        <input type="text" name='lng' id='lng' class="form-control" placeholder="nilai longitude...">
                        <p class="">Copy nilai longitudenya, lalu paste.</p>
                   </div>
                </div>
                <div class="form-group col-md-12">
                </div>
                <div class="form-group col-md-12">
                    <h4>Drag n drop pointer map nya untuk mendapatkan nilai Latitude dan Longitude</h4>
                    <div id="map" style="width:600px;height: 300px;"></div>
                </div>
            </div>
        </div>
        <!-- /.box -->
    </div>
    <!--/.col (left) -->
    <!-- right column -->
    <!--/.col (right) -->
</div>