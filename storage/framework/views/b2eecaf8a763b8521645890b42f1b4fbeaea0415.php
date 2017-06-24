<div class="form-group">
    <label for="tag" class="col-md-3 control-label">用户名</label>
    <div class="col-md-5">
        <input type="text" class="form-control" name="name" id="tag" value="<?php echo e($name); ?>" autofocus>
    </div>
</div>
<div class="form-group">
    <label for="tag" class="col-md-3 control-label">邮箱</label>
    <div class="col-md-5">
        <input type="text" class="form-control" name="email" id="tag" value="<?php echo e($email); ?>" autofocus>
    </div>
</div>

<div class="form-group">
    <label for="tag" class="col-md-3 control-label">密码</label>
    <div class="col-md-5">
        <input type="password" class="form-control" name="password" id="tag" value="" autofocus>
    </div>
</div>

<div class="form-group">
    <label for="tag" class="col-md-3 control-label">密码确认</label>
    <div class="col-md-5">
        <input type="password" class="form-control" name="repassword" id="tag" value="" autofocus>
    </div>
</div>


<div class="form-group">
    <label for="tag" class="col-md-3 control-label">角色列表</label>
    <?php if(isset($id)&&$id==1): ?>
        <div class="col-md-4" style="float:left;padding-left:20px;margin-top:8px;"><h2>超级管理员</h2></div>
    <?php else: ?>
        <div class="col-md-6">
        <?php foreach($rolesAll as $v): ?>
            <div class="col-md-4" style="float:left;padding-left:20px;margin-top:8px;">
            <span class="checkbox-custom checkbox-default">
                <i class="fa"></i>
                    <input class="form-actions"
                           <?php if(in_array($v['id'],$roles)): ?>
                           checked
                           <?php endif; ?>
                           id="inputChekbox<?php echo e($v['id']); ?>" type="Checkbox" value="<?php echo e($v['id']); ?>"
                           name="roles[]"> <label for="inputChekbox<?php echo e($v['id']); ?>">
                    <?php echo e($v['display_name']); ?>

                </label> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            </span>
            </div>
        <?php endforeach; ?>
            </div>
    <?php endif; ?>

</div>

