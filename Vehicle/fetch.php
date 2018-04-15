<?php
//fetch.php
$connect = mysqli_connect("localhost", "root", "root", "test2");
$columns = array('veh_type', 'veh_name', 'veh_reg_no', 'loadcapacity');

$query = "SELECT * FROM vehicles ";

if(isset($_POST["search"]["value"]))
{
 $query .= '
 WHERE veh_type LIKE "%'.$_POST["search"]["value"].'%" 
 OR veh_name LIKE "%'.$_POST["search"]["value"].'%" 
 ';
}

if(isset($_POST["order"]))
{
 $query .= 'ORDER BY '.$columns[$_POST['order']['0']['column']].' '.$_POST['order']['0']['dir'].' 
 ';
}
else
{
 $query .= 'ORDER BY veh_id DESC ';
}

$query1 = '';

if($_POST["length"] != -1)
{
 $query1 = 'LIMIT ' . $_POST['start'] . ', ' . $_POST['length'];
}

$number_filter_row = mysqli_num_rows(mysqli_query($connect, $query));

$result = mysqli_query($connect, $query . $query1);

$data = array();

while($row = mysqli_fetch_array($result))
{
 $sub_array = array();
 $sub_array[] = '<div contenteditable class="update" data-id="'.$row["veh_id"].'" data-column="veh_type">' . $row["veh_type"] . '</div>';
 $sub_array[] = '<div contenteditable class="update" data-id="'.$row["veh_id"].'" data-column="veh_name">' . $row["veh_name"] . '</div>';
 $sub_array[] = '<div contenteditable class="update" data-id="'.$row["veh_id"].'" data-column="veh_reg_no">' . $row["veh_reg_no"] . '</div>';
 $sub_array[] = '<div contenteditable class="update" data-id="'.$row["veh_id"].'" data-column="loadcapacity">' . $row["loadcapacity"] . '</div>';
 $sub_array[] = '<button type="button" name="delete" class="btn btn-danger btn-xs delete" veh_id="'.$row["veh_id"].'">Delete</button>';
 $data[] = $sub_array;
}

function get_all_data($connect)
{
 $query = "SELECT * FROM vehicles";
 $result = mysqli_query($connect, $query);
 return mysqli_num_rows($result);
}

$output = array(
 "draw"    => intval($_POST["draw"]),
 "recordsTotal"  =>  get_all_data($connect),
 "recordsFiltered" => $number_filter_row,
 "data"    => $data
);

echo json_encode($output);

?>
