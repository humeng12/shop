<?php
    Breadcrumbs::register("admin.index", function ($breadcrumbs) {
        $breadcrumbs->push("首页", route("admin.index"));
    });
Breadcrumbs::register("admin.user.manage", function ($breadcrumbs){
        $breadcrumbs->push("用户管理", route("admin.user.manage"));
    });Breadcrumbs::register("admin.permission.index", function ($breadcrumbs) {
                        $breadcrumbs->parent("admin.user.manage");
                        $breadcrumbs->push("权限列表", route("admin.permission.index"));
                    });
                    Breadcrumbs::register("admin.user.index", function ($breadcrumbs) {
                        $breadcrumbs->parent("admin.user.manage");
                        $breadcrumbs->push("用户列表", route("admin.user.index"));
                    });
                    Breadcrumbs::register("admin.role.index", function ($breadcrumbs) {
                        $breadcrumbs->parent("admin.user.manage");
                        $breadcrumbs->push("角色列表", route("admin.role.index"));
                    });
                    Breadcrumbs::register("admin.permission.create", function ($breadcrumbs) {
                  $breadcrumbs->parent("admin.permission.index");
                          $breadcrumbs->push("添加权限", route("admin.permission.create"));
                        });
                  Breadcrumbs::register("admin.permission.edit", function ($breadcrumbs) {
                  $breadcrumbs->parent("admin.permission.index");
                          $breadcrumbs->push("修改权限", route("admin.permission.edit"));
                        });
                  Breadcrumbs::register("admin.permission.destroy ", function ($breadcrumbs) {
                  $breadcrumbs->parent("admin.permission.index");
                          $breadcrumbs->push("删除权限", route("admin.permission.destroy "));
                        });
                  Breadcrumbs::register("admin.user.create", function ($breadcrumbs) {
                  $breadcrumbs->parent("admin.user.index");
                          $breadcrumbs->push("添加用户", route("admin.user.create"));
                        });
                  Breadcrumbs::register("admin.user.edit", function ($breadcrumbs) {
                  $breadcrumbs->parent("admin.user.index");
                          $breadcrumbs->push("编辑用户", route("admin.user.edit"));
                        });
                  Breadcrumbs::register("admin.user.destroy", function ($breadcrumbs) {
                  $breadcrumbs->parent("admin.user.index");
                          $breadcrumbs->push("删除用户", route("admin.user.destroy"));
                        });
                  Breadcrumbs::register("admin.role.create", function ($breadcrumbs) {
                  $breadcrumbs->parent("admin.role.index");
                          $breadcrumbs->push("添加角色", route("admin.role.create"));
                        });
                  Breadcrumbs::register("admin.role.edit", function ($breadcrumbs) {
                  $breadcrumbs->parent("admin.role.index");
                          $breadcrumbs->push("编辑角色", route("admin.role.edit"));
                        });
                  Breadcrumbs::register("admin.role.destroy", function ($breadcrumbs) {
                  $breadcrumbs->parent("admin.role.index");
                          $breadcrumbs->push("删除角色", route("admin.role.destroy"));
                        });
                  Breadcrumbs::register("member.permission", function ($breadcrumbs){
        $breadcrumbs->push("会员管理", route("member.permission"));
    });Breadcrumbs::register("member.index.index", function ($breadcrumbs) {
                        $breadcrumbs->parent("member.permission");
                        $breadcrumbs->push("会员列表", route("member.index.index"));
                    });
                    Breadcrumbs::register("member.rule.index", function ($breadcrumbs) {
                        $breadcrumbs->parent("member.permission");
                        $breadcrumbs->push("积分规则", route("member.rule.index"));
                    });
                    Breadcrumbs::register("good.permission", function ($breadcrumbs){
        $breadcrumbs->push("商品管理", route("good.permission"));
    });Breadcrumbs::register("good.index.index", function ($breadcrumbs) {
                        $breadcrumbs->parent("good.permission");
                        $breadcrumbs->push("商品列表", route("good.index.index"));
                    });
                    Breadcrumbs::register("system.permission", function ($breadcrumbs){
        $breadcrumbs->push("系统设置", route("system.permission"));
    });Breadcrumbs::register("system.index.index", function ($breadcrumbs) {
                        $breadcrumbs->parent("system.permission");
                        $breadcrumbs->push("公众号设置", route("system.index.index"));
                    });
                    Breadcrumbs::register("system.index.create", function ($breadcrumbs) {
                  $breadcrumbs->parent("system.index.index");
                          $breadcrumbs->push("添加设置", route("system.index.create"));
                        });
                  