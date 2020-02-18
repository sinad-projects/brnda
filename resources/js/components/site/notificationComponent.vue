<template>
	<div>
		<a href="/messenger" class="w3-bar-item w3-hover-none w3-button">
			<i class="fa fa-envelope-o"></i>
			<span class="badge badge-light" id="notifi" style="position: relative; top: 5px; left: -5px;padding: 3px 5px;border-radius: 50%">
				 {{ this.message_count }}
			</span>
		</a>
	</div>
</template>

<script>
	export default{
		data(){
			return{
				message_count : 0,
			}
		},
		mounted(){
			axios.get('/messenger/count').then((response) => {
				this.message_count = response.data;
			});
		}
	}
</script>
