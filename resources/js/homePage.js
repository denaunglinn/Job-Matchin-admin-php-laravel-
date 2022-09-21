import axios from "axios";
export default{
    name:"HomePage",
    data(){
        return {
            postList : [],
            postCount : '',
            message: " this is home page",
        }
    },
    methods: {
        getAllPost(){
            axios.post("http://job_match.local/api/post/lists").then((response)=> {
                this.postList = response.data.data ;
                this.postCount = response.data.data.length;
            });
        }
    },
    mounted () {
      this.getAllPost();
    },
}