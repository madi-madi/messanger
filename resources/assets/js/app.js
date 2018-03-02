
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

// import Vue from 'vue'
// import VueRouter from 'vue-router'

// Vue.use(VueRouter)


/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */
// register the plugin on vue
import Toasted from 'vue-toasted';

Vue.use(Toasted)
//Vue.component('upload-form', require('./components/UploadForm.vue'));
import UploadForm from './components/UploadForm';
//Vue.component('save-image', require('./components/SaveImage.vue'));

const app = new Vue({
    el: '#app',
    components:{UploadForm},
    data:{
    	msg:'New Forsan Technology Msg',
    	content:'Forsan Technology content',
    	privateMessages:[],
    	singleMessages:[],
    	msgFrom:'',
    	convId:'',
    	modal_toggel:false,

    },

    ready: function(){
    	this.created();
    },

    created(){
    	axios.get('/getMessages')
  .then(response => {
   // console.log(response.data);
    app.privateMessages = response.data;
  })
  .catch(error => {
    console.log(error);
  });
    },

    methods:{
    	messagesById(id){
        	axios.get('/getMessages/'+id)
            .then(response => {
            // console.log(response.headers);
            app.singleMessages = response.data;
            app.convId = response.data[0].conversation_id;
                 })
               .catch(error => {
                  console.log(error);
              });
    	},

    	inputHandler(e){

    		if (e.keyCode === 13 && !e.shiftKey) {
    			e.preventDefault();
    			this.sendMessage();
    		}
    	},

    	sendMessage(){
    		if (this.msgFrom) {
        	axios.post('/sendMessage',{
        		conversation_id:this.convId,
        		msgFrom:this.msgFrom
        	}).then(response => {
           //  console.log("Saved Successfuly");
             	if (response.status === 200) {
             		app.singleMessages =response.data;
             		this.msgFrom='';
             	}
                 }).catch(error => {
                  console.log(error);
              });    			
    		}
    	},

    	showModal(){
    		this.modal_toggel=true;
    	}
    }
});
