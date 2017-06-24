<?php $__env->startSection('title','控制面板'); ?>

<?php $__env->startSection('pageHeader','控制面板'); ?>

<?php $__env->startSection('pageDesc','DashBoard'); ?>

<?php $__env->startSection('content'); ?>
	
	<form class="layui-form" action="">
		
		<div class="layui-form-item">
		    <div class="layui-inline">
		      <label class="layui-form-label" style="width:100px;">积分规则:</label>
		      <div class="layui-input-inline" style="width: 100px;">
		        <input type="text" name="price_min" placeholder="积分" autocomplete="off" class="layui-input">
		      </div>
		      <div class="layui-form-mid">-</div>
		      <div class="layui-input-inline" style="width: 100px;">
		        <input type="text" name="price_max" placeholder="元" autocomplete="off" class="layui-input">
		      </div>
		    </div>
		</div>

		<div class="layui-form-item">
		    <div class="layui-inline">
		      <label class="layui-form-label" style="width:100px;">积分说明:</label>
		      <div class="layui-input-inline">
		        <!-- <input type="tel" name="username" lay-verify="username" autocomplete="off" class="layui-input"> -->
		        <textarea id="edit" name="introduction" style="display: none;"></textarea>
		      </div>
		    </div>
  		</div>
		
		

	</form>

<?php $__env->stopSection(); ?>


<?php $__env->startSection('js'); ?>

<script type="text/javascript">
	
	// var loadi;
	// loadi=layer.load();
	// layer.close(loadi);
	// 
	layui.use('layedit', function(){
		var layedit = layui.layedit;
		layedit.build('edit');
	});

</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.base', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>