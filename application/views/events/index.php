<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" type="text/css" />

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>

<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Events Listing</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-success" href="<?php echo base_url('events/create') ?>"> Create New Event</a>
        </div>
    </div>
</div>

<table class="table table-bordered">
  <thead>
      <tr>
	  	<th>#</th>
          <th>Title</th>
          <th>Dates</th>
		  <th>Occurrence</th>
          <th width="220px">Actions</th>
      </tr>
  </thead>
  <tbody>
   <?php foreach ($eventsDetails as $key=>$eventsDetail) { ?>      
      <tr>
          <td><?php echo $key+1; ?></td>
          <td><?php echo $eventsDetail->title; ?></td>
		  <td><?php echo $eventsDetail->start_date .' to '.$eventsDetail->end_date; ?></td>
		  <td>
			  <?php 
			  	if($eventsDetail->repeat_type == '1') {
					echo $eventsDetail->repeat_every .' '.$eventsDetail->repeat_on;
				} else {
					echo 'Every '.$eventsDetail->repeat_interval .' '.ucfirst($eventsDetail->repeat_day). ' of the '.$eventsDetail->repeat_month_year;
				}
				?>
			</td>     
      <td>
        <form method="DELETE" action="<?php echo base_url('events/delete/'.$eventsDetail->id);?>">
          <a class="btn btn-info" href="<?php echo base_url('events/view/'.$eventsDetail->id) ?>"> View</a>
         <a class="btn btn-primary" href="<?php echo base_url('events/edit/'.$eventsDetail->id) ?>"> Edit</a>
          <button type="submit" class="btn btn-danger"> Delete</button>
        </form>
      </td>     
      </tr>
      <?php } ?>
  </tbody>
</table>

<script type="text/javascript">
	
</script>