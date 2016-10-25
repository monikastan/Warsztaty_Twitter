<?php

function printHeaderLoggedUser($pageName, $userName) {
    
//wypisz naglowek dla zalogowanego usera(pageName, userName);
            
    echo '<table width=100%><tr>';
    echo '  <td width=80 align=center><a href="index.php"><img src ="ptak.jpg" height="60" width="60"></a></td>';
    echo '  <td width=150 valign="center">Twitter v.1.0<br> by Monika Serafinska</td>';
    echo '  <td bgcolor="#aaccff" align=center>' .$pageName. '</td>';
    echo '  <td width=200 align=center>Logged user: <a href=EditUserPage.php>' . $userName . '</a><br><a href="PageLogout.php">Logout</a></td>';
    echo '</tr></table>';
    echo '<br>';

} 
        

function printHeaderNotLoggedUser ($pageName) {
 
        
//wypisz naglowek dla niezalogowanego usera(pageName);

    echo '<table width=100%><tr>';
    echo '  <td width=80 align=center><a href="index.php"><img src ="ptak.jpg" height="60" width="60"></a></td>';
    echo '  <td width=150 valign="center">Twitter v.1.0<br> by Monika Serafinska</td>';
    echo '  <td bgcolor="#aaccff" align=center>' .$pageName. '</td>';
    echo '  <td width=230 align=center>Logged user: none<br><a href="PageLogin.php">Login</a></td>';
    echo '</tr></table>';
    echo '<br>';


}