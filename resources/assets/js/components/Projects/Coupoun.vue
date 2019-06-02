<template>
	<div>
		<input placeholder="Please input coupoun" @blur="onEventApplied" >

	</div>
</template>

<script>

export default {
	methods:{
		onEventApplied(){
			Event.fire('applied');
		}
	}
}
</script>

<style>

</style>
