
<!DOCTYPE html>
<html lang="en">
<head>
    <?php   require_once("head.php"); ?>
    <link href="//cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css" rel="stylesheet" >
    <script src="//cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
</head>
<body>
    <?php    
     require_once("navigation.php");
     ?>
    <div class="aside-right">
        <?php 
        require_once("top-header.php");
        ?>
        <div class="section1">
            <div class="board">
                <h4>Manage-row</h4>
            </div>
            <div class="board">
                <h4>Manage-columns</h4>
            </div>
        </div>
        <div class="data">
            <button type="button" id="add_row">Add Row</button>
            <input type="button" id="add_column" value="Add Column" />
            <input type="button" id="add_row_column" value="Add Row/Column" />

            <button type="button" id="remove_row">Remove Row</button>
            <input type="button" id="remove_column" value="Remove Column" />

            <table id="table"  cellpadding="0" cellspacing="0">
                <tbody>
                    
                </tbody>
            </table>





            <table class="student_table" border="1" cellpadding="0" cellspacing="0">
    <thead>
        <tr class="row100 head">
            <th class="cell100 column1">Sr No.</th>
            <th class="cell100 column1">Class name</th>
            <th class="cell100 column2">Type</th>
            <th class="cell100 column3">Hours</th>
            <th class="cell100 column4">Trainer</th>
            <th class="cell100 column5">Spots</th>
        </tr>
    </thead>
    <tbody>
        <?php $i = 1;?>
        <tr class="row100 body">
            <td class="cell100 column1"><?php echo $i++;?></td>
            <td class="cell100 column1">Like a butterfly</td>
            <td class="cell100 column2">Boxing</td>
            <td class="cell100 column3">9:00 AM - 11:00 AM</td>
            <td class="cell100 column4">Aaron Chapman</td>
            <td class="cell100 column5">10</td>
        </tr>
        <tr class="row100 body">
            <td class="cell100 column1"><?php echo $i++;?></td>
            <td class="cell100 column1">Mind &amp; Body</td>
            <td class="cell100 column2">Yoga</td>
            <td class="cell100 column3">8:00 AM - 9:00 AM</td>
            <td class="cell100 column4">Adam Stewart</td>
            <td class="cell100 column5">15</td>
        </tr>
        <tr class="row100 body">
            <td class="cell100 column1"><?php echo $i++;?></td>
            <td class="cell100 column1">Crit Cardio</td>
            <td class="cell100 column2">Gym</td>
            <td class="cell100 column3">9:00 AM - 10:00 AM</td>
            <td class="cell100 column4">Aaron Chapman</td>
            <td class="cell100 column5">10</td>
        </tr>
        <tr class="row100 body">
            <td class="cell100 column1"><?php echo $i++;?></td>
            <td class="cell100 column1">Wheel Pose Full Posture</td>
            <td class="cell100 column2">Yoga</td>
            <td class="cell100 column3">7:00 AM - 8:30 AM</td>
            <td class="cell100 column4">Donna Wilson</td>
            <td class="cell100 column5">15</td>
        </tr>
        <tr class="row100 body">
            <td class="cell100 column1"><?php echo $i++;?></td>
            <td class="cell100 column1">Playful Dancer's Flow</td>
            <td class="cell100 column2">Yoga</td>
            <td class="cell100 column3">8:00 AM - 9:00 AM</td>
            <td class="cell100 column4">Donna Wilson</td>
            <td class="cell100 column5">10</td>
        </tr>
        <tr class="row100 body">
            <td class="cell100 column1"><?php echo $i++;?></td>
            <td class="cell100 column1">Zumba Dance</td>
            <td class="cell100 column2">Dance</td>
            <td class="cell100 column3">5:00 PM - 7:00 PM</td>
            <td class="cell100 column4">Donna Wilson</td>
            <td class="cell100 column5">20</td>
        </tr>
        <tr class="row100 body">
            <td class="cell100 column1"><?php echo $i++;?></td>
            <td class="cell100 column1">Cardio Blast</td>
            <td class="cell100 column2">Gym</td>
            <td class="cell100 column3">5:00 PM - 7:00 PM</td>
            <td class="cell100 column4">Randy Porter</td>
            <td class="cell100 column5">10</td>
        </tr>
        <tr class="row100 body">
            <td class="cell100 column1"><?php echo $i++;?></td>
            <td class="cell100 column1">Pilates Reformer</td>
            <td class="cell100 column2">Gym</td>
            <td class="cell100 column3">8:00 AM - 9:00 AM</td>
            <td class="cell100 column4">Randy Porter</td>
            <td class="cell100 column5">10</td>
        </tr>
        <tr class="row100 body">
            <td class="cell100 column1"><?php echo $i++;?></td>
            <td class="cell100 column1">Supple Spine and Shoulders</td>
            <td class="cell100 column2">Yoga</td>
            <td class="cell100 column3">6:30 AM - 8:00 AM</td>
            <td class="cell100 column4">Randy Porter</td>
            <td class="cell100 column5">15</td>
        </tr>
        <tr class="row100 body">
            <td class="cell100 column1"><?php echo $i++;?></td>
            <td class="cell100 column1">Yoga for Divas</td>
            <td class="cell100 column2">Yoga</td>
            <td class="cell100 column3">9:00 AM - 11:00 AM</td>
            <td class="cell100 column4">Donna Wilson</td>
            <td class="cell100 column5">20</td>
        </tr>
        <tr class="row100 body">
            <td class="cell100 column1"><?php echo $i++;?></td>
            <td class="cell100 column1">Virtual Cycle</td>
            <td class="cell100 column2">Gym</td>
            <td class="cell100 column3">8:00 AM - 9:00 AM</td>
            <td class="cell100 column4">Randy Porter</td>
            <td class="cell100 column5">20</td>
        </tr>
        <tr class="row100 body">
            <td class="cell100 column1"><?php echo $i++;?></td>
            <td class="cell100 column1">Like a butterfly</td>
            <td class="cell100 column2">Boxing</td>
            <td class="cell100 column3">9:00 AM - 11:00 AM</td>
            <td class="cell100 column4">Aaron Chapman</td>
            <td class="cell100 column5">10</td>
        </tr>
        <tr class="row100 body">
            <td class="cell100 column1"><?php echo $i++;?></td>
            <td class="cell100 column1">Mind &amp; Body</td>
            <td class="cell100 column2">Yoga</td>
            <td class="cell100 column3">8:00 AM - 9:00 AM</td>
            <td class="cell100 column4">Adam Stewart</td>
            <td class="cell100 column5">15</td>
        </tr>
        <tr class="row100 body">
            <td class="cell100 column1"><?php echo $i++;?></td>
            <td class="cell100 column1">Crit Cardio</td>
            <td class="cell100 column2">Gym</td>
            <td class="cell100 column3">9:00 AM - 10:00 AM</td>
            <td class="cell100 column4">Aaron Chapman</td>
            <td class="cell100 column5">10</td>
        </tr>
        <tr class="row100 body">
            <td class="cell100 column1"><?php echo $i++;?></td>
            <td class="cell100 column1">Wheel Pose Full Posture</td>
            <td class="cell100 column2">Yoga</td>
            <td class="cell100 column3">7:00 AM - 8:30 AM</td>
            <td class="cell100 column4">Donna Wilson</td>
            <td class="cell100 column5">15</td>
        </tr>
        <tr class="row100 body">
            <td class="cell100 column1"><?php echo $i++;?></td>
            <td class="cell100 column1">Playful Dancer's Flow</td>
            <td class="cell100 column2">Yoga</td>
            <td class="cell100 column3">8:00 AM - 9:00 AM</td>
            <td class="cell100 column4">Donna Wilson</td>
            <td class="cell100 column5">10</td>
        </tr>
        <tr class="row100 body">
            <td class="cell100 column1"><?php echo $i++;?></td>
            <td class="cell100 column1">Zumba Dance</td>
            <td class="cell100 column2">Dance</td>
            <td class="cell100 column3">5:00 PM - 7:00 PM</td>
            <td class="cell100 column4">Donna Wilson</td>
            <td class="cell100 column5">20</td>
        </tr>
        <tr class="row100 body">
            <td class="cell100 column1"><?php echo $i++;?></td>
            <td class="cell100 column1">Cardio Blast</td>
            <td class="cell100 column2">Gym</td>
            <td class="cell100 column3">5:00 PM - 7:00 PM</td>
            <td class="cell100 column4">Randy Porter</td>
            <td class="cell100 column5">10</td>
        </tr>
        <tr class="row100 body">
            <td class="cell100 column1"><?php echo $i++;?></td>
            <td class="cell100 column1">Pilates Reformer</td>
            <td class="cell100 column2">Gym</td>
            <td class="cell100 column3">8:00 AM - 9:00 AM</td>
            <td class="cell100 column4">Randy Porter</td>
            <td class="cell100 column5">10</td>
        </tr>
        <tr class="row100 body">
            <td class="cell100 column1"><?php echo $i++;?></td>
            <td class="cell100 column1">Supple Spine and Shoulders</td>
            <td class="cell100 column2">Yoga</td>
            <td class="cell100 column3">6:30 AM - 8:00 AM</td>
            <td class="cell100 column4">Randy Porter</td>
            <td class="cell100 column5">15</td>
        </tr>
        <tr class="row100 body">
            <td class="cell100 column1"><?php echo $i++;?></td>
            <td class="cell100 column1">Yoga for Divas</td>
            <td class="cell100 column2">Yoga</td>
            <td class="cell100 column3">9:00 AM - 11:00 AM</td>
            <td class="cell100 column4">Donna Wilson</td>
            <td class="cell100 column5">20</td>
        </tr>
        <tr class="row100 body">
            <td class="cell100 column1"><?php echo $i++;?></td>
            <td class="cell100 column1">Virtual Cycle</td>
            <td class="cell100 column2">Gym</td>
            <td class="cell100 column3">8:00 AM - 9:00 AM</td>
            <td class="cell100 column4">Randy Porter</td>
            <td class="cell100 column5">20</td>
        </tr>
    </tbody>
</table>
        <script>
            jQuery(document).ready(function(){
                jQuery("#add_row").click(function(){
                    if(jQuery("#table tr").length) {
                        var rowHtml = jQuery("#table tr:first-child").clone();
                        rowHtml.find('input[type="text"]').val("");
                        jQuery("#table tbody").append(rowHtml);
                    } else {
                        var rowHtml = "<tr><td><input type='text' /></td></tr>";
                        jQuery("#table tbody").append(rowHtml);
                    }
                    
                });
                jQuery("#add_column").click(function(){
                    if(jQuery("#table tr").length) {
                        var columnHtml = "<td><input type='text' /></td>";
                        jQuery("#table tbody tr").append(columnHtml);
                        // $('table > tbody  > tr').each(function(index, tr) { 
                        //     var columnHtml = "<td></td>";
                        //     jQuery(this).append(columnHtml);
                        // });
                    } else {
                        var rowHtml = "<tr><td><input type='text' /></td></tr>";
                        jQuery("#table tbody").append(rowHtml);
                    }
                });

                jQuery("#add_row_column").click(function(){

                    var rowHtml = jQuery("#table tr:first-child").clone();
                    jQuery("#table tbody").append(rowHtml);

                    var columnHtml = "<td></td>";
                    jQuery("#table tbody tr").append(columnHtml);
                });

                jQuery("#remove_row").click(function(){
                    jQuery("#table tbody tr:last-child").remove();
                });

                jQuery("#remove_column").click(function(){
                    jQuery("#table tbody tr td:last-child").remove();
                    if(!jQuery("#table tbody tr:first-child td").length) {
                        jQuery("#table tbody tr").remove();
                    }
                });

            });
        </script>
        <script>
            jQuery(document).ready(function(){
                jQuery(".student_table").DataTable();
            });
        </script>



</body>
</html>
