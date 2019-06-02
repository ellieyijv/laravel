<template>
	<div>
		<li v-for='task in tasks' :key='task.id'>
			{{task.name}}
			
		</li>	
	</div>
</template>

<script>
export default {
	
	data(){
		return{
			tasks:[
				{id:1, name:'chemicle', completed:true},
				{id:2, name:'hello', completed:true},
				{id:3, name:'hi', completed:false},
				{id:4, name:'checktheloading', completed:false},
				{id:5, name:'class', completed:true},
			]
		}
	}
}
</script>

<style>

</style>
