@extends('admin.layouts.base')

@section('title','控制面板')

@section('pageHeader','控制面板')

@section('pageDesc','DashBoard')

@section('content')

	<a href="/system/index/create" class="btn btn-primary btn-md"><i class="fa fa-plus-circle"></i>添加设置</a>



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
			      	<th>操作</th>
			    </tr> 
		  	</thead>
		
			<tbody>
				@foreach($res as $v)
			    <tr>
			    	<td>{{$v->id}}</td>
				    <td>{{$v->appid}}</td>
				    <td>{{$v->appsecret}}</td>
				    <td>{{$v->region}}</td>
				    <td>
				    	<a style="margin:3px;" href="/admin/user/" class="X-Small btn-xs text-success "><i class="fa fa-edit"></i> 编辑</a>
				    </td>
			    </tr>
		  		@endforeach
		  	</tbody>
		</table>  

		{{ $res->links() }}
	</div>

@endsection


@section('js')


@endsection