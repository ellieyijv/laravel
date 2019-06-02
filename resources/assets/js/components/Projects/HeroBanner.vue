<template>
	<div id="herobanner">
		<!-- <button  :disabled="!isloading"  :class="{'is-loading': isloading}" :title="title" @click="checktheloading">Hover Over Me</button>
	    {{reversemessage}} -->
		<!-- <slot name="content"></slot> 
		<ul :id='tasktitle' v-if="isvisible">
			<button @click="isvisible=false">x</button>
			<task-list ></task-list>
		</ul> -->
		<button @click="showModal = true">show dialog</button>
		<modal v-if="showModal " @close="showModal=false"></modal>
        <coupoun></coupoun>
		<div v-if="CoupounApplied">
			<p>Your coupoun applied</p>
		</div>
	
	</div>
</template>

<script>
import TaskList from './TaskList';
import Modal from './Modal';
import Coupoun from './Coupoun';
import eventApi from '../../eventApi';

export default {
	props: ['tasktitle'],
	data(){
		return{
			title: 'hello',
			classname: 'hello-class',
			isloading: true,
			message: 'hello world',
			isvisible: true,
			showModal: false,
			CoupounApplied: false,
		}
	},
	components:{
		'task-list': TaskList,
		'modal': Modal,
		'coupoun': Coupoun,
	},
    computed:{
		reversemessage(){
			return this.message.split('').reverse().join('')
		},
		incompletetasks(){
			return this.tasks.filter((task)=> !task.completed )
		}
	},
	
	methods: {
		checktheloading(){
			this.isloading= !this.isloading;
		},

		onCoupounApplied(){
			this.CoupounApplied = true
		}
	},
	created(){
		Event.listen('applied', ()=>{this.CoupounApplied = true})
	},
}
</script>

<style>
	.hello-class{
		color:blue;
	}
	.is-loading{
		color:blueviolet;
	}
</style>
