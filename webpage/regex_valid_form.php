<?php

	$pattern="";
	$text="";
	$replaceText="";
	$replacedText="";
	$spcRemov="";


	$match="Not checked yet.";

if ($_SERVER["REQUEST_METHOD"]=="POST") {
	$pattern=$_POST["pattern"];
	$text=$_POST["text"];
	$replaceText=$_POST["replaceText"];

    $spcRemov=preg_replace("/\s/","",$text);
    $numOnly = @preg_replace("/[^\d.,]/","",$text);

    @preg_match("/\[(.*?)\]+/",$text,$wordExtracted);

	@$replacedText=preg_replace($pattern, $replaceText, $text);
    $noNewline=@preg_replace("/\n/","",$text);

	if(@preg_match($pattern, $text)) {
						$match="Match!";
					} else {
						$match="Does not match!";
					}
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Valid Form</title>
</head>
<body>
	<form action="regex_valid_form.php" method="post">
		<dl>
			<dt>Pattern</dt>
			<dd><input type="text" name="pattern" value="<?= $pattern ?>"></dd>



			<dt>Text</dt>
			<dd>
                <textarea name="text" id="" cols="30" rows="10"> <?= $text ?> </textarea>
			<dt>Replace Text</dt>
			<dd><input type="text" name="replaceText" value="<?= $replaceText ?>"></dd>

			<dt>Output Text</dt>
			<dd><?=	$match ?></dd>

			<dt>Replaced Text</dt>
			<dd> <code><?=	$replacedText ?></code></dd>

            <dt>With white spaces removed: </dt>
            <dd><?=$spcRemov?></dd>

            <dt> Numerical representative </dt>
            <dd><?=$numOnly?></dd>

            <dt> Without new lines</dt>
            <dd>  <?=$noNewline?></dd>

            <dt> Word within parenthesis </dt>
            <dd> <?=$wordExtracted[1]?></dd>
			<dt>&nbsp;</dt>
			<dd><input type="submit" value="Check"></dd>
		</dl>

	</form>
</body>
</html>
