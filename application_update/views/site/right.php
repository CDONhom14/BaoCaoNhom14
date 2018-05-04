		                  <!-- The Support -->
	     <div class="box-right">
                <div class="title tittle-box-right">
			        <h2> Hỗ trợ trực tuyến </h2>
			    </div>
			    <div class="content-box">
			         <!-- goi ra phuong thuc hien thi danh sach ho tro -->
			         <div class="support">
                    <strong>Nguyen Tan Phung </strong>				
          <a rel="nofollow" href="ymsgr:sendIM?tuyenht90">
		    <img src="http://opi.yahoo.com/online?u=tuyenht90&amp;m=g&amp;t=2">
	      </a>
	      
	      <p>
	         <img style="margin-bottom:-3px" src="<?php echo public_url()?>/site/images/phone.png"> 01655200012	      </p>
	      
		  <p>
			<a rel="nofollow" href="mailto:nguyentanphung@gmail.com">
			    <img style="margin-bottom:-3px" src="<?php echo public_url()?>/site/images/email.png"> Email: nguyentanphung...
		    </a>
		  </p>
		  <p>
			<a rel="nofollow" href="skype.com">
			     <img style="margin-bottom:-3px" src="<?php echo public_url()?>/site/images/skype.png"> Skype: phungnt			</a>
		</p>	
		</div>			        </div>
          </div>
       <!-- End Support -->
       
         <!-- The news -->
	          <div class="box-right">
                <div class="title tittle-box-right">
			        <h2> Bài viết mới </h2>
			    </div>
			    <div class="content-box">
			       <ul class="news">
			       	<?php foreach ($news_list as $row):?>
			             <li>
			                <a href="news/view/4.html" title="<?php echo $row->title?>">
			                <img src="<?php echo base_url('upload/news/'.$row->image_link)?>" alt="<?php echo $row->title?>" style='width: 50px;'>
			                <?php echo $row->title?>	                        </a>
	                     </li>
	                 <?php endforeach;?>
	                    			           
	                </ul>
	    </div>
   </div>		<!-- End news -->
		
        <!-- The Ads -->
	       <div class="box-right">
                <div class="title tittle-box-right">
			        <h2> Quảng cáo </h2>
			    </div>
			    <div class="content-box">
			        <a href="">
					     <img src="<?php echo public_url()?>/site/images/ads.png">
					</a>
			    </div>
		   </div>
		<!-- End Ads -->
		
		 <!-- The Fanpage -->
	       <div class="box-right">
                <div class="title tittle-box-right">
			        <h2> Fanpage </h2>
			    </div>
			    <div class="content-box">
			          
			         <iframe src="http://www.facebook.com/plugins/likebox.php?href=https://www.facebook.com/thegioididongcom/&amp;width=190&amp;height=300&amp;show_faces=true&amp;colorscheme=light&amp;stream=false&amp;border_color&amp;header=true" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:190px; height:300px;" allowtransparency="true">
	                 </iframe>
	               
			    </div>
		   </div>
		<!-- End Fanpage -->
		
		 <!-- The Fanpage -->
	      
		<!-- End Fanpage -->
		

				