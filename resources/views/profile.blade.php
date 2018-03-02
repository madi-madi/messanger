<!-- @extends('layouts.app') -->

@section('content')
<div class="container" id="app">

    <div class="row justify-content-center">
        <div class="col-md-12 col-xs-12 " id="">
            <div class="card card-default">
                

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif


<div  class="pull-right" style="float: right;">
    <img src="{{url('storage/user-image.png')}}" width=""  alt="{{ $name }}" style="border-radius: 50%;"/>
</div>
                </div>
<!-- <div class="card-header">
    <a v-if="! {{Auth::user()}}" href="javascript:;" @click="showModal()" class="btn btn-info"> Send Message </a>
            <div class="overlay" v-if="modal_toggel" >
            <div class="content-modal">
                <div class="modal-header"> Modal Header 
                    <span class="modal-cancel" >X</span>
                </div>
                <div class="modal-content">
                    <textarea rows="5"></textarea>
                </div>
                <div class="modal-footer">
                    <span class="confirm">
                    <button > Yes </button>
                    <button @click="modal_toggel = !modal_toggel"> Cancel</button>
                    </span>
                </div>
            </div>
        </div>
</div> -->
            </div>
        </div>
    </div>
</div>
@endsection
