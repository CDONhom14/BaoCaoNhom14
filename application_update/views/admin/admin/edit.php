<?php
//laod ra file head
$this->load->view('admin/admin/head', $this->data);
?>

<div class="line"></div>

<div class="wrapper">
	<div class="widget">
		<div class="title">
			
			<h6>Cập Nhập Thông Tin Quản Trị Viên</h6>
		</div>

		<form class="form" id="form" action="" method="post" enctype="multipart/form-data">
			<fieldset>
				<div class="formRow">
						<label class="formLeft" for="param_name">name:<span class="req">*</span></label>
						<div class="formRight">
							<span class="oneTwo"><input name="name" id="param_name" _autocheck="true" value="<?php echo $info->name?>" type="text"></span>
							<span name="name_autocheck" class="autocheck"></span>
							<div name="name_error" class="clear error"><?php echo form_error('name')?></div>
						</div>
						<div class="clear"></div>
				</div>
				<div class="formRow">
						<label class="formLeft" for="param_username">username:<span class="req">*</span></label>
						<div class="formRight">
							<span class="oneTwo"><input name="username" id="param_username" _autocheck="true" value="<?php echo $info->username?>" type="text"></span>
							<span name="name_autocheck" class="autocheck"></span>
							<div name="name_error" class="clear error"><?php echo form_error('username')?></div>
						</div>
						<div class="clear"></div>
				</div>
				<div class="formRow">
						<label class="formLeft" for="param_password">password:<span class="req">*</span></label>
						<div class="formRight">
							<span class="oneTwo"><input name="password" id="param_password" _autocheck="true" value="<?php echo set_value('password')?>" type="password"></span>
							<span name="name_autocheck" class="autocheck"></span>
							<div name="name_error" class="clear error"><?php echo form_error('password')?></div>
						</div>
						<div class="clear"></div>
				</div>
				<div class="formRow">
						<label class="formLeft" for="param_password">nhập lại mật khẩu:<span class="req">*</span></label>
						<div class="formRight">
							<span class="oneTwo"><input name="re_password" id="param_re_password" _autocheck="true" value="<?php echo set_value('re_password')?>" type="password"></span>
							<span name="name_autocheck" class="autocheck"></span>
							<div name="name_error" class="clear error"><?php echo form_error('re_password')?></div>
						</div>
						<div class="clear"></div>
				</div>
				<div class="formSubmit">
	           			<input type="submit" value="Cập Nhập" class="redB">
	           			
	           	</div>
			</fieldset>
		</form>
	</div>


</div>
