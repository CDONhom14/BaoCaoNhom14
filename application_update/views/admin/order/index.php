<?php
//laod ra file head
$this->load->view('admin/order/head', $this->data);
?>

<div class="line"></div>

<div class="wrapper" id="main_order">
	<div class="widget">
	
		<div class="title">
			
			<h6>
				Danh sách Đơn Hàng			</h6>
		 	<div class="num f12">Số lượng: <b><?php echo $total_rows;?></b></div>
		</div>
		
		<table cellpadding="0" cellspacing="0" width="100%" class="sTable mTable myTable" id="checkAll">
			
			<thead class="filter"><tr><td colspan="6">
				<form class="list_filter form" action="<?php echo admin_url('order')?>" method="get">
					<table cellpadding="0" cellspacing="0" width="80%"><tbody>
					
						<tr>
							<td class="label" style="width:40px;"><label for="filter_id">Mã số</label></td>
							<td class="item"><input name="id" value="<?php echo $this->input->get('id');?>" id="filter_id" type="text" style="width:55px;"></td>
							
							
							<td style="width:150px">
							<input type="submit" class="button blueB" value="Lọc">
							<input type="reset" class="basic" value="Reset" onclick="window.location.href = '<?php echo admin_url('order')?>'; ">
							</td>
							
						</tr>
					</tbody></table>
				</form>
			</td></tr></thead>
			
			<thead>
				<tr>
					<td style="width:21px;"><img src="<?php echo public_url()?>/admin/images/icons/tableArrows.png"></td>
					<td style="width:60px;">Mã số</td>
					
					<td>Tên</td>
                    <td>Gmail</td>
                    <td>Số điện thoại</td>
                    <td>Địa chỉ giao hàng</td>
                    <td>Tổng tiền</td>
					<td style="width:75px;">Ngày tạo</td>
					<td style="width:120px;">Hành động</td>
				</tr>
			</thead>
			
 			<tfoot class="auto_check_pages">
				<tr>
					<td colspan="6">
						 <div class="list_action itemActions">
								
						 </div>
							
					     <div class="pagination">
					     	<?php echo $this->pagination->create_links();?>
			             </div>
					</td>
				</tr>
			</tfoot>
			
			<tbody class="list_item">
				<?php foreach($list as $row):?>
			    <tr class="row_<?php echo $row->id?>">
					
					
					<td class="textC"></td>
					
					<td><?php echo $row->id?></td>
					<td><?php echo $row->user_name?></td>
                    <td><?php echo $row->user_email?></td>
                    <td><?php echo $row->user_phone?></td>
                    <td><?php echo $row->message?></td>
                    <td>
					<div class="f11">
					  <?php echo number_format($row->amount);?>		Đ			 					</div>
						
					
					</td>
					

					
					<td class="textC"><?php echo get_date($row->created)?></td>
					
					<td class="option textC">
											   						
						<a href="<?php echo admin_url('order/view/'.$row->id)?>" target="_blank" class="tipS" title="Xem chi tiết Giao dich">
								<img src="<?php echo public_url()?>/admin/images/icons/color/view.png">
						 </a>
						
						
						<a href="<?php echo admin_url('order/del/'.$row->id)?>" title="Xóa" class="tipS verify_action">
						    <img src="<?php echo public_url()?>/admin/images/icons/color/delete.png">
						</a>
					</td>
				</tr>
		        	<?php endforeach;?>		      
		        </tbody>
			
		</table>
	</div>
	
</div>