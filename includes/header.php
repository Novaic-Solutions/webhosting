<?php 	require_once ($_SERVER['DOCUMENT_ROOT'].'/includes/overallHeader.php'); ?>
<body>
<div CLASS="page">
<div CLASS="header_wrap">
	<div CLASS="header">  
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
				<?php 	} ?>
				</tr>
			</table>
		</div>
	</div>
		<div class="header_menubar_wrapper">
		<div class="header_menubar">
			<ul id="MenuBar1" class="MenuBarHorizontal">				
				<li><a href="/Cloud" class="MenuBarItemSubmenu">Cloud Options</a>
					<ul>
						<li><a href="/Cloud/Cloud_Servers">Cloud Servers</a></li>
						<li><a href="/Cloud/Cloud_BF">Cloud BF4 Servers</a></li>
						<li><a href="/Minecraft">Cloud Minecraft Servers</a></li>
						<li><a href="/Cloud/Cloud_Websites">Cloud Websites</a></li>
						<li><a href="/Cloud/Cloud_Storage">Cloud Storage</a></li>
						<li><a href="/Cloud/Cloud_DBs">Cloud Databases</a></li>
						<li><a href="/Cloud/Cloud_Backups">Cloud Backups</a></li>
					</ul>
				<li><a href="/Dedicated/Dedi_Prod" class="MenuBarItemSubmenu">Dedicated Options</a>
					<ul>
						<li><a href="/Dedicated/Dedi_Serv">Dedicated Servers</a></li>
						<li><a href="/Dedicated/Dedi_MC">Dedicated MC Server</a></li>
						<li><a href="/Dedicated/Dedi_BF">Dedicated BF4 Server</a></li>
						<li><a href="/Dedicated/Dedi_VM">Dedicated Virtualization</a></li>
					</ul> 
				</li>
				<li><a href="/Minecraft">Minecraft Hosting</a></li>
				<li><a href="/Services/main" class="MenuBarItemSubmenu">Services</a>
					<ul>
						<li><a href="/Services/servApache">Apache</a></li>
						<li><a href="/Services/servJoom">Joomla</a></li>
						<li><a href="/Services/servWordP">Wordpress</a></li>
						<li><a href="/Services/servMySQL">MySQL</a></li>
					</ul>
				</li>
				<li><a href="/Support">Support & FAQ</a></li>
			</ul>
		</div>
		
	</div>
</div>
<?php 	include_once ($_SERVER['DOCUMENT_ROOT'].'/includes/templates/loginMod.html'); ?>