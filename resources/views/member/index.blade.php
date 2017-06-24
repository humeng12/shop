@extends('admin.layouts.base')

@section('title','控制面板')

@section('pageHeader','控制面板')

@section('pageDesc','DashBoard')

@section('content')

	<form class="layui-form" action="">
	 	<div class="layui-form-item">
		    <div class="layui-inline">
		      <label class="layui-form-label" style="width:100px;">输入昵称</label>
		      <div class="layui-input-inline">
		        <input type="tel" name="username" lay-verify="username" autocomplete="off" class="layui-input">
		      </div>
		      <button class="layui-btn">查询</button>
		    </div>
  		</div>
    </form>
	
	<div class="layui-form">
		<table class="layui-table" lay-even="" lay-skin="row">
		  	<colgroup>
			    <col width="150">
			    <col width="150">
			    <col width="150">
			    <col width="150">
			    <col width="150">
			    <col width="150">
		  	</colgroup>
		  	<thead>
		    <tr>
		    	<th>ID</th>
		      	<th>昵称</th>
		      	<th>账号</th>
		      	<th>卡号</th>
		      	<th>积分</th>
		      	<th>操作</th>
		    </tr> 
		  	</thead>
		
			<tbody>
				@foreach($users as $user)
			    <tr>
			    	<td>{{$user->id}}</td>
				    <td>{{$user->username}}</td>
				    <td>{{$user->account}}</td>
				    <td>{{$user->card_num}}</td>
				    <td>{{$user->integral}}</td>
				    <td>
				    	<button class="layui-btn layui-btn-normal">查询</button>
				    </td>
			    </tr>
		  		@endforeach
		  	</tbody>
		</table>  

		{{ $users->links() }}
	</div>

@endsection


@section('js')

@endsection