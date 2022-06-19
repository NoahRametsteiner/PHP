<?php
require_once('config.php');
require_once('controller.php');

?>
<!doctype html>
<html>
    <header>
        <meta charset="utf-8">
        <link rel="stylesheet" href="css.css">
        <title>LDAP Interface</title>
    </header>
    <body>

    <h1>LDAP</h1>

    <form method="post">
        <input type="submit" value="Users" name="Users"  class="button">
        <input type="submit" value="Groups" name="Groups"  class="button">
        <input type="submit" value="ForcePasswordChange" name="ForcePWChange"  class="button">
        <input type="submit" value="DelUser" name="DelUser"  class="button">
    </form>

    </body>
    <?php

        if(array_key_exists('Users', $_POST)) {
            Users();
        }else if(array_key_exists('Groups', $_POST)) {
            Groups();
        }else if(array_key_exists('ForcePWChange', $_POST)) {
            Force_PW_Change();
        }else if(array_key_exists('DelUser', $_POST)) {
            delUser();
        }

        function Users(){
            $array_users = array();
            $array_users = controller::getUsers();
            $user_count  = controller::getUserCount();


            echo "<table>";
            for($i = 0; $i < $user_count; $i++){
                echo "<tr>";
                echo "<td>".$array_users[$i]."</td></tr>";
            }
            echo "</table>";
        }

        function Groups(){
            $array_groups = array();
            $array_groups = controller::getGroups();
            $group_count  = controller::getGroupCount();


            echo "<table>";
            for($i = 0; $i < $group_count; $i++){
                echo "<tr>";
                echo "<td>".$array_groups[$i]."</td></tr>";
            }
            echo "</table>";
        }

        function Force_PW_Change(){
            $array_users = array();
            $array_users = controller::getUsers();
            $user_count  = controller::getUserCount();
            echo "<form method=\"post\">";
            echo "<select name=\"User\">";
            for($i = 0; $i < $user_count; $i++){
                echo "<option value=".$array_users[$i].">".$array_users[$i]."</option>";
            }
            echo "</select>";
            ?>

            <input type="submit" name="Send" class="button" value="Force PW Change" />
            </form>
            <?php
        }

        function delUser(){
            $array_users = array();
            $array_users = controller::getUsers();
            $user_count  = controller::getUserCount();
            echo "<form method=\"post\">";
            echo "<select name=\"User1\">";
            for($i = 0; $i < $user_count; $i++){
                echo "<option value=".$array_users[$i].">".$array_users[$i]."</option>";
            }
            echo "</select>";
            ?>

            <input type="submit" name="Send1" class="button" value="Del" />
            </form>
            <?php
        }

        if(array_key_exists('Send', $_POST)) {
            controller::forcePwdChange($_POST['User']);
        }
        if(array_key_exists('Send1', $_POST)) {
            $value = controller::delUser($_POST['User1']);
            echo $value;
        }
    ?>
    </body>
</html>
