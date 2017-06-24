<aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

        <!-- Sidebar user panel (optional) -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="/imgs/avatar/u1.jpg" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p><?php echo e(auth()->user()->name); ?></p>
                <!-- Status -->
                <a><i class="fa fa-circle text-success"></i> 在线</a>
            </div>
        </div>

        <!-- search form (Optional) -->
        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="搜索...">
                <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
            </div>
        </form>
        <!-- /.search form -->

        <!-- Sidebar Menu -->
        <ul class="sidebar-menu">
            <li class="header">栏目导航</li>
            <!-- Optionally, you can add icons to the links -->

            <li class="active"><a href="/admin"><i class="fa fa-dashboard"></i> <span>控制面板</span></a></li>
            <?php if(isset($comData['top'])&&count($comData['top'])): ?>
                <?php foreach($comData['top'] as $v): ?>
                    <li class="treeview  <?php if(in_array($v['id'],$comData['openarr'])): ?> active <?php endif; ?>">
                        <a href="#"><i class="fa <?php echo e($v['icon']); ?>"></i> <span><?php echo e($v['display_name']); ?></span> <i
                                    class="fa fa-angle-left pull-right"></i></a>
                        <ul class="treeview-menu">
                            <?php foreach($comData[$v['id']] as $vv): ?>
                                <li <?php if(in_array($vv['id'],$comData['openarr'])): ?> class="active" <?php endif; ?>><a href="<?php echo e(URL::route($vv['name'])); ?>">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class="fa fa-circle-o"></i><?php echo e($vv['display_name']); ?></a></li>
                            <?php endforeach; ?>
                        </ul>
                    </li>
                <?php endforeach; ?>
            <?php endif; ?>

        </ul>
        <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
</aside>