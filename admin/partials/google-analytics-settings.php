<?php
/**
 * Analytics API Settings
 */
$img = plugin_dir_url( __DIR__ ).'assets/img/21249.jpg';
$analytics_logo = plugin_dir_url( __DIR__ ).'assets/img/google-analytics-logo.png';
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
				<img src="<?php echo $analytics_logo;?>">
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