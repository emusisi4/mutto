<!DOCTYPE html>
<html>
<head>
    <title>Building an Autocomplete Component with Vue.js and PHP Laravel 5.6</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" >
    <script src="https://cdnjs.cloudflare.com/ajax/libs/vue/2.5.16/vue.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.18.0/axios.min.js"></script>
</head>
<body>


<div class="container" id="app">
    <div class="row">
        <div class="col-sm-8">
            <h1>Building an Autocomplete Component with Vue.js and PHP Laravel 5.6</h1>
            <div class="panel panel-primary">
                <div class="panel-heading">Please type here in text box to get search data</div>
                <div class="panel-body">
                    <auto-complete></auto-complete>
                </div>
            </div>
        </div>
    </div>
</div>


<script type="text/javascript">


    Vue.component('autoComplete', {
      template: '<div><input type="text" placeholder="Type here.." v-model="search" v-on:keyup="getSearchData" class="form-control"><div class="panel-footer" v-if="results.length"><ul class="list-group"><li class="list-group-item" v-for="result in results">@{{ result.category_name }}</li></ul></div></div>',
      data: function () {
        return {
          search: '',
          results: []
        }
      },
      methods: {
        getSearchData(){
        this.results = [];
        if(this.search.length > 0){
         axios.get('search',{params: {search: this.search}}).then(response => {
          this.results = response.data;
         });
        }
       }
      },
    })


    const app = new Vue({
        el: '#app'
    });
</script>


</body>
</html>
