<html>
<title>Multiple Linear Regression</title>
<style>
h3 {color:white; background:maroon;margin-bottom:2;margin-top:2}
html,body{height:100%;}
wrap {margin-bottom:-50px;}
#footer {color:gray;width:200px;height:50px;margin:auto;margin-bottom:3}
</style>
<body>
<h1>Multiple Linear Regression</h1>
<HR>
<div id="wrap">
<h3>Model : </h3>
y=m1*x1+m2*x2+m3*x3+...+b<br>
<form action="index.php" method="post">
<h3>Sample data in format: x1 x2 x3 ... y</h3>
2310 2 2 20 142000<br>
2333 2 2 12 144000<br>
2356 3 1.5 33 151000<br>
2379 3 2 43 150000<br>
2402 2 3 53 139000<br>
2425 4 2 23 169000<br>
2448 2 1.5 99 126000<br>
2471 2 2 34 142900<br>
2494 3 3 23 163000<br>
2517 4 4 55 169000<br>
2540 2 3 22 149000<br>
<h3>Your Data:</h3>
<?php
    if($_POST['submit']!="OK") {
?>
<textarea name="dataset" cols="80" rows="10" /></textarea>
<input type="submit" name="submit" value="OK" />
<h3>Result:</h3>
<br>
<br>
<?php } ?>
<?php
    if($_POST['submit']=="OK") {
        if(!empty($_POST['dataset'])) {
                $filename=basename(tempnam('tmp','DATA'));
                $filename="tmp/".$filename;
                $fp=fopen("$filename","w");
                fwrite($fp,$_POST['dataset']);
                fclose($fp);
                system("dos2nuix $filename");
                $result = explode("\n",`./mlr.py $filename`);
		$formula = $result[0];
		$R2 = $result[1];
		system("rm -f $filename");
		
?>
<textarea name="dataset" cols="80" rows="10"/><?php echo $_POST['dataset'];?></textarea>
<input type="submit" name="submit" value="OK" />
<h3>Result:</h3>
<?php
		echo $formula."<br>";
		echo $R2."<br>";
                }
	}
?>
</form>
</div>
<div id="footer"><a href="mailto:raymond.zhang.hurulu@gmail.com">raymond.zhang.hurulu@gmail.com</a></div>
</body>
</html>
