<?php
require('auth/check_auth.php');

require_once 'model/autorun.php';
$myModel = Model\Data::makeModel(Model\Data::FILE);
$myModel->setCurrentUser($_SESSION['user']);
?>
<!DOCTYPE HTML>
<html>
<head>
    <title>Список групи</title>
    <link rel="stylesheet" type="text/css" href="styles/main_style.css"/>
    <link rel="stylesheet" type="text/css" href="styles/gender_style.css"/>
    <link rel="stylesheet" type="text/css" href="styles/group_choose_style.css"/>
</head>
<body>
<header>
    <div class='user_info'>
        <span>Hello <?php echo $_SESSION['user']; ?> !</span>
        <?php if ($myModel->checkRight('user', 'admin')): ?>
            <a href='admin/index.php'>Адміністрування</a>
        <?php endif; ?>
        <a href='auth/logout.php'>Logout</a>
    </div>
    <?php if ($myModel->checkRight('group', 'view')): ?>
        <?php $data['groups'] = $myModel->readGroups(); ?>
        <form name='group_form' method='get'>
            <label for='group'>Група</label>
            <select name='group'>
                <option disabled>Group</option>
                <?php
                foreach ($data['groups'] as $curgroup) {
                    echo "<option " . (($curgroup->getId() == $_GET['group']) ? "selected " : "") . " value='" . $curgroup->getId() . "'>" . $curgroup->getNumber() . "</option>";
                }
                ?>
            </select>
            <input type='submit' value='ok'>
            <?php if ($myModel->checkRight('group', 'create')): ?>
                <a href='forms/create_group.php'>Додати групу</a>
            <?php endif; ?>
        </form>
        <?php if ($_GET['group']): ?>
            <?php
            $data['group'] = $myModel->readGroup($_GET['group']);
            ?>
            <h1>Список <span class="group-number"><?php echo $data['group']->getNumber(); ?></span> групи</h1>
            <h2>Староста <span class="group-starosta"><?php echo $data['group']->getStarosta(); ?></span></h2>
            <h3>Факультет <span class="group-department"><?php echo $data['group']->getDepartment(); ?></span></h3>
            <div class='control'>
                <?php if ($myModel->checkRight('group', 'edit')): ?>
                    <a href="forms/edit_group.php?group=<?php echo $_GET['group']; ?>">Редагувати групу</a>
                <?php endif; ?>
                <?php if ($myModel->checkRight('group', 'delete')): ?>
                    <a href='forms/delete_group.php?group=<?php echo $_GET['group']; ?>'>Видалити групу</a>
                <?php endif; ?>
            </div>
        <?php endif; ?>
    <?php endif; ?>
</header>
<?php if ($myModel->checkRight('student', 'view')): ?>
    <?php $data['students'] = $myModel->readStudents($_GET['group']); ?>
    <section>
        <?php if ($_GET['group']): ?>
            <?php if ($myModel->checkRight('student', 'create')): ?>
                <div class="control">
                    <a href='forms/create_student.php?group=<?php echo $_GET["group"]; ?>'>Додати студента</a>
                </div>
            <?php endif; ?>
            <form name='students_filter' method='post'>
                Фільтрувати за прізвищем <input type='text' name='stud_name_filter'
                                                value='<?php echo $_POST['stud_name_filter']; ?>'>
                <input type='submit' value='фільтрувати'>
            </form>
            <table>
                <thead>
                <tr>
                    <th>№ п.п.</th>
                    <th>ПІБ</th>
                    <th>Стать</th>
                    <th>Рік народження</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($data['students'] as $key => $student): ?>
                    <?php if (!$_POST['stud_name_filter'] || stristr($student->getName(), $_POST['stud_name_filter'])): ?>
                        <?php
                        $row_class = 'row';
                        if ($student->isGenderMale()) {
                            $row_class = 'student_boy';
                        }
                        if ($student->isGenderFemale()) {
                            $row_class = 'student_girl';
                        }
                        ?>
                        <tr class='<?php echo $row_class; ?>'>
                            <td><?php echo($key + 1); ?></td>
                            <td><?php echo $student->getName(); ?></td>
                            <td><?php echo $student->isGenderMale() ? 'чол' : 'жін'; ?></td>
                            <td>
                                <?php
                                echo date_format($student->getDob(), 'd.m.Y');;
                                ?>
                            </td>
                            <td>
                                <?php if ($myModel->checkRight('student', 'edit')): ?>
                                    <a href='forms/edit_student.php?group=<?php echo $_GET["group"]; ?>&file=<?php echo $student->getId(); ?>'>Редагувати</a>
                                <?php endif; ?>
                                <?php if ($myModel->checkRight('student', 'delete')): ?>
                                    |
                                    <a href='forms/delete_student.php?group=<?php echo $_GET["group"]; ?>&file=<?php echo $student->getId(); ?>'>Видалити</a>
                                <?php endif; ?>
                            </td>
                        </tr>
                    <?php endif; ?>
                <?php endforeach; ?>
                </tbody>
            </table>
        <?php endif; ?>
    </section>
<?php endif; ?>
</body>
</html>