<div id="main">
	<div class="errors">
	<?php
		if (isset($_SESSION['error_msg']))
		{
			foreach ($_SESSION['error_msg'] as $error) {
			?>
				<ul>
					<li><?php echo $error;?></li>
				</ul>
			<?php
			}

			unset($_SESSION['error_msg']);
		}
	?>
	</div>
	<div class="login">
		<form method="post" enctype="application/x-www-form-urlencoded"	action="?">
			<fieldset>
				<legend class="title">Login Form</legend>
				<table>
					<tr>
						<th>Login</th>
						<td><input type="text" name="login" size="30" /></td>
					</tr>
					<tr>
						<th>Password</th>
						<td><input type="text" name="password" size="30" /></td>
					</tr>
					<tr>
						<td></td>
						<td><button type="submit" name="submit">Login</button></td>
					</tr>
				</table>
			</fieldset>
		</form>
	</div>
