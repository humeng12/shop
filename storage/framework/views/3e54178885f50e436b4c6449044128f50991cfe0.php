<?php $__env->startSection('title','控制面板'); ?>

<?php $__env->startSection('pageHeader','控制面板'); ?>

<?php $__env->startSection('pageDesc','DashBoard'); ?>

<?php $__env->startSection('content'); ?>

	<div class="main animsition">
        <div class="container-fluid">

            <div class="row">
                <div class="">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">添加设置</h3>
                        </div>
                        <div class="panel-body">
							
							<?php echo $__env->make('admin.partials.errors', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                            <?php echo $__env->make('admin.partials.success', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

                            <form class="form-horizontal" role="form" method="POST" id="do_form" name="do_form">
                                <?php echo e(csrf_field()); ?>


								<?php echo $__env->make('system._form', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                                

                                <div class="form-group">
                                    <div class="col-md-7 col-md-offset-3">
                                        <a href="javascript:void(0);" onclick="btnClick()" class="btn btn-primary btn-md"><i class="fa fa-plus-circle"></i>添加</a>
                                    </div>
                                </div>

                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


<?php $__env->stopSection(); ?>


<?php $__env->startSection('js'); ?>

    <script type="text/javascript">

        function btnClick()
        {
            if (postcheck_frm()) {

                var loadi;

                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    type:'post',
                    url:"<?php echo e(url('system/index/setting')); ?>",
                    dataType:'json',
                    data:$('#do_form').serialize(),
                    beforeSend:function(){
                        loadi=layer.load("<?php echo e(trans('default.doing')); ?>");
                    },
                    success:function(result){
                        console.log(result);
                        layer.close(loadi);
                        layer.msg(result.message);
                    },
                    error:function(error)
                    {
                        console.log(error);

                        layer.close(loadi);

                        layer.msg('5441');
                    }  
                });
            }; 
        }


        function postcheck_frm()
        {
            var  frm = document.do_form;
                
            var appid = frm.appid;
            var appsecret = frm.appsecret;


            if (appid.value == '') {
                layer.open({
                    title: '错误信息',content: '请输入AppID'
                });  

                return false;
            }


            if (appsecret.value == '') {
                layer.open({
                    title: '错误信息',content: '请输入AppSecret'
                });  

                return false;
            }

            return true;
        }

    </script>
      
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.base', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>