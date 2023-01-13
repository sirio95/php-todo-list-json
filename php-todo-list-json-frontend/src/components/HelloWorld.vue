<script>
  import axios from 'axios';

  
  export default{
    data(){
        return{
          new_todo_text : "",
          to_do_list: [],
          api_URL : "http://localhost/",
        }
    },
    methods: {
      
      get_all_data(){
        axios.get(this.api_URL + "api.php").then(res =>{
          const data= res.data;
          this.to_do_list= data;
        })
      },

      create_new_task(e){
        e.preventDefault();

        const params = {
          params: {
            "new_to_do" : this.new_todo_text
          }
        }
        axios.get(this.api_URL + "api_new_todo.php", params).then(()=>{
          this.get_all_data();
        })
      }
    },
    mounted(){
      this.get_all_data();
    }

  }
</script>

<template>
  <form @submit="create_new_task">
    <label for="new_todo_text">Nome del task</label>
    <input type="text" name="new_todo_text" v-model="new_todo_text">
    <input type="submit" value="Crea un nuovo task">
  </form>

  <section>
    <ul>
      <li v-for="(to_do, index) in to_do_list" :key="index" 
        class= "task" :class="to_do.completed">
          {{ to_do.text }}
          
      </li>
    </ul>
  </section>

</template>
  

<style scoped>
  .task{
    color: #fff;
  }
</style>
