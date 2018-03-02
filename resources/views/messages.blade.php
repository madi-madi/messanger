@extends('layouts.app')

@section('content')

<div class="container" id="app">
<div class="row">
	<div class="col-md-3 pull-left message">
		<h3> Users</h3>
		<ul v-for="privateMsg,index in privateMessages" class="list-group">
			<li @click.prevant="messagesById(privateMsg.id)" class="list-group item user" >
	<img :src="'storage/'+privateMsg.image" width="60px" height="60px" >@{{privateMsg.name}}
<p>Here we will display message</p>
</li>
		</ul>
	</div>
	<div class="col-md-7 message" >
		<h3>Messages</h3>
		<hr>
	<div v-for="singleMessage in singleMessages">

	 <div  v-if="singleMessage.user_from == <?php echo Auth::user()->id;?>">
		<div  class="col-md-12 from" style=" color: #fff;  ">
	  <a :href="/profile/+singleMessage.name+'/'+singleMessage.user_from"><img :src="'storage/'+singleMessage.image" width="30px" height="30px" 
	  style="float: left;" :alt="singleMessage.name" :title="singleMessage.name" class="pull-left" ></a>
	<div class="col-md-9" style="background-color: #4080ff; float: left; padding: 15px;border-radius: 10px; margin-bottom: 15px;">
		@{{singleMessage.msg}} @{{singleMessage.user_from}}</div>  
		</div>
		</div>
		 <div  v-else>
	         <div class="col-md-12 to" style="background-color: ; float: right; margin-bottom: 15px; border-radius: 10px;">
			
	<a :href="/profile/+singleMessage.name+'/'+singleMessage.user_from">
		<img :src="'storage/'+singleMessage.image" width="30px" height="30px"
	 style="float: right;" :alt="singleMessage.name" :title="singleMessage.name" class="pull-right" ></a>

			<div class="col-md-9" style="
			background-color:#f1f0f0;
			 float: right;
			 padding: 15px;
			 border-radius: 10px;">
			 <span class="user-from">@{{singleMessage.msg}} @{{singleMessage.user_from}}</span> </div>    
		     </div>

		 </div >
	</div>
	<input type="hidden" name="" value="" v-model="convId">
	<textarea class="form-control" placeholder="Write here any message you want ..." v-model="msgFrom" @keydown="inputHandler"></textarea>
	</div>
	<div class="col-md-2 pull-right message">Right sidbare</div>
</div>
</div>
@endsection