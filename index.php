<?

$sql_select_items = "SELECT Subdivision_ID, banner_image_webp, banner_image_jpg FROM Message199 WHERE Subdivision_ID IN (SELECT Subdivision_ID FROM Sub_Class WHERE Class_ID = 199 AND Catalogue_ID = 1)";
$imgList = $nc_core->db->get_results($sql_select_items, $output = ARRAY_A);
$sql_select_items = "SELECT Subdivision_ID, Hidden_URL, Subdivision_Name FROM Subdivision WHERE Subdivision_ID IN (SELECT Subdivision_ID FROM Sub_Class WHERE Class_ID = 199 AND Catalogue_ID = 1)";
$urlList = $nc_core->db->get_results($sql_select_items, $output = ARRAY_A);


$result = [];
foreach ($imgList as $item1) {
    foreach ($urlList as $item2) {
        if ($item1['Subdivision_ID'] === $item2['Subdivision_ID']) {
            $result[] = array_merge($item1, $item2);
        }
    }
}



echo '<pre>';
print_r($result);
echo '</pre>';
?>