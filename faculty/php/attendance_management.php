<?php
session_start();

// Predefined student names with IDs for each class
$students_by_class = [
    "CE-4A" => [
        ['id' => 230502001, 'name' => 'Shreya Bhavsar'],
        ['id' => 230502002, 'name' => 'Vraj Bhavsar'],
        ['id' => 230502003, 'name' => 'Kritika Patel'],
        ['id' => 230502004, 'name' => 'Rohti Rana'],
        ['id' => 230502005, 'name' => 'Varnu Parmar']
    ],
    "CE-4B" => [
        ['id' => 230502006, 'name' => 'Diya Bhatt'],
        ['id' => 230502007, 'name' => 'Moksha Dargi'],
        ['id' => 230502008, 'name' => 'Jay Prajapati'],
        ['id' => 230502009, 'name' => 'Vidhi Dave'],
        ['id' => 230502010, 'name' => 'Jasika Gupta']
    ],
    "CE-4C"=> [
        ['id' => 230502011, 'name' => 'Hiral Kosti'],
        ['id' => 230502012, 'name' => 'Tina Jain'],
        ['id' => 230502013, 'name' => 'Raj Patel'],
        ['id' => 230502014, 'name' => 'Hanee More'],
        ['id' => 230502015, 'name' => 'Anjli Patel']
    ],
    "CE-4D"=> [
        ['id' => 230502016, 'name' => 'Krisha Patel'],
        ['id' => 230502017, 'name' => 'Krishna Parmar'],
        ['id' => 230502018, 'name' => 'Bhavy Patel'],
        ['id' => 230502019, 'name' => 'Ram Parmar'],
        ['id' => 230502020, 'name' => 'Rudhra Patel']
    ],
    "CE-4E"=> [
        ['id' => 230502021, 'name' => 'Navya Shah'],
        ['id' => 230502022, 'name' => 'Pooja Bharti'],
        ['id' => 230502023, 'name' => 'Khushi Rajput'],
        ['id' => 230502024, 'name' => 'Tarang Ranipa'],
        ['id' => 230502025, 'name' => 'Anjli Prajapati']
    ],
    "CE-4F"=>[
        ['id' => 230502026, 'name' => 'Pratvi Shah'],
        ['id' => 230502027, 'name' => 'Honey Dave'],
        ['id' => 230502028, 'name' => 'Khushi Shah'],
        ['id' => 230502029, 'name' => 'Devika Prajapati'],
        ['id' => 230502030, 'name' => 'Vedika Prajapati']
    ],
    "IT-4A"=> [
        ["id"=> 230504001, "name"=> "Hiral Shah"],
        ["id"=> 230504002, "name"=> "Aayush Shah"],
        ["id"=> 230504003, "name"=> "Vinesh Parikh"],
        ["id"=> 230504004, "name"=> "Neev Patle"],
        ["id"=> 230504005, "name"=> "Moksh Shah"],
    ],
    "IT-4B"=> [
        ["id"=> 230504006, "name"=> "Ved Prajapati"],
        ["id"=> 230504007, "name"=> "Riya Thakkar"],
        ["id"=> 230504008, "name"=> "Riyanshi Popat"],
        ["id"=> 230504009, "name"=> "Arya Shah"],
        ["id"=> 230504010, "name"=> "Arya Sharma"],
    ],
    "IT-4C"=> [
       ["id"=> 230504011, "name"=> "Pransi Shah"],
       ["id"=> 230504012, "name"=> "Krrish Rana"],
       ["id"=> 230504013, "name"=> "Dhruvansh Porwal"],
       ["id"=> 230504014, "name"=> "Mahi Porwal"],
       ["id"=> 230504015, "name"=> "Pooja Rana"],
    ],
    "IT-4D"=> [
        ["id"=> 230504016, "name"=> "Ashish Parmar"],
        ["id"=> 230504017, "name"=> "Jaydeep Solanki"],
        ["id"=> 230504018, "name"=> "Hardik Parmar"],
        ["id"=> 230504019, "name"=> "Panthi Sarshiya"],
        ["id"=> 230504020, "name"=> "Vedanshi Patel"],
    ],
    "IT-4E"=> [
        ["id"=> 230504021, "name"=> "Disha Praram"],
        ["id"=> 230504022, "name"=> "Isha Bharti"],
        ["id"=> 230504023, "name"=> "Ansh Bharti"],
        ["id"=> 230504024, "name"=> "Smit Vyas"],
        ["id"=> 230504025, "name"=> "Ansh Vyas"],
    ]
];

$Faculty_by_class = [
    "Avi Mam"=>["CE-4A"],
    "Sonal Mam" => ["CE-4B"],
    "Palak Mam" =>["CE-4C"],
    "Priyansh Sir" =>["CE-4D"],
    "Shweta Mam" => ["CE-4E"],
    "Dhwani Mam" => ["CE-4F"],
    "Vishvani Mam" => ["IT-4A"],
    "Parchi Mam"=>["IT-4B"],
    "Nihar Sir"=>["IT-4C"],
    "Dharmik Sir"=>["IT-4D"],
    "Tejas sir"=>["IT-4E"]
];

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['select_class'])) {
    $selected_class = $_POST['class'] ?? '';
    $faculty_name = $_POST['faculty'] ?? '';
    $num_lectures = $_POST['lectures'] ?? '';
    $attendance_date = $_POST['date'] ?? '';

    // Validation check
    if (!$selected_class || !$faculty_name || !$num_lectures || !$attendance_date) {
        echo "<p style='color:red;'>Please fill in all fields.</p>";
    } elseif (!in_array($selected_class, $Faculty_by_class[$faculty_name] ?? [])) {
        echo "<p style='color:red;'>Access Denied! $faculty_name is not assigned to $selected_class.</p>";
    } else {
        // Store data in session
        $_SESSION['selected_class'] = $selected_class;
        $_SESSION['num_lectures'] = $num_lectures;
        $_SESSION['attendance_date'] = $attendance_date;
        $_SESSION['attendance'] = [];
        $_SESSION['students_by_class'] = $students_by_class;
        $_SESSION['submitted'] = false;

        header("Location: attendance_form.php");  
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Attendance Management</title>
</head>
<body>
    <h2>Attendance Management System</h2>
    <form method="post">
        <label>Select Faculty:</label>
        <select name="faculty" required>
            <option value="">-- Select Faculty --</option>
            <?php foreach ($Faculty_by_class as $faculty => $class) echo "<option value='$faculty'>$faculty</option>"; ?>
        </select>

        <label>Select Class:</label>
        <select name="class" required>
            <option value="">-- Select Class --</option>
            <?php foreach ($students_by_class as $class => $students) echo "<option value='$class'>$class</option>"; ?>
        </select>

        <label>Number of Lectures Conducted:</label>
        <select name="lectures" required>
            <option value="">-- Select Lectures --</option>
            <?php for ($i = 1; $i <= 6; $i++) echo "<option value='$i'>$i</option>"; ?>
        </select>

        <label>Attendance Date:</label>
        <input type="date" name="date" required>

        <button type="submit" name="select_class">Proceed</button>
    </form>
</body>
</html>
