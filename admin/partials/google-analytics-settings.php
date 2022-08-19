<?php
/**
 * Analytics API Settings
 */
$img = plugin_dir_url( __DIR__ ).'assets/img/21249.jpg';
// Get available Options
$client_id =  get_option( 'client_id','' );
$client_secret =  get_option( 'client_secret','' );
$redirect_uri =  get_option( 'redirect_uri','' );
$developer_key =  get_option( 'developer_key','' );
$ga_id =  get_option( 'ga_id','' );
?>
<style>
.flex-col{
	display:flex;
	box-shadow: rgba(100, 100, 111, 0.2) 0px 7px 29px 0px;
	/* font-family: Roboto; */
    font-weight: 600;
}
.left-col{
	width:60%;
}
.analytics-bg{
	background-image:url(<?php echo $img;?>);
	background-size: cover;
	/* height: 500px; */
    background-repeat: no-repeat;
    background-position: center;
	box-shadow: rgba(100, 100, 111, 0.2) 0px 7px 29px 0px;
}
.right-col{
	padding: 45px 15px;
	width:40%;
}
.api-input-group label{
	padding:5px;
}
.api-input-group input{
	margin-bottom: 15px;
    width: -webkit-fill-available;
    border-radius: 8px;
    height: 45px;
    /* font-family: Roboto; */
}
.api-input-group{
	display: grid;
}
.api-contianer{
	width: 80%;
    margin: auto;
}
.analytics_logo{
	text-align:center;
}
.analytics_logo img{
	width: 50%;
}
#connect_analytics_api{
	border-radius: 8px;
    padding: 10px 50px;
    background: linear-gradient(170deg,#ec1081 5%,#f05075 30%,#f16b63 48%,#f16b63 52%,#f48835 70%,#f6971c 95%);
    color: #fff;
    border-color: #fff;
    border: none;
}
</style>
<div class="wrap">
	<form action="" class="flex-col" id="analytics_api_data">
		<div class="left-col analytics-bg">
		</div>
		<div class="right-col">
			<div class="api-contianer">
				<div class="analytics_logo">
					<img src="data:image/png;base64,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" alt="">
				</div>
				<div class="api-input-group">
					<label for="client_id">Client ID</label>
					<input type="text" placeholder="Client ID" name="client_id" value="<?php echo $client_id  ?>" required>
				</div>
				<div class="api-input-group">
					<label for="client_secret">Client Secret</label>
					<input type="text" placeholder="Client Secret" name="client_secret" value="<?php echo $client_secret  ?>" required>
				</div>
				<div class="api-input-group">
					<label for="redirect_uri">Redirect URI</label>
					<input type="text" placeholder="Redirect URI" name="redirect_uri" value="<?php echo $redirect_uri  ?>" required>
				</div>
				<div class="api-input-group">
					<label for="developer_key">Developer Key</label>
					<input type="text" placeholder="Developer Key" name="developer_key" value="<?php echo $developer_key  ?>" required>
				</div>
				<div class="api-input-group">
					<label for="developer_key">GA ID</label>
					<input type="text" placeholder="GA ID" name="ga_id" value="<?php echo $ga_id  ?>" required>
				</div>
				<div class="analytics_logo">
					<button type="submit" id="connect_analytics_api">Save</button>
				</div>
			</div>
		</div>
	</form>
</div>
<script>
	jQuery('#analytics_api_data').submit(function(e){
		e.preventDefault();
		var values = {};
		jQuery.each(jQuery(this).serializeArray(), function(i, field) {
			values[field.name] = field.value;
		});
		var data = true;
		jQuery.ajax({
                 type : "POST",
                 url : ajaxurl,
                 data : {action: "analytics_credentials",data:values},
                 success: function(response) {
					location.reload();
                }
            }); 
		
	})
</script>