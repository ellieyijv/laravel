<template>
	<div id="ArticlesComp">
		<h2>articles</h2>
		<nav aria-label="Page navigation example">
			<ul class="pagination">
				<li :class="[{disabled: !pagination.prev_page_url}]" class="page-item">
				
					<a class="page-link" href="#"
					@click="fetchArticles(pagination.prev_page_url)">Previous</a>
				</li>
				<li class="page-item disabled">
					<a class="page-link text-dark">Page {{pagination.current_page}} of {{pagination.last_page}}</a>
				</li>
				<li class="page-item" :class="[{disabled: !pagination.next_page_url}]">
					<a class="page-link" href="#" @click="fetchArticles(pagination.next_page_url)">Next</a>
				</li> 
					<li class="page-item">
					<a class="page-link text-dark primary" @click="fetchArticles()">First Page</a>
				</li>	
			</ul>
		</nav>
		<div  class="card card-body mb-2" v-for="article in articles" :key="article.id">
			<h3>{{article.title}}</h3>
			<p>{{article.body}}</p>
			<hr>
			<button class="btn btn-primary" @click="deleteArticle(article.id)">Delete</button>
		</div>
	</div>
</template>

<script>
	export default {
		data(){
			return {
				articles: [],
				article: {
					id: '',
					title: '',
					body: ''
				},
				article_id: '',
				pagination: {},
				edit: false
			}	
		},

		created(){
			this.fetchArticles();
		},

		methods: {
			fetchArticles(pageUrl){
             
				let page_url = pageUrl || 'api/articles'
				fetch(page_url)
					.then(res=> res.json())
					.then(res =>{
						this.articles = res.data;
						this.makePagination(res.meta, res.links)
						
					})
					.catch(err => console.log(err))
			},

			makePagination(meta, links){
				let pagination = {
					current_page: meta.current_page,
					last_page: meta.last_page,
					next_page_url: links.next,
					prev_page_url: links.prev
				}

				this.pagination = pagination
			},

			deleteArticle(id){
				if(confirm('Are You Sure?')) {
					fetch(`api/article/${id}`, {
						method: 'delete'
					})
					.then(res => res.json())
					.then(data => {
						alert('Article Removed');
						this.fetchArticles();
					})
				}
			}
		}
	}
</script>

