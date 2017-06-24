<?php $__env->startSection('title','控制面板'); ?>

<?php $__env->startSection('pageHeader','控制面板'); ?>

<?php $__env->startSection('pageDesc','DashBoard'); ?>

<?php $__env->startSection('content'); ?>

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
				<?php foreach($res as $v): ?>
			    <tr>
			    	<td><?php echo e($v->id); ?></td>
				    <td><?php echo e($v->appid); ?></td>
				    <td><?php echo e($v->appsecret); ?></td>
				    <td><?php echo e($v->region); ?></td>
				    <td>
				    	<a style="margin:3px;" href="/admin/user/" class="X-Small btn-xs text-success "><i class="fa fa-edit"></i> 编辑</a>
				    </td>
			    </tr>
		  		<?php endforeach; ?>
		  	</tbody>
		</table>  

		<?php echo e($res->links()); ?>

	</div>

<?php $__env->stopSection(); ?>


<?php $__env->startSection('js'); ?>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.base', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>