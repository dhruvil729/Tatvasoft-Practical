<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/css/datepicker.css" rel="stylesheet" type="text/css" />

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/js/bootstrap-datepicker.js"></script>

<div class="row">
<form method="post" action="<?php echo !isset($eventDetail) ? base_url('events/store') : base_url('events/update/'.$eventDetail->id); ?>">
    <?php
        if ($this->session->flashdata('errors')){
            echo '<div class="alert alert-danger">';
            echo $this->session->flashdata('errors');
            echo "</div>";
        }
    ?>

    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group col-md-6">
                <strong>Event Title:</strong>
                <input type="text" name="title" class="form-control" value="<?php echo isset($eventDetail) ? set_value("title", $eventDetail->title) : set_value("title"); ?>">
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group col-md-6">
                <strong>Start Date:</strong>
                <div  class="input-group date" data-date-format="mm-dd-yyyy">
                    <input id="start_date" class="form-control" name="start_date" type="text" readonly value="<?php echo isset($eventDetail) ? set_value("start_date", $eventDetail->start_date) : set_value("start_date"); ?>" />
                    <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
                </div>
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group col-md-6">
                <strong>End Date:</strong>
                <div  class="input-group date" data-date-format="mm-dd-yyyy">
                    <input id="end_date" class="form-control" name="end_date" type="text" readonly value="<?php echo isset($eventDetail) ? set_value("end_date", $eventDetail->end_date) : set_value("end_date"); ?>"/>
                    <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
                </div>
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group col-md-12">
                <strong>Recurrence:</strong>

                <input type="radio" name="repeat_type" value="1" <?php echo isset($eventDetail) ? (($eventDetail->repeat_type == '1')? 'checked' : '') : 'checked' ?>>
                <label for="html">Repeat</label>

                <select name="repeat_every">
                    <option value="Every" <?php echo isset($eventDetail) ? (($eventDetail->repeat_every == 'Every')? 'selected' : '') : '' ?>>Every</option>
                    <option value="Every Other" <?php echo isset($eventDetail) ? (($eventDetail->repeat_every == 'Every Other')? 'selected' : '') : '' ?>>Every Other</option>
                    <option value="Every Third" <?php echo isset($eventDetail) ? (($eventDetail->repeat_every == 'Every Third')? 'selected' : '') : '' ?>>Every Third</option>
                    <option value="Every Fourth" <?php echo isset($eventDetail) ? (($eventDetail->repeat_every == 'Every Fourth')? 'selected' : '') : '' ?>>Every Fourth</option>
                </select>

                <select name="repeat_on">
                    <option value="Day" <?php echo isset($eventDetail) ? (($eventDetail->repeat_on == 'Day')? 'selected' : '') : '' ?>>Day</option>
                    <option value="Week" <?php echo isset($eventDetail) ? (($eventDetail->repeat_on == 'Week')? 'selected' : '') : '' ?>>Week</option>
                    <option value="Month" <?php echo isset($eventDetail) ? (($eventDetail->repeat_on == 'Month')? 'selected' : '') : '' ?>>Month</option>
                    <option value="Year" <?php echo isset($eventDetail) ? (($eventDetail->repeat_on == 'Year')? 'selected' : '') : '' ?>>Year</option>
                </select>
            </div>

            <div class="form-group col-md-12">

                <input type="radio" name="repeat_type" value="2" <?php echo isset($eventDetail) ? (($eventDetail->repeat_type == '2')? 'checked' : '') : '' ?>>
                <label for="html">Repeat on the</label><br>
                
                <select name="repeat_interval">
                    <option value="First" <?php echo isset($eventDetail) ? (($eventDetail->repeat_interval == 'First')? 'selected' : '') : '' ?>>First</option>
                    <option value="Second" <?php echo isset($eventDetail) ? (($eventDetail->repeat_interval == 'Second')? 'selected' : '') : '' ?>>Second</option>
                    <option value="Third" <?php echo isset($eventDetail) ? (($eventDetail->repeat_interval == 'Third')? 'selected' : '') : '' ?>>Third</option>
                    <option value="Fourth" <?php echo isset($eventDetail) ? (($eventDetail->repeat_interval == 'Fourth')? 'selected' : '') : '' ?>>Fourth</option>
                </select>

                <select name="repeat_day">
                    <option value="sunday" <?php echo isset($eventDetail) ? (($eventDetail->repeat_day == 'sunday')? 'selected' : '') : '' ?>>Sunday</option>
                    <option value="monday" <?php echo isset($eventDetail) ? (($eventDetail->repeat_day == 'monday')? 'selected' : '') : '' ?>>Monday</option>
                    <option value="tuesday" <?php echo isset($eventDetail) ? (($eventDetail->repeat_day == 'tuesday')? 'selected' : '') : '' ?>>Tuesday</option>
                    <option value="wednesday" <?php echo isset($eventDetail) ? (($eventDetail->repeat_day == 'wednesday')? 'selected' : '') : '' ?>>Wednesday</option>
                    <option value="thursday" <?php echo isset($eventDetail) ? (($eventDetail->repeat_day == 'thursday')? 'selected' : '') : '' ?>>Thursday</option>
                    <option value="friday" <?php echo isset($eventDetail) ? (($eventDetail->repeat_day == 'friday')? 'selected' : '') : '' ?>>Friday</option>
                    <option value="saturday" <?php echo isset($eventDetail) ? (($eventDetail->repeat_day == 'saturday')? 'selected' : '') : '' ?>>Saturday</option>
                </select>
                
                <select name="repeat_month_year">
                    <option value="Month" <?php echo isset($eventDetail) ? (($eventDetail->repeat_month_year == 'Month')? 'selected' : '') : '' ?>>Month</option>
                    <option value="3 Months" <?php echo isset($eventDetail) ? (($eventDetail->repeat_month_year == '3 Months')? 'selected' : '') : '' ?>>3 Months</option>
                    <option value="4 Months" <?php echo isset($eventDetail) ? (($eventDetail->repeat_month_year == '4 Months')? 'selected' : '') : '' ?>>4 Months</option>
                    <option value="6 Months" <?php echo isset($eventDetail) ? (($eventDetail->repeat_month_year == '6 Months')? 'selected' : '') : '' ?>>6 Months</option>
                    <option value="Year" <?php echo isset($eventDetail) ? (($eventDetail->repeat_month_year == 'Year')? 'selected' : '') : '' ?>>Year</option>
                </select>
            </div>
        </div>
        
        <div class="col-xs-6 col-sm-6 col-md-6 text-center">
            <button type="submit" class="btn btn-primary">Submit</button>
            <a class="btn btn-primary" href="<?php echo base_url('events');?>">Back</a>
        </div>
    </div>
</form>

<script>
$(function () {
    $("#start_date").datepicker({ 
        autoclose: true,
        format: 'yyyy-mm-dd',
    }).on('changeDate', function (selected) {
        var minDate = new Date(selected.date.valueOf());
        $('#end_date').datepicker('setStartDate', minDate);
    });

    $("#end_date").datepicker({ 
        autoclose: true, 
        format: 'yyyy-mm-dd',
    }).on('changeDate', function (selected) {
        var maxDate = new Date(selected.date.valueOf());
        $('#start_date').datepicker('setEndDate', maxDate);
    });
});
</script>