<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" type="text/css" />

<style>
table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

td, th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;
}

tr:nth-child(even) {
  background-color: #dddddd;
}
</style>

<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group col-md-6">
            <strong><?php echo $eventDetail->title ?></strong>
            
            <table>
            <?php
              $count = 0;

              if($eventDetail->repeat_type == '1') {
                  if($eventDetail->repeat_on=='Day')
                    $repeat_on = 'D';
                  else if($eventDetail->repeat_on=='Week')
                    $repeat_on = 'W';
                  else if($eventDetail->repeat_on=='Month') 
                    $repeat_on = 'M';
                  else 
                    $repeat_on = 'Y';

                  if($eventDetail->repeat_every=='Every') 
                    $repeat_every = '1';
                  else if($eventDetail->repeat_every=='Every Other')
                    $repeat_every = '2';
                  else if($eventDetail->repeat_every=='Every Third') 
                    $repeat_every = '3';
                  else 
                    $repeat_every = '4';

                  $period = new DatePeriod(
                      new DateTime($eventDetail->start_date),
                      new DateInterval("P$repeat_every$repeat_on"),
                      new DateTime($eventDetail->end_date)
                  );

                  foreach($period as $time) { ?>
                      <tr>
                        <th><?php echo $time->format('Y-m-d'); ?></th>
                        <th><?php echo $time->format('Y-m-d'); ?></th>
                      </tr>
                  <?php $count++; }
              } else {
                if($eventDetail->repeat_month_year=='Month') 
                  $repeat_month_year = '1';
                else if($eventDetail->repeat_month_year=='3 Months')
                  $repeat_month_year = '3';
                else if($eventDetail->repeat_month_year=='4 Months') 
                  $repeat_month_year = '4';
                else if($eventDetail->repeat_month_year=='6 Months') 
                  $repeat_month_year = '6';
                else 
                  $repeat_month_year = '12';

                $start    = new DateTime($eventDetail->start_date);
                $start->modify('first day of this month');
                $end      = new DateTime($eventDetail->end_date);
                $end->modify('first day of next month');
                $interval = DateInterval::createFromDateString("$repeat_month_year month");
                $period   = new DatePeriod($start, $interval, $end);

                foreach ($period as $dt) { ?>
                    <tr>
                        <th><?php echo date('Y-m-d', strtotime("$eventDetail->repeat_interval $eventDetail->repeat_day", mktime(0,0,0, $dt->format("m"),1, $dt->format("Y")))); ?></th>
                        <th><?php echo $dt->format('l'); ?></th>
                    </tr>
                <?php $count++; }              
            }
            ?>
            </table>
            Total Recurrence Event: [<?= ($count) ?>]
        </div>
    </div>

    

    <div class="col-xs-6 col-sm-6 col-md-6 text-center">
            <a class="btn btn-primary" href="<?php echo base_url('events');?>">Back</a>
        </div>
</div>