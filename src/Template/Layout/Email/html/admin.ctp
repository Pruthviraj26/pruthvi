<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.View.Layouts.Email.html
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN">
<html>
<head>
	<title></title>
</head>
<body>
    <?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.View.Emails.html
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */
?>
<?php

?>

<table style="min-width:320px;" bgcolor="#eaeced" cellspacing="0" cellpadding="0" width="100%">
			<!-- fix for gmail -->
			<tbody><tr>
				<td class="hide">
					<table style="width:600px !important;" cellspacing="0" cellpadding="0" width="600">
						<tbody><tr>
							<td style="min-width:600px; font-size:0; line-height:0;">&nbsp;</td>
						</tr>
					</tbody></table>
				</td>
			</tr>
			<tr>
				<td class="wrapper" style="padding:0 10px;">
					<!-- module 1 -->
					<table  width="100%">
						<tbody><tr>
							<td data-bgcolor="bg-module" bgcolor="#eaeced">
								<table class="flexible" style="margin:0 auto;" align="center" cellspacing="0" cellpadding="0" width="600">
									<tbody><tr>
										<td style="padding:10px;">
											<table cellspacing="0" cellpadding="0" width="100%">
												<tbody><tr>
													<th class="flex" style="padding:0;" align="left" width="113">
														<table class="center" cellspacing="0" cellpadding="0">
															<tbody><tr>
																<td style="line-height:0;">
																	<a target="_blank" style="text-decoration:none;" 
                                                                       href="<?= SITE_URL ?>"><img src="<?= $site['logo'] ?>" style="font:bold 12px/12px Arial, Helvetica, sans-serif; color:#606060;" alt="<?= $site['name'] ?> Logo" hspace="0" height="50" align="left" border="0" width="150" vspace="0"></a>
																</td>
															</tr>
														</tbody></table>
													</th>
													
												</tr>
											</tbody></table>
										</td>
									</tr>
								</tbody></table>
							</td>
						</tr>
					</tbody></table>
					<!-- module 2 -->
					<table data-module="module-2" data-thumb="thumbnails/02.png" cellspacing="0" cellpadding="0" width="100%">
						<tbody><tr>
							<td data-bgcolor="bg-module" bgcolor="#eaeced">
								<table class="flexible" style="margin:0 auto;" align="center" cellspacing="0" cellpadding="0" width="600">
									<tbody>
									<tr>
										<td data-bgcolor="bg-block" class="holder" style="padding:58px 60px 52px;" bgcolor="#f9f9f9">
											<table cellspacing="0" cellpadding="0" width="100%">
												<tbody><tr>
													<td data-color="title" data-size="size title" data-min="25" data-max="45" data-link-color="link title color" data-link-style="text-decoration:none; color:#292c34;" class="title" style="font:35px/38px Arial, Helvetica, sans-serif; color:#292c34; padding:0 0 24px;" align="center">
														<?=$subject?>
													</td>
												</tr>
												<tr>
													<td data-color="text" data-size="size text" data-min="10" data-max="26" data-link-color="link text color" data-link-style="font-weight:bold; text-decoration:underline; color:#40aceb;" style="font:bold 16px/25px Arial, Helvetica, sans-serif; color:#888; padding:0 0 23px;" align="center">
															<?= $this->fetch('content') ?>
													</td>
												</tr>
                                                    <?php if(isset($link)) {?>
												<tr>
													<td style="padding:0 0 20px;">
														<table style="margin:0 auto;" align="center" cellspacing="0" cellpadding="0" width="134">
															<tbody><tr>
																<td data-bgcolor="bg-button" data-size="size button" data-min="10" data-max="16" class="btn" style="font:12px/14px Arial, Helvetica, sans-serif; color:#f8f9fb; text-transform:uppercase; mso-padding-alt:12px 10px 10px; border-radius:2px;" bgcolor="#7bb84f" align="center">
																	<a target="_blank" style="text-decoration:none; color:#f8f9fb; display:block; padding:12px 10px 10px;" href="<?=$link?>">Learn More</a>
																</td>
															</tr>
														</tbody></table>
													</td>
												</tr>
                                                    <?php } ?>
											</tbody></table>
										</td>
									</tr>
									<tr><td height="28"></td></tr>
								</tbody></table>
							</td>
						</tr>
					</tbody></table>
					<!-- module 3 -->
				
					<!-- module 7 -->
					<table data-module="module-7" data-thumb="thumbnails/07.png" cellspacing="0" cellpadding="0" width="100%">
						<tbody><tr>
							<td data-bgcolor="bg-module" bgcolor="#eaeced">
								<table class="flexible" style="margin:0 auto;" align="center" cellspacing="0" cellpadding="0" width="600">
									<tbody><tr>
										<td class="footer" style="padding:0 0 10px;">
											<table cellspacing="0" cellpadding="0" width="100%">
												<tbody><tr class="table-holder">
													<th class="tfoot" style="vertical-align:top; padding:0;" align="left" width="400">
														<table cellspacing="0" cellpadding="0" width="100%">
															<tbody><tr>
																<td data-color="text" data-link-color="link text color" data-link-style="text-decoration:underline; color:#797c82;" class="aligncenter" style="font:12px/16px Arial, Helvetica, sans-serif; color:#797c82; padding:0 0 10px;">
																	<?= $site['name'] ?>
																</td>
															</tr>
														</tbody></table>
													</th>
												
												</tr>
											</tbody></table>
										</td>
									</tr>
								</tbody></table>
							</td>
						</tr>
					</tbody></table>
				</td>
			</tr>
			<!-- fix for gmail -->
			<tr>
				<td style="line-height:0;"><div style="display:none; white-space:nowrap; font:15px/1px courier;">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</div></td>
			</tr>
		</tbody></table>
	
</body>
</html>

