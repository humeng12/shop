<?php $__env->startSection('title','控制面板'); ?>

<?php $__env->startSection('pageHeader','控制面板'); ?>

<?php $__env->startSection('pageDesc','DashBoard'); ?>

<?php $__env->startSection('content'); ?>

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
				<?php foreach($users as $user): ?>
			    <tr>
			    	<td><?php echo e($user->id); ?></td>
				    <td><?php echo e($user->username); ?></td>
				    <td><?php echo e($user->account); ?></td>
				    <td><?php echo e($user->card_num); ?></td>
				    <td><?php echo e($user->integral); ?></td>
				    <td>
				    	<button class="layui-btn layui-btn-normal">查询</button>
				    </td>
			    </tr>
		  		<?php endforeach; ?>
		  	</tbody>
		</table>  

		<?php echo e($users->links()); ?>

	</div>

<?php $__env->stopSection(); ?>


<?php $__env->startSection('js'); ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.base', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>