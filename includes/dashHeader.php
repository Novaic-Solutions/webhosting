<?php require_once ($_SERVER['DOCUMENT_ROOT'].'/includes/overallHeader.php'); ?>
<link HREF="/Styles/userDash.css" REL="stylesheet" TYPE="text/css" />
<script src="/includes/js_includes/dashContent.js" type="text/javascript"></script>
<div CLASS="page">
<div CLASS="DashHeader">
	<div CLASS="DashHeaderTopWrap">
            <div CLASS="header_logo">
                <a HREF="http://www.nebula-hosting.net"><img SRC="/Images/banner1.png" ALT="Nebula-Hosting.net" name="Nebula-Hosting" WIDTH="600" HEIGHT="130" id="Nebula-Hosting" STYLE="background-color: #000000; display:block;" />
                </a>
            </div>
            <div CLASS="header_menus">
                <table>
                    <tr style="height:48px;">
                        <td colspan="3"><input class="field" type="text" name="search" id="search" value="" size="35" /></td>
                        <td><input type="submit" name="searchSubmit" class="bt_login" id="searchSubmit" value="Search" /></td>
                    </tr>
                    <tr style="height:40px;"><td colspan="4"></td></tr>
                    <tr style="height:34px;">
                        <td>twitter</td>
                        <td>G+</td>
                        <?php if (!isset($_SESSION['usr']))
                            {
                        ?>		<td><a href="#" id="loginLink">Login&nbsp;</a></td>
                                <td><a href="/Register" id="registerLink">Register</a></td>
                        <?php	} 
                            elseif(isset($_SESSION['usr']))
                            {?>
                                <td><a href="#" id="logoutLink"> <?php echo $_SESSION['usr'] ?>[logout]&nbsp;</a></td>
                                <td><a href="/Dashboard">Dashboard</a></td>
                         <?php } ?>
                    </tr>
                </table>
            </div>
	</div>
         <div CLASS="TopDashMenuWrap">
            <div CLASS="TopDashMenu">
                <center>
				<table>                    
                    <tr id="topMenuRow">
                        <td width="370px" style="border-left:solid #000 1px;" id="CHDash">
                            <a href="#">Cloud Hosting Dash</a>
                        </td>
                        <td width="370px" style="border-left:solid #000 1px; border-right: solid #000 1px;" id="DHDash">
                            <a href="#">Dedicated Hosting Dash</a>
                        </td>
                        <td width="370px" style="border-right: solid #000 1px;" id="SHDash">
                            <a href="#">Service Hosting Dash</a>
                        </td>
                    </tr>
                </table>
				</center>
            </div>
        </div>
</div>
<?php 	include_once ($_SERVER['DOCUMENT_ROOT'].'/includes/templates/loginMod.html'); ?>