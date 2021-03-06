<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<!-- Set the viewport so this responsive site displays correctly on mobile devices -->
	    <meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="description" content="Chithra Jayakumar P2 Demo">
		<meta name="author" content="Chithra Jayakumar">
		<title>Dynamic Web Applications - Project P2</title>
		<link href='css/p2.css' rel='stylesheet'>
		<?php
		require 'logic.php';
		?>
	</head>
	<body id="bg">
		<div class="layout">
			<div class="course">
				<h1>Dynamic Web Applications - Project P2</h1>
				<h2>Password Generator</h2>
				<h3>-By  Chithra Jayakumar</h3>
			</div>

			<div id="projects">
				<div class="project">
					Project P4
				</div>
				<div class="project">
					Project P3
				</div>
				<div class="project">
					<a href="https://github.com/Chithra-J/P2" target="_blank">Project P2</a>
				</div>
				<div class="project">
					<a href="http://p1.chanchika.me/" target="_blank">Project P1</a>
				</div>
			</div>
			<div class="intro">
				<br>
				<br>
				<table>
					<tbody>
					<tr>
						<td class="othertd"></td>
						<td class="othertd"></td>
						<td class='cell1'>
							<br>
							<br>
						<form method='POST' action='index.php'>
							<input type='number' size="4" name="NumberOfWords" value="<?php
							if (isset($_POST['NumberOfWords'])) { echo $_POST['NumberOfWords'];
							} else { echo "3";
							}
							?>">
							<label class="chkbox">Number Of Words </label>
							<br>
							<label class="chkbox rang">(Range is 3-9)</label> <?php echo $err_mesg1; ?>
							<?php if (!$flag_err) {?>
							<br>
							<br>
							<?php }; ?>
							<br>
							<input type="checkbox" name="Number" class="chkbox" value="1"
							<?php if (!empty($_POST['Number'])): ?>
							checked="checked"
							<?php endif; ?>
							>
							<label class="chkbox">Use Number</label>
							<br>
							<br>
							<input type='checkbox' name="SplSymb" class="chkbox" value="1"
							<?php if (!empty($_POST['SplSymb'])): ?>
							checked="checked"
							<?php endif; ?>
							>
							<label class="chkbox">Use Special Character</label>
							<br>
							<br>							
							<input type="radio" name="Separator" <?php if (isset($Separator) && $Separator=="hyphen") echo "checked";?>  value="hyphen">Hyphen
							<input type="radio" name="Separator" <?php if (isset($Separator) && $Separator=="semicolon") echo "checked";?>  value="semicolon">SemiColon
							<label class="chkbox">Use Word Separator</label>
							<br><label class="chkbox rang">(Default is a space)</label><br>
							<br>
							<br>
							<input type='number' size="4" name="NumberOfSplChar" value="<?php
							if (isset($_POST['NumberOfSplChar'])) { echo $_POST['NumberOfSplChar'];
							}
							?>">
							<label class="chkbox">Number Of Special Characters </label>
							<br>
							<label class="chkbox rang">(Range is 1-4)</label> <?php echo $err_mesg2; ?>
							<?php if (!$flag_err) {?>
							<br>
							<br>
							<?php }; ?>
							<br>
							<input class="subm" type='submit' name="submit" value='Get me a password'>
						</form>
						<br>
						<br>
						</td>
						<td class="othertd"></td>
						<td class="othertd"></td>
						<td>
							<label class="chkbox">Your Choice Of Password:</label>
							<br>						
							<br>
							<br>
							<textarea name="passwd" cols="45" rows="3"><?php if (!empty($passwd) && (strlen($passwd) > 0)) { echo $passwd; } else { echo "";} ?></textarea></td>
					</tr>
					</tbody>
				</table>
				<p>
					<br>
				</p>
				<p>
					<br>
				</p>
				<p>
					<b><u>About this project:</u></b>
					<br>
					<br>
					Project P2 is to practice working with basics of PHP implementing a password generator. This project is built using PHP, HTML and CSS. Uses first 10 pages from 
					<a href="http://www.paulnoll.com/Books/Clear-English/English-3000-common-words.html" target="_blank">paulnoll.com</a> 
					which has most commonly used words in the English to randomly select a page and  generate the password with other given inputs.
					<br>
				</p>
			</div>
		</div>
	</body>
</html>
