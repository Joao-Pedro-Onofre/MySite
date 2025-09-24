<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
	<title><?php echo new \Illuminate\Support\EncodedHtmlString(config('app.name')); ?></title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<meta name="color-scheme" content="light">
	<meta name="supported-color-schemes" content="light">
	<style>
		@media only screen and (max-width: 600px) {
			.inner-body {
				width: 100% !important;
			}

			.footer {
				width: 100% !important;
			}
		}

		@media only screen and (max-width: 500px) {
			.button {
				width: 100% !important;
			}
		}
	</style>
	<?php echo $head ?? ''; ?>

</head>

<body style="margin:0; padding:0; background-color:#0b0f0d;">
	<!--[if gte mso 9]>
  <v:rect xmlns:v="urn:schemas-microsoft-com:vml" fill="true" stroke="false"
          style="width:100%;height:100%;">
    <v:fill type="frame" src="<?php echo new \Illuminate\Support\EncodedHtmlString(asset('images/email-hero.jpg')); ?>" color="#0b0f0d" />
    <v:textbox inset="0,0,0,0">
  <![endif]-->

	<table class="wrapper" width="100%" cellpadding="0" cellspacing="0" role="presentation"
		background="<?php echo new \Illuminate\Support\EncodedHtmlString(asset('images/email-hero.jpg')); ?>"
		style="background-image:url('<?php echo new \Illuminate\Support\EncodedHtmlString(asset('images/email-hero.jpg')); ?>');
                background-repeat:no-repeat;
                background-position:center top;
                background-size:cover;">
		<tr>
			<td align="center">
				<table class="content" width="100%" cellpadding="0" cellspacing="0" role="presentation">
					<?php echo $header ?? ''; ?>

					<!-- Email Body -->
					<tr>
						<td class="body" width="100%" cellpadding="0" cellspacing="0" style="border:hidden !important;">
							<table class="inner-body" align="center" width="570" cellpadding="0" cellspacing="0" role="presentation">
								<tr>
									<td class="content-cell">
										<?php echo Illuminate\Mail\Markdown::parse($slot); ?>

										<?php echo $subcopy ?? ''; ?>

									</td>
								</tr>
							</table>
						</td>
					</tr>
					<?php echo $footer ?? ''; ?>

				</table>
			</td>
		</tr>
	</table>

	<!--[if gte mso 9]>
    </v:textbox>
  </v:rect>
  <![endif]-->
</body>

</html><?php /**PATH E:\Trabalho\MySite\Backend\resources\views/vendor/mail/html/layout.blade.php ENDPATH**/ ?>