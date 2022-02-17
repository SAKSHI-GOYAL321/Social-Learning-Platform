<?php
include('connection.php');
$clubid=$_POST['club_id'];

$query=$db->prepare('select * from events where club_id=?');
$data=array($clubid);
$execute=$query->execute($data);

while($data_row=$query->fetch())
{

?>
    <div class="events_row">
        <div class="event">
            <div class="date">
                <p class="event_date"><?php echo $data_row['event_date'];?> </p>
            </div>
            <div class="desc">
            <p class="event_name"><?php echo $data_row['event_name'];?> </p>
            
            <p class="event_time fa fa-clock-o"><?php echo $data_row['event_time'];?> </p>
            </div>
            
        </div>
    </div>
    
<?php
}

?>