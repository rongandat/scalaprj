	<div id="quickview" style="display: none; width: 775px; height:520px;">
	  <table width="100%" cellpadding="0" cellspacing="0" >
	    <tr>
	     <td colspan="2" align="center"><a id="qv_prev" href="javascript:void(0);"><- prev item</a>&nbsp;&nbsp;&nbsp;<a id="qv_next" href="javascript:void(0);">next item -></a></td>
	    </tr>
	    <tr>
	     <td width="50%" valign="top">
	       <table width="100%" cellpadding="0" cellspacing="0">
		<tr>
		 <td>
		   <div id="jqloading" style="margin-top:0px;margin-left:10px; height:370px;width:360px; display:block; background:url(images/image_loader/image-loader.gif) no-repeat center center;"></div>
			<div class="jqclearfix" id="content" style="margin-top:0px;margin-left:10px; height:auto;width:auto; display:none;" >
			    <div class="jqclearfix" id="jqmainimage">

			    </div>
				<br/>

			 <div class="jqclearfix" >
			 	<ul id="thumblist" class="jqclearfix" >

			         </ul>
			 </div>
			</div>
			
                 </td>
                </tr>
		</table>
             </td>

	     <td width="50%" valign="top">
		<div id="tabs" style="margin-top:3px;">
                   <form name="cart_quantity" action="shopping_cart.php?action=add_product">
			<ul>
				<li><a href="#tabs-1">PRODUCT VIEW</a></li>
				<li><a href="#tabs-2">ADDITIONAL VERSIONS</a></li>
			</ul>
			<div id="tabs-1">
			        <table width="100%" cellpadding="0" cellspacing="0">
			        <tr>
			         <td colspan="2" style="font-weight:bold;" id="qv_productname" align="left" class="smallText"></td>
			        </tr>
			        <tr>
				<td colspan="2" style="font-weight:bold;" id="qv_productname" align="left" class="smallText"></td>
				</tr>
				<tr>
				 <td colspan="2" id="qv_productdescription" class="smallText">
				 </td>
				</tr>
				<tr>
				 <td colspan="2" id="qv_productattributes" class="smallText">
                                 </td>
				</tr>

				<tr>
				   <td colspan="2" id="qv_productquanlity" class="smallText" valign="top" align="left" ></td>
				  </tr>
				  <tr>
				   <td colspan="2" id="qv_productsize" class="smallText" valign="top" align="left" ></td>
				  </tr>
				  <tr>
				   <td colspan="2" id="qv_productprice" class="smallText" valign="top" align="left" style="padding-top:10px;"></td>
				  </tr>
				  <tr>
				   <td id="qv_addtocart" class="smallText" valign="top" align="left"></td>
				   <td id="qv_details" class="smallText" valign="top" align="right"></td>
				  </tr>
				 </table>
			</div>
			<div id="tabs-2">
		        <div id="jqloading1" style="margin-top:0px;margin-left:10px; height:110px;width:100%; display:none; background:url(images/image_loader/image-loader.gif) no-repeat center center;"></div>
				<p id="qv_version" class="smallText">
				 <ul id="thumblist2" class="clearfix" >
				 </ul>
				</p>
			</div>


		</form>	
		</div>

	     </td>
	    </tr>
	   </table>
	</div>