<?php
//fetch.php
$connect = mysqli_connect("localhost", "root", "root", "test2");
$columns = array('driver_type', 'driver_name', 'driver_lic', 'driver_city', 'driver_age',);

$query = "SELECT * FROM drivers ";

if(isset($_POST["search"]["value"]))
{
 $query .= '
 WHERE driver_type LIKE "%'.$_POST["search"]["value"].'%" 
 OR driver_name LIKE "%'.$_POST["search"]["value"].'%" 
 ';
}

if(isset($_POST["order"]))
{
 $query .= 'ORDER BY '.$columns[$_POST['order']['0']['column']].' '.$_POST['order']['0']['dir'].' 
 ';
}
else
{
 $query .= 'ORDER BY driver_id DESC ';
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
 $sub_array[] = '<div contenteditable class="update" data-id="'.$row["driver_id"].'" data-column="driver_type">' . $row["driver_type"] . '</div>';
 $sub_array[] = '<div contenteditable class="update" data-id="'.$row["driver_id"].'" data-column="driver_name">' . $row["driver_name"] . '</div>';
 $sub_array[] = '<div contenteditable class="update" data-id="'.$row["driver_id"].'" data-column="driver_lic">' . $row["driver_lic"] . '</div>';
 $sub_array[] = '<div contenteditable class="update" data-id="'.$row["driver_id"].'" data-column="driver_city">' . $row["driver_city"] . '</div>';
 $sub_array[] = '<div contenteditable class="update" data-id="'.$row["driver_id"].'" data-column="driver_age">' . $row["driver_age"] . '</div>';
 $sub_array[] = '<button type="button" name="delete" class="btn btn-danger btn-xs delete" driver_id="'.$row["driver_id"].'">Delete</button>';
 $data[] = $sub_array;
}

function get_all_data($connect)
{
 $query = "SELECT * FROM drivers";
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
