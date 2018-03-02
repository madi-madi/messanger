<template>

<div>
          <div class="col-xs-12 col-md-4 pull-right" style="float:right;">
                 <img :src="avatar" class="img-responsive" alt="Ibrahim">
                <a href="#" v-if="loaded" class="btn btn-success" @click.prevent="upload">Upload</a>
                <a href="#" v-if="loaded" class="btn btn-danger" @click.prevent="cancel">Cancel</a>

                 <input type="file" name="image" @change="getImage" class="avatar-input" accept="image/*">

          </div>

</div>
</template>

<script>


		export default {

			props:['user'],
			data(){

				return {

				//avatar:this.user.avatar,

				avatar:`http://127.0.0.1:8000/storage/${this.user.image}`,
				loaded:false
				}

			},

			methods:{

				getImage(e){

				let image = e.target.files[0];//1
				console.log(image);
				this.read(image);//2
				let form = new FormData();
				form.append('image',image);
				this.file= form;
				console.log(form);
				console.log(this.file);

				},

				upload(){

				//axios.post('/upload',{'image':this.avatar})
				axios.post('/upload',this.file)

				.then( res=> this.$toasted.show('Avaatar is Uploaded ! ...',{type:'success',closeOnSwipe:true})


				)
				this.loaded = false;
				},

				cancel(){

					this.avatar = `storage/${this.user.image}`;
					this.loaded = false;
				},

				read(image){
				let reader = new FileReader();
				reader.readAsDataURL(image);
				reader.onload = e => {

				this.avatar = e.target.result;
				}

				this.loaded = true

				}
			}


		}

</script>