<?php
ini_set('memory_limit', '-1');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<base href="<?php echo $base_url; ?>" />

	<title><?php echo $page_title; ?></title>

	<?php
		foreach ($meta_data as $name => $content)
		{
			if (!empty($content))
				echo "<meta name='$name' content='$content'>".PHP_EOL;
		}

		foreach ($stylesheets as $media => $files)
		{
			foreach ($files as $file)
			{
				$url = starts_with($file, 'http') ? $file : base_url($file);
				echo "<link href='$url' rel='stylesheet' media='$media'>".PHP_EOL;	
			}
		}
		
		foreach ($scripts['head'] as $file)
		{
			$url = starts_with($file, 'http') ? $file : base_url($file);
			echo "<script src='$url' type='text/javascript' nonce='S51U26wMQz'></script>".PHP_EOL;
		}
	?>

	<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js" type="text/javascript" nonce='S51U26wMQz'></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js" type="text/javascript" nonce='S51U26wMQz'></script>
	<![endif]-->
</head>
<body class="<?php echo $body_class; ?>">