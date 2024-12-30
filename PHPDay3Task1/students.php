<?php
echo"<h1>Application Name: PHP class registration</h1>";
$students = [
    ['name' => 'Alaa', 'email' => 'ahmed@test.com', 'track' => 'PHP'],
    ['name' => 'Shamy', 'email' => 'ali@test.com', 'track' => 'CMS'],
    ['name' => 'Youssef', 'email' => 'basem@test.com', 'track' => 'PHP'],
    ['name' => 'Waleid', 'email' => 'farouk@test.com', 'track' => 'CMS'],
    ['name' => 'Rahma', 'email' => 'hany@test.com', 'track' => 'PHP'],
];
echo "<table>";
echo "<tr>
        <Th>Name</TD>
        <th>email</td>
        <th>track</td>
    </tr>";
foreach ($students as $student) {
    echo "<tr>";
    echo "<td";
    if ($student["track"] == "CMS") {
        echo" style='color:red;'";
    }
    echo">";
    echo $student['name']."</td>";
    echo "<td";
    if ($student["track"] == "CMS") {
        echo" style='color:red;'";
    }
    echo">";
    echo $student['email']."</td>";
    echo "<td";
    if ($student["track"] == "CMS") {
        echo" style='color:red;'";
    }
    echo">";
    echo $student['track']."</td>";
    echo "<tr/>";
    
}
echo "</table>";
?>